@extends('layouts.main')

@section('container')

<h1 class="mb-4">Tambah data</h1>

<form>
    <div class="row mb-2">
        <div class="mb-3 col-md-4 form-group">
          <label for="nik" class="form-label">NIK</label>
          <input type="number" class="form-control" id="nik">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama">
          <label for="tm_lahir" class="form-label">Tempat</label>
          <input type="text" class="form-control" id="tm_lahir">
          <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
          <input type="date" class="form-control" id="tgl_lahir">
          
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <input type="select" class="form-control" id="jk">
          
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamat">
          
          <label for="agama" class="form-label">Agama</label>
          <input type="select" class="form-control" id="agama">
          
          <label for="status" class="form-label">Status</label>
          <input type="select" class="form-control" id="status">
          
          <label for="pekerjaan" class="form-label">Pekerjaan</label>
          <input type="select" class="form-control" id="pekerjaan">
          
          <label for="wn" class="form-label">Warga negara</label>
          <input type="select" class="form-control" id="wn">
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>

@endsection