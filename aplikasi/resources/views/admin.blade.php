@extends('layouts.main')

@section('container')
<h3 class="mb-4">Hello, admin!</h3>

<div class="row mt-4">
    <div class="col">
        <div class="container-fluid">
            <div class="row">
                <h3>User Activity</h3>

                <!-- ds total ajuan peminjaman aset -->
                <div class="col-xl-4 col-md-6 mb-4 mt-3">
                    <div class="card border-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data KTP</div>
                                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_ajuan; ?></div> --}}
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300" style="color:darkblue; opacity:60%;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- total aset ormawa terkait -->
                <div class="col-xl-4 col-md-6 mb-4 mt-3">
                    <div class="card border-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">User Logged in</div>
                                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_inv; ?></div> --}}
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tools fa-2x text-gray-300" style="color:red; opacity:60%;"></i>
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

<div class="row mt-4">
    <div class="col">
        <h3>Pengelolaan Data KTP</h3>
        <button type="button" class="bi bi-plus-square btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambah">
            Tambah data
        </button>
        <div style="float: right;">
            <button type="button" class="bi bi-filter btn btn-success my-3 me-3" data-bs-toggle="modal" data-bs-target="#rentang_i">
                Import from .csv
            </button>
            <a align="right" class="bi bi-printer btn btn-outline-success no-print" data-bs-toggle="modal" data-bs-target="#laporan_i"> Export to .csv</a>
            <a align="right" class="bi bi-printer btn btn-outline-primary no-print" data-bs-toggle="modal" data-bs-target="#laporan_i"> Export to .pdf</a>
        </div>
        <div class="table-responsive">
            <table id="tb_inv" class="table table-striped">
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
                    {{-- <?php $i = 1; ?>
                    <?php foreach ($aset as $a_bem) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <th><img src="/img/<?= $a_bem['gambar']; ?>" class="gambar"></th>
                            <td><?= $a_bem['id_inventaris']; ?></td>
                            <td><?= $a_bem['nama_aset']; ?></td>
                            <td><?= $a_bem['jumlah_kapasitas']; ?></td>
                            <td><?= $a_bem['status']; ?></td>
                            <td><?= $a_bem['kondisi']; ?></td>
                            <td><?= ($a_bem['cb_nb'] == '1') ? 'Bisa' : 'Tidak'; ?></td>
                            <td class="btn-inline">
                                <button type="button" class="bi bi-pencil-square btn btn-warning inline tooltip-test" title="Edit data" data-bs-toggle="modal" data-bs-target="#edit<?= $a_bem['nomor']; ?>">

                                </button>
                                <button type="button" class="bi bi-trash btn btn-danger inline tooltip-test" title="Hapus data" data-bs-toggle="modal" data-bs-target="#hapus<?= $a_bem['nomor']; ?>">

                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection