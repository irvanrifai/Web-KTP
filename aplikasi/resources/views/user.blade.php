@extends('layouts.main')

@section('container')

<div class="row mt-4">
    @if(session()->has('success_login_u'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
        {{ session('success_login_u') }}
        </div>
    </div>
    @endif
    <div class="col">
        <h3>Data Penduduk</h3>
            <button type="button" class="bi bi-filter btn btn-outline-success my-3" data-bs-toggle="modal" data-bs-target="#export_d">
                Export data
            </button>
        <div class="table-responsive">
            <table id="tb_ktp" class="table">
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
                    @foreach ($data as $d)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $d->NIK }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->tm_lahir }}, {{ $d->tgl_lahir }}</td>
                            <td>{{ $d->jk }}</td>
                            <td>{{ $d->add }}, {{ $d->rt }}/{{ $d->rw }}, {{ $d->kel }}, {{ $d->kec }}, {{ $d->kab }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#tb_ktp').DataTable();
    });
</script>

<!-- modal untuk menampilkan data yang ditentukan (with export to pdf/csv) -->
<div class="modal fade" id="export_d" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
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
                                            <td scope="row"><?= $i++; ?></td>
                                            <td><?= $a_bem['id_inventaris']; ?></td>
                                            <td><?= $a_bem['nama_aset']; ?></td>
                                            <td><?= $a_bem['jumlah_kapasitas']; ?></td>
                                            <td><?= $a_bem['status']; ?></td>
                                            <td><?= $a_bem['kondisi']; ?></td>
                                        </tr>
                                    <?php endforeach; ?> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="bi bi-printer btn btn-danger no-print" href="javascript:printDiv('laporan_cetak_i');"> Export to pdf</a>
                <a class="bi bi-printer btn btn-success no-print" href="javascript:printDiv('laporan_cetak_i');"> Export to csv</a>
                <!-- <button class="bi bi-arrow-left-square btn btn-primary" data-bs-target="#rentang" data-bs-toggle="modal"> Kembali</button> -->
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