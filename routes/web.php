<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;

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

Route::resource('albums', AlbumController::class);

//Route::get('/albums', [AlbumController::class, 'index']);
//Route::get('/albums/create', [AlbumController::class, 'create']);
//Route::post('/albums', [AlbumController::class, 'store']);
//Route::get('/albums/{id}/edit', [AlbumController::class, 'edit']);
//Route::put('/albums/{id}', [AlbumController::class, 'update']);
//Route::delete('/albums/{id}', [AlbumController::class, 'destroy']);


