<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registrasiController extends Controller
{
    public function index()
    {
        return view('registrasi', [
            "title" => "E-I KTP | Register"
        ]);
    }

    public function store(Request $request)
    {
        // return $request()->all();
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email:dns|max:70',
            'password' => 'required|min:8|max:40',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success_regis', 'Registration successfull, please login!');

        return redirect('/login');
    }
}
