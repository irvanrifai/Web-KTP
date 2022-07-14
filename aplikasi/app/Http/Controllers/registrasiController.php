<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registrasiController extends Controller
{
    public function index()
    {
        return view('registrasi', [
            "title" => "Web E-I KTP | Register"
        ]);
    }

    public function store(Request $request)
    {
        // return $request()->all();
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:dns|max:100',
            'password' => 'required|min:8|max:20',
        ]);
    }
}
