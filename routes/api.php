<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Pengunjung\PengunjungController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/users', UserController::class);

Route::get('pegawai', [PegawaiController::class , 'read']);
Route::get('pegawai/show/{id}', [PegawaiController::class , 'show']);
Route::post('pegawai/store', [PegawaiController::class , 'store']);
Route::put('pegawai/update/{id}', [PegawaiController::class , 'update']);
Route::delete('pegawai/destroy/{id}', [PegawaiController::class , 'destroy']);

Route::get('book', [BookController::class , 'read']);
Route::get('book/show/{id}', [BookController::class , 'show']);
Route::post('book/store2', [BookController::class , 'store2']);


Route::group(['prefix' => 'pengunjung'], function () {
    Route::get('get-data',  [PengunjungController::class, 'getPengunjung']);
    Route::post('save-data',  [PengunjungController::class, 'savePengunjung']);
    Route::delete('delete-data',  [PengunjungController::class, 'deletePengunjung']);
});

Route::group(['prefix' => 'menu'], function () {
    Route::get('get-data',  [MenuController::class, 'getMenu']);
});

// Route::resource('/books', BooksController::class);
// // http://127.0.0.1:8000/api/books ->get/post/put/delete


Route::get('books', [BooksController::class , 'index']);
Route::get('books/show/{id}', [BooksController::class , 'show']);
Route::post('books/store', [BooksController::class , 'store']);
Route::put('books/update/{id}', [BooksController::class , 'update']);
Route::delete('books/destroy/{id}', [BooksController::class , 'destroy']);
