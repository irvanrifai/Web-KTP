@extends('layouts.main')

@section('container')

<h1 class="mb-4">Hello, user!</h1>

<div class="row">
    <div class="col-sm-5 me-2">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Penduduk</h5>
          <p class="card-text">Admin dapat mengelola semua data KTP dari import data .csv hingga export ke .csv dan .pdf.</p>
          <a href="/data_ktp" class="btn btn-primary">Selengkapnya</a>
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ekspor </h5>
          <p class="card-text">Admin dapat memantau atau mengawasi aktivitas user ketika mengakses sistem ini.</p>
          <a href="/act_user" class="btn btn-primary">Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>

@endsection