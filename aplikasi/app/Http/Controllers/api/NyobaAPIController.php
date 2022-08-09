<?php

namespace App\Http\Controllers\api;

use App\Models\pengguna;
use Illuminate\Http\Request;
use App\Http\Resources\NyobaAPI;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepenggunaRequest;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class NyobaAPIController extends Controller
{
    public function index()
    {
        $data = pengguna::latest()->paginate(5);

        return new NyobaAPI(true, 'List Data Pengguna Pake API', $data);
    }
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
            // return redirect('/PenggunaController')->withInput()->withErrors($validator)->with('failed_c', 'Add data pengguna unsuccessfull!');
            return response()->json($validator->errors(), 422);
        } else {
            $databaru = pengguna::create($validator->validate());
            // return redirect('/PenggunaController')->with('success_c', 'Add data pengguna successfull!');
            return new NyobaAPI(true, 'Data pengguna baru berhasil ditambahkan pake API', $databaru);
        }
    }
}
