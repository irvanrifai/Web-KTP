<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\penduduk;
use App\Models\pengguna;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepenggunaRequest;
use App\Http\Requests\UpdatepenggunaRequest;
use Clockwork\Request\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Yajra\DataTables\DataTablesServiceProvider;
use Yajra\DataTables\DataTables;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request) {
        //     return DataTables::of(pengguna::latest()->get())->make(true)
        // }
        return view('pengguna', [
            "title" => "Web Pengguna",
            "data" => pengguna::latest()->get(),
            "jumlahData" => pengguna::all()->count(),
            "userLoggedIn" => User::all()->count(),
            // "datatables" => DataTables::of(pengguna::latest()->get())->make(true),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenggunaRequest $request)
    {

        $validator = FacadesValidator::make($request->all(), [
            'nama' => 'required|max:50|string',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['user_id'] = auth()->user()->id;

        if ($validator->fails()) {
            return redirect('/PenggunaController')->withInput()->withErrors($validator)->with('failed_c', 'Add data pengguna unsuccessfull!');
        } else {
            pengguna::create($validator->validate());
            return redirect('/PenggunaController')->with('success_c', 'Add data pengguna successfull!');
        }
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
        return view('pengguna', [
            'pengguna' => $pengguna
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenggunaRequest  $request
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenggunaRequest $request, pengguna $pengguna, $id)
    {
        $validator = FacadesValidator::make($request->all(), [
            'nama' => 'required|max:50|string',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validator['user_id'] = auth()->user()->id;

        if ($validator->fails()) {
            return redirect('/PenggunaController')->withInput()->withErrors($validator)->with('failed_u', 'Update data pengguna unsuccessfull!');
        } else {
            pengguna::where('id', $id)->update($validator->validate());
            return redirect('/PenggunaController')->with('success_u', 'Update data pengguna successfull!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengguna $pengguna, $id)
    {
        pengguna::destroy($pengguna->id, $id);

        return redirect('/PenggunaController')->with('success_d', 'Delete data pengguna successfull!');
    }

    public function jumlahData()
    {
        $jumlah = collect(pengguna::all());
        return $jumlah->count();
    }

    public function dataPengguna()
    {
        $data = pengguna::latest()->get();
        return DataTables::of($data)->make(true);
        // return DataTables::of($data)->toJson();
    }
}
