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
            'NIK' => 'required|size:16|digits:16|unique:penduduk',
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
            dd('data gagal ditambah');
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
        return view('admin', [
            'data' => $penduduk
        ]);
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
        $rules = [
            'foto' => 'file|image|max:4096',
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
        ];
        if ($request->NIK != $penduduk->NIK) {
            $rules['NIK'] = 'required|size:16|digits:16|unique:penduduk';
        }

        dd($validatedData = $request->validate($rules));

        penduduk::where('id', $penduduk->id)
            ->update($validatedData);

        $request->session()->flash('success_u', 'Update data KTP successfull!');

        return redirect('/PendudukController');

        // if (!$validatedData = $request->validate($rules)) {
        //     dd('data gagal ditambah');
        //     $request->session()->flash('failed_u', 'Update data KTP unsuccessfull!');

        //     return redirect('/PendudukController')->withInput();
        // };


        // // $validatedData['password'] = bcrypt($validatedData['password']);
        // // $validatedData['user_id'] = auth()->user()->id;

        // penduduk::where('id', $id)
        //     ->update($validatedData);

        // $request->session()->flash('success_u', 'Update data KTP successfull!');

        // // return redirect('/admin')->with('success_c', 'Add data KTP successfull!');
        // return redirect('/PendudukController');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(penduduk $penduduk, $id)
    {
        penduduk::destroy($penduduk->id, $id);

        return redirect('/PendudukController')->with('success_d', 'Delete data KTP successfull!');
    }
}
