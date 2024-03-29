<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\penduduk;
use App\Models\pengguna;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepenggunaRequest;
use App\Http\Requests\UpdatepenggunaRequest;
// use Clockwork\Request\Request;
use Illuminate\Http\Request;
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
        // dd(pengguna::latest()->get());
        if ($request->ajax()) {
            $data = pengguna::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit" id="editItem"><span class="badge bg-warning text-dark"><i class="fa fa-pencil"></i></span></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="delete" id="deleteItem"><span class="badge bg-danger"><i
                    class="fa fa-trash"></i></span></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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

        // $validator = FacadesValidator::make($request->all(), [
        //     'nama' => 'required|max:50|string',
        //     'tgl_lahir' => 'required|date',
        //     'alamat' => 'required|max:50',
        // ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['user_id'] = auth()->user()->id;

        // if ($validator->fails()) {
        //     return redirect('/PenggunaController')->withInput()->withErrors($validator)->with('failed_c', 'Add data pengguna unsuccessfull!');
        // } else {
        //     pengguna::create($validator->validate());
        //     return redirect('/PenggunaController')->with('success_c', 'Add data pengguna successfull!');
        // }

        $data = pengguna::updateOrCreate(
            ['id' => $request->data_id],
            ['nama' => $request->nama, 'tgl_lahir' => $request->tgl_lahir, 'alamat' => $request->alamat]
        );
        return response()->json($data);
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
    public function edit(pengguna $pengguna, $id)
    {
        // return view('pengguna', [
        //     'pengguna' => $pengguna
        // ]);

        $data = pengguna::find($id);
        return response()->json($data);
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
    public function destroy(Request $request, pengguna $pengguna, $id)
    {
        // pengguna::destroy($pengguna->id, $id);

        // return redirect('/PenggunaController')->with('success_d', 'Delete data pengguna successfull!');

        $data = pengguna::where('id', $id)->delete();
        // pengguna::where('id', $request->data_id)->delete();


        // pengguna::where('data_id', $request->$id)->delete();
        // return response()->json(['success', 'Data pengguna berhasil dihapus']);
        return response()->json($data);
    }

    public function jumlahData()
    {
        $jumlah = collect(pengguna::all());
        return $jumlah->count();
    }

    // public function dataPengguna()
    // {
    //     $data = pengguna::latest()->get();
    //     return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('action', function ($data) {
    //             $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data_id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm" id="editItem">Edit</a>';

    //             $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data_id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm" id="deleteItem">Delete</a>';
    //             return $btn;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    //     // return DataTables::of($data)->toJson();
    // }
}
