<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ArisanModel;
use App\Models\History;

class KocokController extends Controller
{
    public function kocok()
    {
        $activeMenu = 'kocok';
        $data = [
            'activeMenu' => $activeMenu,
        ];

        if (session()->has('LoggedUser')) {
            $user = DB::table('users')->where('id', session('LoggedUser'))->first();
            $data['LoggedUserInfo'] = $user;
        }

        return view('kocoks.kocok', $data);
    }

    public function hasil()
    {
        $activeMenu = 'hasil';
    
        // Randomly pick a winner
        $winner = ArisanModel::with(['anggota', 'bendahara'])->inRandomOrder()->first();
    
        // Check if winner is null
        if ($winner) {
            // Get winner details
            $winnerArray = $winner->toArray();
        } else {
            $winnerArray = [];
        }
    
        // Calculate total setoran
        $totalSetoran = ArisanModel::sum('setoran_arisan');
    
        // Create context array for logging
        $context = [
            'Winner' => $winnerArray,
            'Total Setoran' => $totalSetoran
        ];
    
        // Log the information
        Log::info('Arisan Result', $context);
    
        // Save to histories table if there is a winner
        if ($winner) {
            History::create([
                'id_pembukuan' => $winner->id_arisan, // Assuming `id` is the primary key
                'nama_pemenang' => $winner->anggota->nama_anggota,
                'tanggal' => now(),
                'nominal' => $totalSetoran,
                'nama_bendahara' => $winner->bendahara->name ?? null,
                'total_uang' => $totalSetoran
            ]);
        }
    
        // Pass $activeMenu variable to the view
        return view('kocoks.hasil', [
            'winner' => $winner,
            'totalSetoran' => $totalSetoran,
            'activeMenu' => $activeMenu
        ]);
    }

    public function delete()
    {
        // Delete all setoran records
        DB::table('m_arisan')->delete();

        // Update the status of all arisan records to 'belum lunas'
        DB::table('m_arisan')->update(['status' => 'belum lunas']);
    }
}