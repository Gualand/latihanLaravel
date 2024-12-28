<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/inputData', [DashboardController::class, 'inputData']);
Route::post('/kirimData', [DashboardController::class, 'kirimData']);
Route::get('/dataTable', [DashboardController::class, 'dataTable']);

// CRUD using query builder

// 1. CRUD Kategori
// - C
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);

// - R
Route::get('/category', [CategoryController::class, 'index']);
// - R, berdasarkan id detail kategory
Route::get('/category/{kategori_id}', [CategoryController::class, 'detail']);

// - U
Route::get('/category/{kategori_id}/edit', [CategoryController::class, 'edit']);
// - U, berdasarkan id
Route::put('/category/{kategori_id}', [CategoryController::class, 'update']);

// - D
Route::delete('/category/{kategori_id}', [CategoryController::class, 'delete']);


// CRUD using ORM
Route::resource('post', PostController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
