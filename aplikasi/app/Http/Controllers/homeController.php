<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use App\Models\penduduk;

class homeController extends Controller
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
                ->orWhere('kec', 'like', '%' . request('cari') . '%')
                ->orWhere('kel', 'like', '%' . request('cari') . '%')
                ->orWhere('add', 'like', '%' . request('cari') . '%')
                ->orWhere('tm_lahir', 'like', '%' . request('cari') . '%')
                ->orWhere('nik', 'like', '%' . request('cari') . '%');
        }
        // dd(request('cari'));
        return view('home', [
            "title" => "E-I KTP",
            "data" => $query->paginate(5)->withQueryString(),
            "jumlahData" => penduduk::all()->count(),
            "userLoggedIn" => pengguna::all()->count()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
