<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response; // Ganti Symfony\Component\HttpFoundation\Response menjadi Illuminate\Http\Response


class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @param  string  $roles // Ubah tipe parameter $roles menjadi string
     * @return \Illuminate\Http\Response // Mengubah tipe kembalian menjadi Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $roles) : Response
    {
        // Cek sudah login atau belum, jika belum kembali ke halaman login
        if (!Auth::check()) { // Tambahkan tanda seru (!) sebelum Auth::check()
            return redirect('login');
        }
        
        // Simpan data user pada variable $user
        $user = Auth::user();

        // Jika user memiliki level sesuai pada kolom pada lanjutkan request
        if ($user->level_id == $roles) { // Perbaiki penulisan level_id
            return $next($request);
        }

        // Jika tidak memiliki akses maka kembalikan ke halaman login
        return redirect('login')->with('error', 'Maaf, Anda tidak memiliki akses');
    }
}
