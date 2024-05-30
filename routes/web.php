<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KetuaPKKController;
use App\Http\Controllers\BendaharaPKKController;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('welcome');
});

// Manage User
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::put('/user/{id}', [UsersController::class, 'edit_simpan'])->name('user.edit_simpan');
Route::get('/user/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');

// Ketua PKK
Route::prefix('ketuaPKK')->group(function () {
    Route::get('/', function () {
        return redirect()->route('ketuaPKK.dashboard');
    });

    Route::get('/dashboard', [KetuaPKKController::class, 'dashboard'])->name('ketuaPKK.dashboard');
});

// Bendahara PKK
Route::prefix('bendaharaPKK')->group(function () {
    Route::get('/', function () {
        return redirect()->route('bendaharaPKK.dashboard');
    });

    Route::get('/dashboard', [BendaharaPKKController::class, 'dashboard'])->name('bendaharaPKK.dashboard');
    Route::get('/arisan', [ArisanController::class, 'index'])->name('bendaharaPKK.arisan');
<<<<<<< HEAD
});

    Route::get('/data-arisan', [ArisanController::class, 'dataArisan'])->name('arisan.data');
    Route::get('/jadwal', [ArisanController::class, 'jadwal'])->name('arisan.jadwal');
    Route::get('/pembukuan', [ArisanController::class, 'pembukuan'])->name('arisan.pembukuan');
    Route::resource('/arisan', ArisanController::class)->except(['index', 'show']);
=======

    // Jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwals.index');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwals.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwals.store');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwals.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');
});
>>>>>>> a2aaace6ea67efea5a603fbf7803fabda9daf8f0


// Anggota
Route::prefix('anggota')->group(function () {
    Route::get('/', function () {
        return redirect()->route('anggota.dashboard');
    });

    Route::get('/dashboard', [AnggotaController::class, 'dashboard'])->name('anggota.dashboard');

<<<<<<< HEAD


// DATA ARISAN
Route::prefix('arisan')->middleware('auth')->group(function() {
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
=======
    // Jadwal
    Route::get('/jadwal', [AnggotaController::class, 'jadwal'])->name('anggota.jadwal');
>>>>>>> a2aaace6ea67efea5a603fbf7803fabda9daf8f0
});



// User
Route::prefix('user')->group(function () {
    Route::get('/', function () {
        return redirect()->route('users.dashboard');
<<<<<<< HEAD
    });
// Nested groups for KetuaPKK
    Route::prefix('ketuaPKK')->group(function () {
        Route::get('/', function () {
            return redirect()->route('ketua.dashboard'); // Corrected redirect route
        });
        Route::get('/dashboard', [KetuaPKKController::class, 'dashboard'])->name('ketua.dashboard');
=======
>>>>>>> a2aaace6ea67efea5a603fbf7803fabda9daf8f0
    });

    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('users.dashboard');

    // Manage Konten
    Route::get('/konten', [KontenController::class, 'index'])->name('user.konten');
});

// Manage Konten
<<<<<<< HEAD
    Route::prefix('konten')->group(function () {
        Route::get('/', [KontenController::class, 'index'])->name('konten.index');
        Route::get('/create', [KontenController::class, 'create'])->name('konten.create');
        Route::post('/', [KontenController::class, 'store'])->name('konten.store');
        Route::get('/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
        Route::put('/{id}', [KontenController::class, 'update'])->name('konten.update');
        Route::delete('/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');
    });
});
=======
Route::get('/konten', [KontenController::class, 'index'])->name('konten.index');
Route::get('/konten/create', [KontenController::class, 'create'])->name('konten.create');
Route::post('/konten', [KontenController::class, 'store'])->name('konten.store');
Route::get('/konten/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
Route::put('/konten/{id}', [KontenController::class, 'update'])->name('konten.update');
Route::delete('/konten/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');

>>>>>>> a2aaace6ea67efea5a603fbf7803fabda9daf8f0
