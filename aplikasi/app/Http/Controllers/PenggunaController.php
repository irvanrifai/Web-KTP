<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Models\penduduk;
use App\Models\User;
use App\Http\Requests\StorepenggunaRequest;
use App\Http\Requests\UpdatepenggunaRequest;
use Illuminate\Database\Eloquent\Collection;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin', [
            "title" => "Web E-I KTP | Admin",
            "data" => penduduk::latest()->get(),
            "jumlahData" => penduduk::all()->count(),
            "userLoggedIn" => User::all()->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenggunaRequest $request)
    {

        $validatedData = $request->validate([
            'foto' => 'file|image|max:4096',
            'NIK' => 'required|size:16|digits:16|unique:penduduk,NIK',
            'nama' => 'required|max:50|string',
            'tm_lahir' => 'required|max:50',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'goldar' => 'required',
            'pekerjaan' => 'required|max:50',
            'wn' => 'required',
            'provinsi' => 'required|max:50',
            'kab' => 'required|max:50',
            'kec' => 'required|max:50',
            'kel' => 'required|max:50',
            'rt' => 'required|max:10',
            'rw' => 'required|max:10',
            'add' => 'required|max:50',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['user_id'] = auth()->user()->id;

        penduduk::create($validatedData);

        $request->session()->flash('success_c', 'Add data KTP successfull!');

        // return redirect('/admin')->with('success_c', 'Add data KTP successfull!');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenggunaRequest  $request
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenggunaRequest $request, pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengguna $pengguna)
    {
        //
    }

    public function jumlahData()
    {
        $jumlah = collect(penduduk::all());
        return $jumlah->count();
    }
}
