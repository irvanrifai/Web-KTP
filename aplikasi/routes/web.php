<?php

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

Route::get('/', function () {
    // return view('welcome');
    return view('home', [
        "title" => "Web E-I KTP | Home"
    ]);
});

Route::get('/login', function () {
    return view('login', [
        "title" => "Web E-I KTP | Login"
    ]);
});

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

Route::get('/edit', function () {
    return view('edit', [
        "title" => "Web E-I KTP | edit"
    ]);
});

Route::get('/tambah', function () {
    return view('tambah', [
        "title" => "Web E-I KTP | tambah"
    ]);
});
