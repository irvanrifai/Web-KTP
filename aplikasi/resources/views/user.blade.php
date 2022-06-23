@extends('layouts.main')

@section('container')

<div class="row mt-4">
    <div class="col">
        <h3>Data Penduduk</h3>
            <button type="button" class="bi bi-filter btn btn-outline-success my-3" data-bs-toggle="modal" data-bs-target="#rentang_i">
                Export data
            </button>
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