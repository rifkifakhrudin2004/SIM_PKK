<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KetuaPKKController;
use App\Http\Controllers\BendaharaPKKController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;

/*
|--------------------------------------------------------------------------
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
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

// Manage Login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::resource('anggota.dashboard', AnggotaController::class);
    });
    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::resource('bendahara', BendaharaPKKController::class);
    });
    Route::group(['middleware' => ['cek_login:3']], function () {
        Route::resource('ketua', KetuaPKKController::class);
    });

    // KetuaPKK
    Route::prefix('ketuaPKK')->group(function () {
        Route::get('/', function () {
            return redirect()->route('ketuaPKK.dashboard');
        });
        Route::get('/dashboard', [KetuaPKKController::class, 'dashboard'])->name('ketuaPKK.dashboard');
    });

    // BendaharaPKK
    Route::prefix('bendaharaPKK')->group(function () {
        Route::get('/', function () {
            return redirect()->route('bendaharaPKK.dashboard');
        });
        Route::get('/dashboard', [BendaharaPKKController::class, 'dashboard'])->name('bendaharaPKK.dashboard');
    });

    // Anggota
    Route::prefix('anggota')->group(function () {
        Route::get('/', function () {
            return redirect()->route('anggota.dashboard');
        });
        Route::get('/dashboard', [AnggotaController::class, 'dashboard'])->name('anggota.dashboard');
    });

    // User
    Route::prefix('user')->group(function () {
        Route::get('/', function () {
            return redirect()->route('users.dashboard');
        });
        Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('users.dashboard');
        // Manage Konten
        Route::get('/konten', [KontenController::class, 'index'])->name('user.konten');
    });

    // Manage Konten
    Route::get('/konten', [KontenController::class, 'index'])->name('konten.index');
    Route::get('/konten/create', [KontenController::class, 'create'])->name('konten.create');
    Route::post('/konten', [KontenController::class, 'store'])->name('konten.store');
    Route::get('/konten/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
    Route::put('/konten/{id}', [KontenController::class, 'update'])->name('konten.update');
    Route::delete('/konten/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');
});
