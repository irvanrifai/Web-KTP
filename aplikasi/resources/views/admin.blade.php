@extends('layouts.main')

@section('container')
    <div class="row mt-4">
        {{-- alert success login --}}
        @if (session()->has('success_login_a'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_login_a') }}
                </div>
            </div>
        @endif
        @if (session()->has('success_login_u'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_login_u') }}
                </div>
            </div>
        @endif

        {{-- alert condition create --}}
        @if (session()->has('success_c'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_c') }}
                </div>
            </div>
        @endif
        @if (session()->has('failed_c'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    {{ session('failed_c') }}
                </div>
            </div>
        @endif

        {{-- alert condition update --}}
        @if (session()->has('success_u'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_u') }}
                </div>
            </div>
        @endif
        @if (session()->has('failed_u'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    {{ session('failed_u') }}
                </div>
            </div>
        @endif

        {{-- alert condition delete --}}
        @if (session()->has('success_d'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_d') }}
                </div>
            </div>
        @endif
        @if (session()->has('failed_d'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    {{ session('failed_d') }}
                </div>
            </div>
        @endif

        {{-- dashboard info card --}}
        <div class="col">
            <div class="container-fluid">
                <div class="row">
                    <h3>User Activity</h3>

                    <!-- total data ktp -->
                    <div class="col-xl-4 col-md-6 mb-4 mt-3">
                        <div class="card border-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data
                                            KTP</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahData }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-file fa-2x text-gray-300" style="color:darkblue; opacity:60%;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- total user -->
                    <div class="col-xl-4 col-md-6 mb-4 mt-3">
                        <div class="card border-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">User Logged in
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userLoggedIn }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300" style="color:red; opacity:60%;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- tabel data --}}
    <div class="row mt-4">
        <div class="col">
            <h3>Pengelolaan Data KTP</h3>
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambah"><i
                    class="fa fa-plus"></i>
                Tambah data
            </button>
            <div style="float: right;">
                <button type="button" class="btn btn-outline-success my-3" data-bs-toggle="modal"
                    data-bs-target="#import_d"><i class="fa fa-file-arrow-down"></i>
                    Import
                </button>
                <a align="right" class="btn btn-outline-primary no-print" data-bs-toggle="modal"
                    data-bs-target="#export_d"><i class="fa fa-file-export"></i> Export</a>
            </div>
            <div class="table-responsive">
                <table id="tb_ktp" class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat/Tgl Lahir</th>
                            <th scope="col">Jenis kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                {{-- <td><img src="https://source.unsplash.com/100x120/?man" alt=""></td> --}}
                                <td><img src="img/SD-default-image.png" width="100" height="110" alt="">
                                </td>
                                <td>{{ $d->NIK }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->tm_lahir }}, {{ $d->tgl_lahir }}</td>
                                <td>{{ $d->jk }}</td>
                                <td>{{ $d->add }}, RT {{ $d->rt }}/ RW {{ $d->rw }},
                                    {{ $d->kel }}, {{ $d->kec }}, {{ $d->kab }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a data-bs-toggle="modal" data-bs-target="#edit<?= $d['id'] ?>"><span
                                                class="badge bg-warning text-dark"><i class="fa fa-pencil"></i></span></a>
                                        <a data-bs-toggle="modal" class="mx-1"
                                            data-bs-target="#hapus<?= $d['id'] ?>"><span class="badge bg-danger"><i
                                                    class="fa fa-trash"></i></span></a>
                                        <a data-bs-toggle="modal" data-bs-target="#detail<?= $d['id'] ?>"><span
                                                class="badge bg-info"><i class="fa-solid fa-info mx-1"></i></span></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tb_ktp').DataTable();
        });
    </script>

    <!-- modal untuk tambah data -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form novalidate action="/PendudukController" role="form" method="POST"
                    enctype="multipart/form-data" id="form_tambah" class="needs-validation">
                    @csrf
                    <input type="hidden" name="berlaku" id="berlaku" value="Seumur Hidup">
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <div class="row mb-3">
                                <label class="mb-2"><b>Pilih Foto</b></label>
                                <div class="col-sm-2">
                                    <img src="img/SD-default-image.png" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-md-4"><span class="text-danger">*</span>
                                    <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                        id="foto" name="foto" value="{{ old('foto') }}"
                                        onchange="preview_img()">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row mb-2 g-3">
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="NIK" class="form-label">NIK</label><span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control @error('NIK') is-invalid @enderror"
                                        name="NIK" id="NIK" placeholder="Nomor Induk Kependudukan" required
                                        maxlength="16" value="{{ old('NIK') }}">
                                    @error('NIK')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="nama" class="form-label">Nama</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" id="nama" placeholder="Nama lengkap" required
                                        value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="tm_lahir" class="form-label">Tempat lahir</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('tm_lahir') is-invalid @enderror"
                                        name="tm_lahir" id="tm_lahir" placeholder="Jakarta" required
                                        value="{{ old('tm_lahir') }}">
                                    @error('tm_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="tgl_lahir" class="form-label">Tanggal lahir</label><span
                                        class="text-danger">*</span>
                                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                        name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-2 form-group">
                                    <label for="jk" class="form-label">Jenis Kelamin</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('jk') is-invalid @enderror" id="jk"
                                        name="jk">
                                        <option value="{{ old('jk') ? old('jk') : '' }}" selected disabled>Pilih
                                        </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option>
                                    </select>
                                    @error('jk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-2 form-group">
                                    <label for="agama" class="form-label">Agama</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('agama') is-invalid @enderror" id="agama"
                                        name="agama">
                                        <option value="{{ old('agama') ? old('agama') : '' }}" selected disabled>Pilih
                                        </option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghu chu">Konghu chu</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('agama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-2 form-group">
                                    <label for="status" class="form-label">Status</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option value="{{ old('status') ? old('status') : '' }}" selected disabled>Pilih
                                        </option>
                                        <option value="Belum kawin">Belum kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai">Cerai</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-2 form-group">
                                    <label for="goldar" class="form-label">Gol. Darah</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('goldar') is-invalid @enderror" id="goldar"
                                        name="goldar">
                                        <option value="{{ old('goldar') ? old('goldar') : '' }}" selected disabled>Pilih
                                        </option>
                                        <option value="A">A</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="-">-</option>
                                    </select>
                                    @error('goldar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3 form-group">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                        name="pekerjaan" id="pekerjaan" placeholder="Pengusaha" required
                                        value="{{ old('pekerjaan') }}">
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <label for="alamat" class="form-label">Alamat</label>

                                <div class="mb-3 col-md-2 form-group">
                                    <label for="wn" class="form-label">Warga Negara</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('wn') is-invalid @enderror" id="wn"
                                        name="wn">
                                        <option value="{{ old('wn') ? old('wn') : '' }}" selected disabled>Warga Negara
                                        </option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                    @error('wn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-2 form-group">
                                    <label for="provinsi" class="form-label">Provinsi</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('provinsi') is-invalid @enderror" id="provinsi"
                                        name="provinsi">
                                        <option value="{{ old('provinsi') ? old('provinsi') : '' }}" selected disabled>
                                            Provinsi</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option>
                                    </select>
                                    @error('provinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-2 form-group">
                                    <label for="kab" class="form-label">Kabupaten</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('kab') is-invalid @enderror" id="kab"
                                        name="kab">
                                        <option value="{{ old('kab') ? old('kab') : '' }}" selected disabled>
                                            Kabupaten/Kota</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option>
                                    </select>
                                    @error('kab')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-2 form-group">
                                    <label for="kec" class="form-label">Kecamatan</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('kec') is-invalid @enderror" id="kec"
                                        name="kec">
                                        <option value="{{ old('kec') ? old('kec') : '' }}" selected disabled>Kecamatan
                                        </option>
                                        <option value="Tidak diketahui">Tidak diketahui</option>
                                    </select>
                                    @error('kec')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-2 form-group">
                                    <label for="kel" class="form-label">Kelurahan / Desa</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('kel') is-invalid @enderror" id="kel"
                                        name="kel">
                                        <option value="{{ old('kel') ? old('kel') : '' }}" selected disabled>Kel/Desa
                                        </option>
                                        <option value="Tidak diketahui">Tidak diketahui</option>
                                    </select>
                                    @error('kel')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-1 form-group">
                                    <label for="rt" class="form-label">RT</label><span class="text-danger">*</span>
                                    <select class="form-select @error('rt') is-invalid @enderror" id="rt"
                                        name="rt">
                                        <option value="{{ old('rt') ? old('rt') : '' }}" selected disabled>RT</option>
                                        <option value="Tidak diketahui">02</option>
                                    </select>
                                    @error('rt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-1 form-group">
                                    <label for="rw" class="form-label">RW</label><span class="text-danger">*</span>
                                    <select class="form-select @error('rw') is-invalid @enderror" id="rw"
                                        name="rw">
                                        <option value="{{ old('rw') ? old('rw') : '' }}" selected disabled>RW</option>
                                        <option value="Tidak diketahui">03</option>
                                    </select>
                                    @error('rw')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4 form-group">
                                    <label for="add" class="form-label">Alamat tambahan</label><span
                                        class="text-danger">*</span>
                                    <textarea type="textarea" class="form-control @error('add') is-invalid @enderror" name="add" id="alamat"
                                        placeholder="Alamat tambahan" required value="{{ old('add') }}"></textarea>
                                    @error('add')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                        <button type="submit" class="bi bi-plus-square btn btn-primary" id="btn_tambah"><i
                                class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal untuk edit data -->
    @foreach ($data as $d)
        <div class="modal fade" id="edit<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/PendudukController/{{ $d->id }}" method="POST" role="form"
                        enctype="multipart/form-data" class="needs-validation">
                        @method('PUT')
                        {{-- @method('PATCH') --}}
                        @csrf
                        <input type="hidden" name="berlaku" id="berlaku" value="Seumur Hidup">
                        {{-- <input type="hidden" name="NIK" id="NIK" value="{{ $d->NIK }}"> --}}
                        <div class="modal-body">
                            <div class="mb-3 form-group">
                                <div class="row mb-3">
                                    <label class="mb-2"><b>Pilih Foto</b></label>
                                    <div class="col-sm-2">
                                        {{-- <img src="{{ old('foto', $d->foto, 'img/SD-default-image.png') }}" class="img-thumbnail img-preview"> --}}
                                        <img src="img/SD-default-image.png" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-md-4"><span class="text-danger">*</span>
                                        <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                            id="foto" name="foto" value="{{ old('foto', $d->foto) }}"
                                            onchange="preview_img()">
                                        @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row mb-2 g-3">
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="NIK" class="form-label">NIK</label><span
                                            class="text-danger">*</span>
                                        <input type="number" class="form-control @error('NIK') is-invalid @enderror"
                                            name="NIK" id="NIK" placeholder="Nomor Induk Kependudukan" required
                                            maxlength="16" value="{{ old('NIK', $d->NIK) }}">
                                        @error('NIK')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="nama" class="form-label">Nama</label><span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" id="nama" placeholder="Nama lengkap" required
                                            value="{{ old('nama', $d->nama) }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="tm_lahir" class="form-label">Tempat lahir</label><span
                                            class="text-danger">*</span>
                                        <input type="text"
                                            class="form-control @error('tm_lahir') is-invalid @enderror" name="tm_lahir"
                                            id="tm_lahir" placeholder="Jakarta" required
                                            value="{{ old('tm_lahir', $d->tm_lahir) }}">
                                        @error('tm_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="tgl_lahir" class="form-label">Tanggal lahir</label><span
                                            class="text-danger">*</span>
                                        <input type="date"
                                            class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            name="tgl_lahir" id="tgl_lahir"
                                            value="{{ old('tgl_lahir', $d->tgl_lahir) }}">
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="jk" class="form-label">Jenis Kelamin</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('jk') is-invalid @enderror" id="jk"
                                            name="jk">
                                            <option value="{{ old('jk', $d->jk) }}" selected disabled>
                                                {{ old('jk', $d->jk) }}</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Tidak diketahui">Tidak diketahui</option>
                                        </select>
                                        @error('jk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="agama" class="form-label">Agama</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('agama') is-invalid @enderror" id="agama"
                                            name="agama">
                                            <option value="{{ old('agama', $d->agama) }}" selected disabled>
                                                {{ old('agama', $d->agama) }}</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Konghu chu">Konghu chu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('agama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="status" class="form-label">Status</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status"
                                            name="status">
                                            <option value="{{ old('status', $d->status) }}" selected disabled>
                                                {{ old('status', $d->status) }}</option>
                                            <option value="Belum kawin">Belum kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai">Cerai</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="goldar" class="form-label">Gol. Darah</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('goldar') is-invalid @enderror" id="goldar"
                                            name="goldar">
                                            <option value="{{ old('goldar', $d->goldar) }}" selected disabled>
                                                {{ old('goldar', $d->goldar) }}</option>
                                            <option value="A">A</option>
                                            <option value="O">O</option>
                                            <option value="AB">AB</option>
                                            <option value="B">B</option>
                                            <option value="-">-</option>
                                        </select>
                                        @error('goldar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="pekerjaan" class="form-label">Pekerjaan</label><span
                                            class="text-danger">*</span>
                                        <input type="text"
                                            class="form-control @error('pekerjaan') is-invalid @enderror"
                                            name="pekerjaan" id="pekerjaan" placeholder="Pengusaha" required
                                            value="{{ old('pekerjaan', $d->pekerjaan) }}">
                                        @error('pekerjaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="wn" class="form-label">Warga negara</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('wn') is-invalid @enderror" id="wn"
                                            name="wn">
                                            <option value="{{ old('wn', $d->wn) }}" selected disabled>
                                                {{ old('wn', $d->wn) }}</option>
                                            <option value="WNI">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                        @error('wn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="provinsi" class="form-label">Provinsi</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('provinsi') is-invalid @enderror"
                                            id="provinsi" name="provinsi">
                                            <option value="{{ old('provinsi', $d->provinsi) }}" selected disabled>
                                                {{ old('provinsi', $d->provinsi) }}</option>
                                            <option value="Tidak diketahui">Tidak diketahui</option>
                                        </select>
                                        @error('provinsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="kab" class="form-label">Kabupaten / Kota</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('kab') is-invalid @enderror" id="kab"
                                            name="kab">
                                            <option value="{{ old('kab', $d->kab) }}" selected disabled>
                                                {{ old('kab', $d->kab) }}</option>
                                            <option value="Tidak diketahui">Tidak diketahui</option>
                                        </select>
                                        @error('kab')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="kec" class="form-label">Kecamatan</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('kec') is-invalid @enderror" id="kec"
                                            name="kec">
                                            <option value="{{ old('kec', $d->kec) }}" selected disabled>
                                                {{ old('kec', $d->kec) }}</option>
                                            <option value="Tidak diketahui">Tidak diketahui</option>
                                        </select>
                                        @error('kec')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="kel" class="form-label">Kel / Desa</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('kel') is-invalid @enderror" id="kel"
                                            name="kel">
                                            <option value="{{ old('kel', $d->kel) }}" selected disabled>
                                                {{ old('kel', $d->kel) }}</option>
                                            <option value="Tidak diketahui">Tidak diketahui</option>
                                        </select>
                                        @error('kel')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-1 form-group">
                                        <label for="rt" class="form-label">RT</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('rt') is-invalid @enderror" id="rt"
                                            name="rt">
                                            <option value="{{ old('rt', $d->rt) }}" selected disabled>
                                                {{ old('rt', $d->rt) }}</option>
                                            <option value="Tidak diketahui">02</option>
                                        </select>
                                        @error('rt')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-1 form-group">
                                        <label for="rw" class="form-label">RW</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('rw') is-invalid @enderror" id="rw"
                                            name="rw">
                                            <option value="{{ old('rw', $d->rw) }}" selected disabled>
                                                {{ old('rw', $d->rw) }}</option>
                                            <option value="Tidak diketahui">03</option>
                                        </select>
                                        @error('rw')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 form-group">
                                        <label for="add" class="form-label">Alamat tambahan</label><span
                                            class="text-danger">*</span>
                                        <textarea type="textarea" class="form-control @error('add') is-invalid @enderror" name="add" id="alamat"
                                            placeholder="Alamat tambahan" required value="{{ old('add', $d->add) }}">{{ old('add', $d->add) }}</textarea>
                                        @error('add')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                            <button type="submit" class="bi bi-plus-square btn btn-primary" id="btn_tambah">
                                Update</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- modal untuk hapus data -->
    @foreach ($data as $d)
        <div class="modal fade" id="hapus<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/PendudukController/{{ $d->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('delete')
                            @csrf
                            <div class="modal-body modal-lg">
                                <h6 class="text-uppercase fs-5">nik : {{ $d->NIK }}</h6>
                                <h6 class="text-uppercase fs-6">Nama : {{ $d->nama }}</h6>
                                <h6 class="text-uppercase fs-6">tempat/tgl lahir : {{ $d->tm_lahir }},
                                    {{ $d->tgl_lahir }}</h6>
                                <h6 class="text-uppercase fs-6">kewarganegaraan : {{ $d->wn }}</h6>
                                <h6 class="text-uppercase fs-6">berlaku hingga : seumur hidup</h6>
                                <hr>
                                <div id="emailHelp" class="form-text">Apakah anda yakin akan menghapus data KTP atas nama
                                    {{ $d->nama }}?</div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="bi bi-close btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                                <button name="delete" class="bi bi-trash btn btn-danger"> Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- modal untuk detail data --}}
    @foreach ($data as $d)
        <div class="modal fade" id="detail<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail data KTP bernama <span
                                class="text-uppercase">{{ $d->nama }}</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div align="center" class="mb-2">
                                <h5 class="text-uppercase">Provinsi {{ $d->provinsi }}</h5>
                                <h5 class="text-uppercase">Kabupaten {{ $d->kab }}</h5>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase fs-5">nik : {{ $d->NIK }}</h6>
                                <h6 class="text-uppercase fs-6">Nama : {{ $d->nama }}</h6>
                                <h6 class="text-uppercase fs-6">tempat/tgl lahir : {{ $d->tm_lahir }},
                                    {{ $d->tgl_lahir }}</h6>
                                <h6 class="text-uppercase fs-6">alamat : {{ $d->add }}</h6>
                                <h6 class="text-uppercase fs-6"> rt/rw : {{ $d->rt }}/{{ $d->rw }}</h6>
                                <h6 class="text-uppercase fs-6"> kecamatan : {{ $d->kec }}</h6>
                                <h6 class="text-uppercase fs-6"> kelurahan : {{ $d->kel }}</h6>
                                <h6 class="text-uppercase fs-6">agama : {{ $d->agama }}</h6>
                                <h6 class="text-uppercase fs-6">status perkawinan : {{ $d->status }}</h6>
                                <h6 class="text-uppercase fs-6">pekerjaan : {{ $d->pekerjaan }}</h6>
                                <h6 class="text-uppercase fs-6">kewarganegaraan : {{ $d->wn }}</h6>
                                <h6 class="text-uppercase fs-6">berlaku hingga : seumur hidup</h6>
                            </div>
                            <div class="col-md-4">
                                {{-- <img src="https://source.unsplash.com/200x240/?man" alt=""><br> --}}
                                <img src="img/SD-default-image.png" width="90" height="100" alt=""><br>
                                <div align="center">
                                    <small class="text-uppercase">{{ $d->kab }}</small><br>
                                    <small class="text-uppercase">{{ $d->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- modal untuk menampilkan data yang ditentukan (with export to pdf/csv) -->
    <div class="modal fade" id="export_d" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="print-area" id="laporan_cetak_i">
                    <div class="modal-body">
                        <div class="row table-responsive">
                            <div class="col">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tempat/Tgl Lahir</th>
                                            <th scope="col">Jenis kelamin</th>
                                            <th scope="col">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <?php $i = 1; ?>
                                    <?php foreach ($aset as $a_bem) : ?>
                                        <tr>
                                            <td scope="row"><?= $i++ ?></td>
                                            <td><?= $a_bem['id_inventaris'] ?></td>
                                            <td><?= $a_bem['nama_aset'] ?></td>
                                            <td><?= $a_bem['jumlah_kapasitas'] ?></td>
                                            <td><?= $a_bem['status'] ?></td>
                                            <td><?= $a_bem['kondisi'] ?></td>
                                        </tr>
                                    <?php endforeach; ?> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="bi bi-printer btn btn-danger no-print" href="javascript:printDiv('laporan_cetak_i');">
                        Export to pdf</a>
                    <a class="bi bi-printer btn btn-success no-print" href="javascript:printDiv('laporan_cetak_i');">
                        Export to csv</a>
                    <!-- <button class="bi bi-arrow-left-square btn btn-primary" data-bs-target="#rentang" data-bs-toggle="modal"> Kembali</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- modal untuk menampilkan data yang ditentukan (with import from csv) -->
    <div class="modal fade" id="import_d" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="print-area" id="laporan_cetak_i">
                    <div class="modal-body">
                        <div class="row table-responsive">
                            <div class="col">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tempat/Tgl Lahir</th>
                                            <th scope="col">Jenis kelamin</th>
                                            <th scope="col">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <?php $i = 1; ?>
                                    <?php foreach ($aset as $a_bem) : ?>
                                        <tr>
                                            <td scope="row"><?= $i++ ?></td>
                                            <td><?= $a_bem['id_inventaris'] ?></td>
                                            <td><?= $a_bem['nama_aset'] ?></td>
                                            <td><?= $a_bem['jumlah_kapasitas'] ?></td>
                                            <td><?= $a_bem['status'] ?></td>
                                            <td><?= $a_bem['kondisi'] ?></td>
                                        </tr>
                                    <?php endforeach; ?> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="bi bi-printer btn btn-danger no-print" href="javascript:printDiv('laporan_cetak_i');">
                        Import now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- script buat print halaman ajuan tertentu -->
    <textarea id="printing-css" style="display:none;">.no-print{display: none}</textarea>
    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
    <script type="text/javascript">
        function printDiv(elementId) {
            var a = document.getElementById('printing-css').value;
            var b = document.getElementById(elementId).innerHTML;
            window.frames["print_frame"].document.title = document.title;
            window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
@endsection
