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
        // kita ambil data user lalu simpan pada variable $user
        $user = Auth::user();

        // kondisi jika user nya ada
        if ($user) {
            // jika user nya memiliki level admin
            if ($user->level_id == '1') {
                return redirect()->intended('anggota');
            }
            // jika user nya memiliki level manager
            else if ($user->level_id == '2') {
                return redirect()->intended('bendahara');
            }
            else if ($user->level_id == '3') {
                return redirect()->intended('ketuaPKK');
            }
            else if ($user->level_id == '4') {
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
    ]);

    // Ambil data username dan password dari form
    $credentials = $request->only('username', 'password');

    // Lakukan proses otentikasi
    if (Auth::attempt($credentials)) {
        // Jika otentikasi berhasil, periksa status pengguna
        $user = Auth::user();

        // Periksa apakah status pengguna aktif
        if ($user->status === 'aktif') {
            // Jika aktif, arahkan sesuai dengan levelnya
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
            // Jika status tidak aktif, kembalikan ke halaman login dengan pesan error
            Auth::logout();
            return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Akun Anda dinonaktifkan oleh admin, silahkan hubungi admin']);
        }
    } else {
        return redirect('login')
        ->withInput()
        ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }
}

    public function register()
    {
        // tampilkan view register
        return view('register');
    }

    // aksi form register
    public function proses_register(Request $request)
    {
        // kita buat validasi nih buat proses register
        // validasinya yaitu semua field wajib di isi
        // validasi username itu harus unique atau tidak boleh duplicate username ya
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:m_users',
            'password' => 'required',
        ]);

        // kalau gagal kembali ke halaman register dengan munculkan pesan error
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        // kalau berhasil isi level & hash passwordnya ya biar secure
        $request['level_id'] = '2';
        $request['password'] = Hash::make($request->password);

        // masukkan semua data pada request ke table user
        UserModel::create($request->all());

        // kalo berhasil arahkan ke halaman login
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        // logout itu harus menghapus session nya
        $request->session()->flush();

        // jalan kan juga fungsi logout pada auth
        Auth::logout();
        
        // kembali kan ke halaman login
        return redirect('login');
}
}
