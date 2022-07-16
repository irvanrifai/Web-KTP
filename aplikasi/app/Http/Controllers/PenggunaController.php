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
        $query = penduduk::latest();
        if (request('cari')) {
            $query->where('nama', 'like', '%' . request('cari') . '%')
                ->orWhere('nik', 'like', '%' . request('cari') . '%')
                ->orWhere('provinsi', 'like', '%' . request('cari') . '%')
                ->orWhere('kab', 'like', '%' . request('cari') . '%')
                ->orWhere('add', 'like', '%' . request('cari') . '%')
                ->orWhere('tm_lahir', 'like', '%' . request('cari') . '%')
                ->orWhere('nik', 'like', '%' . request('cari') . '%');
        }
        // dd(request('cari'));
        return view('admin', [
            "title" => "Web E-I KTP | Admin",
            "data" => $query->get(),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenggunaRequest $request)
    {
        //
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
