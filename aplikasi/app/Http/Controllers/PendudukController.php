<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\penduduk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorependudukRequest;
use App\Http\Requests\UpdatependudukRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
        $validator = FacadesValidator::make($request->all(), [
            'foto' => 'required|file|image|max:4096',
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
            // ]);
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['user_id'] = auth()->user()->id;

        // if ($request->validate($rules)) {
        if ($validator->fails()) {
            return redirect('/PendudukController')->withInput()->withErrors($validator)->with('failed_c', 'Add data KTP unsuccessfull!');
        } else {
            penduduk::create($validator->validate());
            return redirect('/PendudukController')->with('success_c', 'Add data KTP successfull!');
        }
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
            'warga' => penduduk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatependudukRequest  $request
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatependudukRequest $request, penduduk $penduduk, $id)
    {
        $validator = FacadesValidator::make($request->all(), [
            'foto' => 'required|file|image|max:4096',
            'NIK' => 'required|size:16|digits:16',
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
        ]);
        // kondisi untuk cek NIK belum jalan
        if ($request->NIK != $penduduk->NIK) {
            $rules['NIK'] = 'required|size:16|digits:16|unique:penduduk';
        }

        // dd($request->NIK, $penduduk->all());

        if ($validator->fails()) {
            return redirect('/PendudukController')->withInput()->withErrors($validator)->with('failed_u', 'Update data KTP unsuccessfull!');
        } else {
            penduduk::where('id', $id)->update($validator->validate());
            return redirect('/PendudukController')->with('success_u', 'Update data KTP successfull!');
        }
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
