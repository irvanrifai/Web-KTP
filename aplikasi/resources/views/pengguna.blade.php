@extends('layouts.maintt')

@section('containers')
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
                    <h3>Dashboard</h3>

                    <!-- total data ktp -->
                    {{-- <div class="col-xl-4 col-md-6 mb-4 mt-3">
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
                    </div> --}}

                    <!-- total user -->
                    <div class="col-xl-4 col-md-6 mb-4 mt-3">
                        <div class="card border-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data
                                            Pengguna
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahData }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300" style="color:blue; opacity:60%;"></i>
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
            <h3>Data Pengguna</h3>
            <button type="button" class="btn btn-primary my-3 btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i
                    class="fa fa-plus"></i>
                Tambah data
            </button>
            {{-- <div style="float: right;">
                <button type="button" class="btn btn-outline-success my-3" data-bs-toggle="modal"
                    data-bs-target="#import_d"><i class="fa fa-file-arrow-down"></i>
                    Import
                </button>
                <a align="right" class="btn btn-outline-primary no-print" data-bs-toggle="modal"
                    data-bs-target="#export_d"><i class="fa fa-file-export"></i> Export</a>
            </div> --}}
            <div class="table-responsive">
                <table id="tb_ktp" class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->tgl_lahir }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a data-bs-toggle="modal" data-bs-target="#edit<?= $d['id'] ?>"><span
                                                class="badge bg-warning text-dark"><i class="fa fa-pencil"></i></span></a>
                                        <a data-bs-toggle="modal" class="mx-1"
                                            data-bs-target="#hapus<?= $d['id'] ?>"><span class="badge bg-danger"><i
                                                    class="fa fa-trash"></i></span></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <h4 class="mt-2">Using Datatable Laravel</h4>
            <a type="button" href="javascript:void(0)" class="btn btn-primary my-3 btn-sm" id="createNewData"><i
                    class="fa fa-plus"></i>
                Tambah data
            </a>
            <div class="table-responsive">
                <table id="tb_pengguna" class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    {{-- modal untuk datatable --}}
    <div class="modal fade" id="ajaxModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form novalidate action="/PenggunaController" role="form" method="POST"
                    enctype="multipart/form-data" id="form_data" class="needs-validation">
                    @csrf
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="row mb-2 g-3">
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
                                <div class="mb-3 col-md-4 form-group">
                                    <label for="alamat" class="form-label">Alamat</label><span
                                        class="text-danger">*</span>
                                    <textarea type="textarea" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                        placeholder="Alamat tambahan" required value="{{ old('alamat') }}"></textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="bi bi-plus-square btn btn-primary" id="saveBtn"
                            value="create"><i class="fa fa-plus"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- script datatables CRUD --}}
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#tb_pengguna').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{{ url('/PenggunaController') }}',
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        title: 'Nama',
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        title: 'Alamat',
                    },
                    {
                        data: 'tgl_lahir',
                        name: 'tgl_lahir',
                        title: 'Tanggal Lahir',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Aksi',
                        searchable: false,
                        orderable: false
                    },
                ],
            });
            $('#createNewData').click(function() {
                $('#saveBtn').html("Tambah");
                $('#data_id').val('');
                $('#form_data').trigger("reset");
                $('#modelHeading').html("Create New Data");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '#editItem', function() {
                var data_id = $(this).data('id');
                $.get("{{ url('PenggunaController') }}" + '/' + data_id + '/edit', function(data) {
                    $('#modelHeading').html("Edit Item");
                    $('#saveBtn').html("Update");
                    $('#ajaxModel').modal('show');
                    $('#data_id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#tgl_lahir').val(data.tgl_lahir);
                    $('#alamat').val(data.alamat);
                })
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#form_data').serialize(),
                    url: "{{ url('PenggunaController') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {

                        $('#form_data').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '#deleteItem', function() {

                var data_id = $(this).data("id");
                confirm("Are You sure want to delete?");

                $.ajax({
                    url: "{{ url('PenggunaController') }}" + '/' + data_id,
                    type: "DELETE",
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            var table = $('#tb_pengguna').DataTable();

            $('#tb_pengguna tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });

            $('#button').click(function() {
                alert(table.rows('.selected').data().length + ' row(s) selected');
            });
        });
    </script>
    <!-- modal untuk tambah data -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form novalidate action="/PenggunaController" role="form" method="POST"
                    enctype="multipart/form-data" id="form_tambah" class="needs-validation">
                    @csrf
                    {{-- <input type="hidden" name="berlaku" id="berlaku" value="Seumur Hidup"> --}}
                    <div class="modal-body">
                        {{-- <div class="mb-3 form-group">
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
                        </div> --}}
                        <div class="row">
                            <div class="row mb-2 g-3">
                                {{-- <div class="mb-3 col-md-3 form-group">
                                    <label for="NIK" class="form-label">NIK</label><span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control @error('NIK') is-invalid @enderror"
                                        name="NIK" id="NIK" placeholder="Nomor Induk Kependudukan" required
                                        pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;"
                                        value="{{ old('NIK') }}">
                                    @error('NIK')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
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
                                {{-- <div class="mb-3 col-md-3 form-group">
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
                                </div> --}}
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

                                {{-- <div class="mb-3 col-md-2 form-group">
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
                                </div> --}}


                                {{-- <label for="alamat" class="form-label">Alamat</label> --}}

                                {{-- <div class="mb-3 col-md-2 form-group">
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
                                        <option value="02">02</option>
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
                                        <option value="03">03</option>
                                    </select>
                                    @error('rw')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="mb-3 col-md-4 form-group">
                                    <label for="alamat" class="form-label">Alamat</label><span
                                        class="text-danger">*</span>
                                    <textarea type="textarea" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                        placeholder="Alamat tambahan" required value="{{ old('alamat') }}"></textarea>
                                    @error('alamat')
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/PenggunaController/{{ $d->id }}" method="POST" role="form"
                        enctype="multipart/form-data" class="needs-validation">
                        @method('PUT')
                        {{-- @method('PATCH') --}}
                        @csrf
                        {{-- <input type="hidden" name="berlaku" id="berlaku" value="Seumur Hidup"> --}}
                        {{-- <input type="hidden" name="NIK" id="NIK" value="{{ $d->NIK }}"> --}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="row mb-2 g-3">
                                    {{-- <div class="mb-3 col-md-3 form-group">
                                        <label for="NIK" class="form-label">NIK</label><span
                                            class="text-danger">*</span>
                                        <input type="number" class="form-control @error('NIK') is-invalid @enderror"
                                            name="NIK" id="NIK" placeholder="Nomor Induk Kependudukan" required
                                            pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;"
                                            value="{{ old('NIK', $d->NIK) }}">
                                        @error('NIK')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
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
                                    {{-- <div class="mb-3 col-md-3 form-group">
                                        <label for="tm_lahir" class="form-label">Tempat lahir</label><span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control @error('tm_lahir') is-invalid @enderror"
                                            name="tm_lahir" id="tm_lahir" placeholder="Jakarta" required
                                            value="{{ old('tm_lahir', $d->tm_lahir) }}">
                                        @error('tm_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="tgl_lahir" class="form-label">Tanggal lahir</label><span
                                            class="text-danger">*</span>
                                        <input type="date"
                                            class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
                                            id="tgl_lahir" value="{{ old('tgl_lahir', $d->tgl_lahir) }}">
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- <div class="mb-3 col-md-2 form-group">
                                        <label for="jk" class="form-label">Jenis Kelamin</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('jk') is-invalid @enderror" id="jk"
                                            name="jk">
                                            <option value="{{ old('jk', $d->jk) }}" selected>
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
                                            <option value="{{ old('agama', $d->agama) }}" selected>
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
                                            <option value="{{ old('status', $d->status) }}" selected>
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
                                            <option value="{{ old('goldar', $d->goldar) }}" selected>
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
                                            <option value="{{ old('wn', $d->wn) }}" selected>
                                                {{ old('wn', $d->wn) }}</option>
                                            <option value="WNI">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                        @error('wn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="mb-3 col-md-2 form-group">
                                        <label for="provinsi" class="form-label">Provinsi</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('provinsi') is-invalid @enderror"
                                            id="provinsi" name="provinsi">
                                            <option value="{{ old('provinsi', $d->provinsi) }}" selected>
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
                                            <option value="{{ old('kab', $d->kab) }}" selected>
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
                                            <option value="{{ old('kec', $d->kec) }}" selected>
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
                                            <option value="{{ old('kel', $d->kel) }}" selected>
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
                                            <option value="{{ old('rt', $d->rt) }}" selected>
                                                {{ old('rt', $d->rt) }}</option>
                                            <option value="02">02</option>
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
                                            <option value="{{ old('rw', $d->rw) }}" selected>
                                                {{ old('rw', $d->rw) }}</option>
                                            <option value="03">03</option>
                                        </select>
                                        @error('rw')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3 col-md-4 form-group">
                                        <label for="alamat" class="form-label">Alamat</label><span
                                            class="text-danger">*</span>
                                        <textarea type="textarea" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                            placeholder="Alamat tambahan" required value="{{ old('alamat', $d->alamat) }}">{{ old('alamat', $d->alamat) }}</textarea>
                                        @error('alamat')
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
                            <button type="submit" class="bi bi-plus-square btn btn-primary" id="btn_edit">
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
                        <form action="/PenggunaController/{{ $d->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('delete')
                            @csrf
                            <div class="modal-body modal-lg">
                                <h6 class="text-uppercase fs-6">Nama : {{ $d->nama }}</h6>
                                <h6 class="text-uppercase fs-6">Tanggal lahir : {{ $d->tgl_lahir }}</h6>
                                <h6 class="text-uppercase fs-6">Alamat : {{ $d->alamat }}</h6>
                                <hr>
                                <div id="emailHelp" class="form-text">Apakah anda yakin akan menghapus data pengguna atas
                                    nama
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
