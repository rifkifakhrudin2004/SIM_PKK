<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KontenController;


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
//Manage User
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::get('/user', [UsersController::class, 'index'])->name('user.index');
Route::post('/user', [UsersController::class, 'store']);
Route::put('/user/{id}', [UsersController::class, 'edit_simpan'])->name('user.edit_simpan');
Route::get('/user/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');

//manage Konten
Route::get('/konten', [KontenController::class, 'index'])->name('konten.index');
Route::get('/konten/create', [KontenController::class, 'create'])->name('konten.create');
Route::post('/konten', [KontenController::class, 'store'])->name('konten.store');
Route::get('/konten/{id}/edit', [KontenController::class, 'edit'])->name('konten.edit');
Route::put('/konten/{id}', [KontenController::class, 'update'])->name('konten.update');
Route::delete('/konten/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');
