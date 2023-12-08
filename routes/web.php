<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\AdminController;

Route::get('/perpustakaan', [LibraryController::class, 'index']);


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

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
// admin
Route::get('/admin', [AdminController::class, 'index']); 
Route::get('/', function(){
    return view('welcome');
});
//admin

Route::get('/', function () {
    return view('welcome');
});

