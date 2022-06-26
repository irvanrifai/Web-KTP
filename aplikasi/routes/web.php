<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
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

Route::get('/', [homeController::class, 'index']);
Route::get('/login', [loginController::class, 'index']);

Route::get('/admin', function () {
    return view('admin', [
        "title" => "Web E-I KTP | admin"
    ]);
});

Route::get('/user', function () {
    return view('user', [
        "title" => "Web E-I KTP | user"
    ]);
});
