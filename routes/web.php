<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);

// dashboard admin
Route::get('/admin',[AdminController::class,'index']);

// manage kategori
Route::get('/admin/kategori',[KategoriController::class,'index']);
Route::get('/admin/kategori/tambah',[KategoriController::class,'tambah']);
Route::post('/admin/kategori/prosesTambah',[KategoriController::class,'prosesTambah']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
