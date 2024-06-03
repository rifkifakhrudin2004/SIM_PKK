<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KetuaPKKController;
use App\Http\Controllers\BendaharaPKKController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\PembukuanArisanController;


/*
|------------------------------------------------------------------ --------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Manage User
Route::prefix('users')->group(function () { // Grouped user routes
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::post('/', [UsersController::class, 'store'])->name('users.store');
    Route::put('/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::put('/edit_simpan/{id}', [UsersController::class, 'edit_simpan'])->name('user.edit_simpan'); // Changed from /user/{id}
    Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
});
// Manage Login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Grouped routes with auth middleware
Route::middleware('auth')->group(function () {
    // Routes for Anggota (level_id: 1)
    Route::middleware('cek_login:1')->group(function () {
        Route::get('anggota', [AnggotaController::class, 'dashboard']);
    });
    // Routes for Bendahara (level_id: 2)
    Route::middleware('cek_login:2')->group(function () {
        Route::get('bendaharaPKK', [BendaharaPKKController::class, 'dashboard']);
    });
    // Routes for Ketua PKK (level_id: 3)
    Route::middleware('cek_login:3')->group(function () {
        Route::get('ketuaPKK', [KetuaPKKController::class, 'dashboard']);
    });
    // Routes for Admin PKK (level_id: 4)
    Route::middleware('cek_login:4')->group(function () {
        Route::get('AdminPKK', [UsersController::class, 'dashboard']);
    });
});
 

// Nested groups for KetuaPKK
Route::prefix('ketuaPKK')->group(function () {
    Route::get('/', function () {
        return redirect()->route('ketua.dashboard'); // Corrected redirect route
    });
    Route::get('/dashboard', [KetuaPKKController::class, 'dashboard'])->name('ketua.dashboard');
});

// Nested groups for BendaharaPKK
Route::prefix('bendaharaPKK')->group(function () {
    Route::get('/', function () {
        return redirect()->route('bendaharaPKK.dashboard'); // Corrected redirect route
    });
    Route::get('/dashboard', [BendaharaPKKController::class, 'dashboard'])->name('bendaharaPKK.dashboard');

    // Jadwal routes
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwals.index');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwals.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwals.store');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwals.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');
    
   
    Route::get('/data-arisan', [ArisanController::class, 'dataArisan'])->name('arisan.data');
    Route::get('/create', [ArisanController::class, 'create'])->name('arisan.create');
    Route::post('/', [ArisanController::class, 'store'])->name('arisan.store');
    Route::get('/{id}/edit', [ArisanController::class, 'edit'])->name('arisan.edit');
    Route::put('/{id}', [ArisanController::class, 'update'])->name('arisan.update');
    Route::delete('/{id}', [ArisanController::class, 'destroy'])->name('arisan.destroy');
});


// PEMBUKUAN ARISAN
Route::prefix('pembukuan')->group(function() {
    Route::get('/pembukuan', [ArisanController::class, 'pembukuan'])->name('arisan.pembukuan');
    Route::resource('arisan-detail', PembukuanArisanController::class, [
        'names' => [
            'index' => 'pembukuan_arisan.index',
            'create' => 'pembukuan_arisan.create',
            'store' => 'pembukuan_arisan.store',
            'edit' => 'pembukuan_arisan.edit',
            'update' => 'pembukuan_arisan.update',
            'show' => 'pembukuan_arisan.show',
            'destroy' => 'pembukuan_arisan.destroy'
        ]
    ]);
});

// Nested groups for Anggota
Route::prefix('anggota')->group(function () {
    Route::get('/', function () {
        return redirect()->route('anggota.dashboard'); // Corrected redirect route
    });
    Route::get('/dashboard', [AnggotaController::class, 'dashboard'])->name('anggota.dashboard');

    // Jadwal
    Route::get('/jadwal', [AnggotaController::class, 'jadwal'])->name('anggota.jadwal');
});

// User dashboard
Route::prefix('user')->group(function () {
    Route::get('/', function () {
        return redirect()->route('users.dashboard'); // Corrected redirect route
    });
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('users.dashboard');
});

// Manage Konten
Route::prefix('konten')->group(function () {
    Route::get('/', [KontenController::class, 'index'])->name('konten.index');
    Route::get('/create', [KontenController::class, 'create'])->name('konten.create');
    Route::post('/', [KontenController::class, 'store'])->name('konten.store');
    Route::get('/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
    Route::put('/{id}', [KontenController::class, 'update'])->name('konten.update');
    Route::delete('/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');
});
