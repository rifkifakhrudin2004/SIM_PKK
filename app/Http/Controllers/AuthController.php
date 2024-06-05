<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->level_id == '1') {
                return redirect()->intended('anggota');
            } elseif ($user->level_id == '2') {
                return redirect()->intended('bendahara');
            } elseif ($user->level_id == '3') {
                return redirect()->intended('ketuaPKK');
            } elseif ($user->level_id == '4') {
                return redirect()->intended('adminPKK');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // Validasi form login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:1,2,3,4',
        ]);

        // Ambil data username, password, dan role dari form
        $credentials = $request->only('username', 'password');

        // Lakukan proses otentikasi
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, periksa status pengguna
            $user = Auth::user();

            // Periksa apakah status pengguna aktif dan level_id sesuai dengan role yang dipilih
            if ($user->status === 'aktif' && $user->level_id == $request->role) {
                // Arahkan sesuai dengan levelnya
                if ($user->level_id == '1') {
                    return redirect()->intended('anggota');
                } elseif ($user->level_id == '2') {
                    return redirect()->intended('bendahara');
                } elseif ($user->level_id == '3') {
                    return redirect()->intended('ketuaPKK');
                } elseif ($user->level_id == '4') {
                    return redirect()->intended('adminPKK');
                } else {
                    return redirect()->intended('/');
                }
            } else {
                // Jika status tidak aktif atau level_id tidak sesuai, logout dan kembalikan ke halaman login dengan pesan error
                Auth::logout();
                return redirect('login')
                    ->withInput()
                    ->withErrors(['login_gagal' => 'Akun Anda dinonaktifkan oleh admin atau jenis login tidak sesuai, silahkan hubungi admin']);
            }
        } else {
            return redirect('login')
                ->withInput()
                ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function proses_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:m_users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $request['level_id'] = '2';
        $request['password'] = Hash::make($request->password);



        // masukkan semua data pada request ke table user

        UserModel::create($request->all());

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();

        return redirect('login');
}
}
