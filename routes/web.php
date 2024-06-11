<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KetuaPKKController;
use App\Http\Controllers\BendaharaPKKController;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\UploadKetuaController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\PembukuanArisanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
//SPK
use App\Http\Livewire\Alternatif\Index as AlternatifIndex;
use App\Http\Livewire\Alternatif\Create as AlternatifCreate;
use App\Http\Livewire\Alternatif\Edit as AlternatifEdit;
use App\Http\Livewire\Kriteria\Index as KriteriaIndex;
use App\Http\Livewire\Kriteria\Create as KriteriaCreate;
use App\Http\Livewire\Kriteria\Edit as KriteriaEdit;
use App\Http\Livewire\Penilaian\Index as PenilaianIndex;
use App\Http\Livewire\Penilaian\Edit as PenilaianEdit;
use App\Http\Livewire\Subkriteria\Create as SubkriteriaCreate;
use App\Http\Livewire\Proses\Index as ProsesIndex;
use App\Http\Livewire\Perhitungan\Index as PerhitunganIndex;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::delete('/image/destroy', [UploadKetuaController::class, 'destroy'])->name('image.destroy');

// Manage User
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']); //menampilkan data user dalam bentuk json untuk database
    Route::get('create', [UserController::class, 'create']); //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); //menghapus data user
});
Route::group(['prefix' => 'dataAnggota'], function () {
    Route::get('/', [DataAnggotaController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [DataAnggotaController::class, 'list']); //menampilkan data user dalam bentuk json untuk database
    Route::get('create', [DataAnggotaController::class, 'create']); //menampilkan halaman form tambah user
    Route::post('/', [DataAnggotaController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [DataAnggotaController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [DataAnggotaController::class, 'edit']); //menampilkan halaman form edit user
    Route::put('/{id}', [DataAnggotaController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [DataAnggotaController::class, 'destroy']); //menghapus data user
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
        Route::get('bendahara', [BendaharaPKKController::class, 'dashboard']);
    });
    // Routes for Ketua PKK (level_id: 3)
    Route::middleware('cek_login:3')->group(function () {
        Route::get('ketuaPKK', [KetuaPKKController::class, 'dashboard']);
    });
    // Routes for Admin PKK (level_id: 4)
    Route::middleware('cek_login:4')->group(function () {
        Route::get('AdminPKK', [UserController::class, 'dashboard']);
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
    Route::get('/index', [BendaharaPKKController::class, 'indexBendahara']);
    Route::put('/index/{id}', [BendaharaPKKController::class, 'updateVerifikasi']);

    // Jadwal routes
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwals.index');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwals.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwals.store');
    Route::get('jadwal/{id}', [JadwalController::class, 'show'])->name('jadwals.show');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwals.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');
    
    // Data Arisan
        Route::get('/data-arisan', [ArisanController::class, 'index'])->name('arisan.index');
        Route::get('/data-arisan/create', [ArisanController::class, 'create'])->name('arisan.create');
        Route::post('/data-arisan', [ArisanController::class, 'store'])->name('arisan.store');
        Route::get('/data-arisan/{id}', [ArisanController::class, 'show'])->name('arisan.show');
        Route::get('/data-arisan{id}/edit', [ArisanController::class, 'edit'])->name('arisan.edit');
        Route::put('/data-arisan/{id}', [ArisanController::class, 'update'])->name('arisan.update');
        Route::delete('/data-arisan/{id}', [ArisanController::class, 'destroy'])->name('arisan.destroy');

    // Pembukuan Arisan
    Route::get('/pembukuan', [PembukuanArisanController::class, 'index'])->name('pembukuan.index');
    Route::get('/pembukuan/create', [PembukuanArisanController::class, 'create'])->name('pembukuan.create');
    Route::post('/pembukuan', [PembukuanArisanController::class, 'store'])->name('pembukuan.store');
    Route::get('pembukuan/{id}', [PembukuanArisanController::class, 'show'])->name('pembukuan.show');
    Route::get('/pembukuan/{id}/edit', [PembukuanArisanController::class, 'edit'])->name('pembukuan.edit');
    Route::put('/pembukuan/{id}', [PembukuanArisanController::class, 'update'])->name('pembukuan.update');
    Route::delete('/pembukuan/{id}', [PembukuanArisanController::class, 'destroy'])->name('pembukuan.destroy');
});


Route::get('/data-arisan', [ArisanController::class, 'dataArisan'])->name('arisan.data');
Route::get('/jadwal', [ArisanController::class, 'jadwal'])->name('arisan.jadwal');
Route::get('/pembukuan', [ArisanController::class, 'pembukuan'])->name('arisan.pembukuan');
Route::resource('/arisan', ArisanController::class)->except(['index', 'show']);



// Nested groups for Anggota
Route::prefix('anggota')->group(function () {
    Route::get('/', function () {
        return redirect()->route('anggota.dashboard'); // Corrected redirect route
    });
    Route::get('/dashboard', [AnggotaController::class, 'dashboard'])->name('anggota.dashboard');

    // Jadwal
    Route::get('/jadwal', [AnggotaController::class, 'jadwal'])->name('anggota.jadwal');

    // data arisan
    Route::get('/data-arisan', [AnggotaController::class, 'dataArisan'])->name('anggota.data-arisan');

    // pembukuan
    Route::get('/pembukuan', [AnggotaController::class, 'pembukuan'])->name('anggota.pembukuan');

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

    Route::prefix('konten')->group(function () {
        Route::get('/', [KontenController::class, 'index'])->name('konten.index');
        Route::get('/create', [KontenController::class, 'create'])->name('konten.create');
        Route::post('/', [KontenController::class, 'store'])->name('konten.store');
        Route::get('/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
        Route::put('/{id}', [KontenController::class, 'update'])->name('konten.update');
        Route::delete('/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');
    });

    Route::get('/ketuaPKK/upload', [UploadKetuaController::class, 'index'])->name('ketuaPKK.index');
    Route::post('/ketuaPKK/upload', [UploadKetuaController::class, 'upload'])->name('ketuaPKK.upload');

    Route::get('/konten', [KontenController::class, 'index'])->name('konten.index');
    Route::get('/konten/create', [KontenController::class, 'create'])->name('konten.create');
    Route::post('/konten', [KontenController::class, 'store'])->name('konten.store');
    Route::get('/konten/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
    Route::put('/konten/{id}', [KontenController::class, 'update'])->name('konten.update');
    Route::delete('/konten/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');

    
// SPK
// Route::get('/alternatif', AlternatifIndex::class)->name('alternatif.index');
// 	// route data alternatif 
// 	Route::get('/alternatif/create', AlternatifCreate::class)->name('alternatif.create');
// 	Route::get('/alternatif/{id}/edit', AlternatifEdit::class)->name('alternatif.edit');

// 	// route data kriteria
// 	Route::get('/kriteria', KriteriaIndex::class)->name('kriteria.index');
// 	Route::get('/kriteria/create', KriteriaCreate::class)->name('kriteria.create');
// 	Route::get('/kriteria/{id}/edit', KriteriaEdit::class)->name('kriteria.edit');

// 	// route data sub kriteria
// 	Route::get('/subkriteria/{kriteria}/create', SubkriteriaCreate::class)->name('subkriteria.create');

// 	// route penilaian
// 	Route::get('/penilaian', PenilaianIndex::class)->name('penilaian.index');
// 	Route::get('/penilaian/{altId}/edit', PenilaianEdit::class)->name('penilaian.edit');
	
// 	Route::get('/ranking', ProsesIndex::class)->name('proses.index');
// 	Route::get('/perhitungan', PerhitunganIndex::class)->name('perhitungan.index');



