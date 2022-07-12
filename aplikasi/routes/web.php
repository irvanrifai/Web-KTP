<?php

use App\Http\Controllers\registrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PenggunaController;

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

Route::get('/', [homeController::class, 'index']);

Route::get('/login', [loginController::class, 'index']);

Route::get('/registrasi', [registrasiController::class, 'index']);

Route::get('/admin', [PenggunaController::class, "index"]);

Route::get('/user', [PendudukController::class, 'index']);
