<?php

namespace App\Http\Controllers;

use App\Models\penduduk;
use App\Models\User;
use App\Http\Requests\StorependudukRequest;
use App\Http\Requests\UpdatependudukRequest;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin', [
            "title" => "E-I KTP | Admin",
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
     * @param  \App\Http\Requests\StorependudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorependudukRequest $request)
    {
        if (!$validatedData = $request->validate([
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
            'rt' => 'required',
            'rw' => 'required',
            'add' => 'required|max:50',
        ])) {
            $request->session()->flash('failed_c', 'Add data KTP unsuccessfull!');

            return redirect('/PendudukController')->withInput();
        }
        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['user_id'] = auth()->user()->id;

        penduduk::create($validatedData);

        $request->session()->flash('success_c', 'Add data KTP successfull!');

        // return redirect('/admin')->with('success_c', 'Add data KTP successfull!');
        return redirect('/PendudukController');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatependudukRequest  $request
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatependudukRequest $request, penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(penduduk $penduduk)
    {
        penduduk::destroy($penduduk->id);

        // $request->session()->flash('success_c', 'Add data KTP successfull!');

        return redirect('/PendudukController')->with('success_d', 'Delete data KTP successfull!');
        // return redirect('/PendudukController');
    }
}
