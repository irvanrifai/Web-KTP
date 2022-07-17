@extends('layouts.main')

@section('container')
<h1>Hello, world!</h1>
<h3>Ini adalah halaman home website Export-Import Data KTP</h3>
<hr>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda blanditiis recusandae atque fuga sit rerum laudantium obcaecati magni nemo iure optio autem, in eligendi error est ratione corrupti temporibus tenetur.
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis error magnam repellat nisi reprehenderit odit ad perspiciatis deserunt molestiae maxime unde esse tempora aperiam fugiat, laudantium cupiditate ipsum non! Odit?</p>    

    <div class="row mt-2">
        <div class="col">
            <a type="button" class="btn btn-outline-primary my-3" href="/login"><b style="color:blueviolet"><i class="fa fa-user"></i> Login</b></a>
            <h3 class="mb-4">Data KTP</h3>
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
                            <th scope="col">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $datas => $d)
                            <tr>
                                <td scope="row">{{ $datas + $data->firstItem() }}</td>
                                <td><img src="https://source.unsplash.com/100x120/?man" alt=""></td>
                                <td>{{ $d->NIK }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->tm_lahir }}, {{ $d->tgl_lahir }}</td>
                                <td>{{ $d->jk }}</td>
                                <td>{{ $d->add }}, RT {{ $d->rt }}/ RW {{ $d->rw }}, {{ $d->kel }}, {{ $d->kec }}, {{ $d->kab }}</td>
                                <td><a type="button" data-bs-toggle="modal" data-bs-target="#detail<?= $d['id'];?>" class="btn btn-outline-primary"><i class="fa-solid fa-info"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
{{ $data->links() }}

    {{-- <script>
        $(document).ready(function () {
            $('#tb_ktp').DataTable();
        });
    </script> --}}

    {{-- modal untuk detail data --}}
@foreach ($data as $d)
<div class="modal fade" id="detail<?= $d['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail data KTP bernama <span class="text-uppercase">{{ $d->nama }}</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div align="center" class="mb-2">
                    <h5 class="text-uppercase">Provinsi {{ $d->provinsi }}</h5>
                    <h5 class="text-uppercase">Kabupaten {{ $d->kab }}</h5>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-uppercase fs-5">nik  :  {{ $d->NIK }}</h6>
                        <h6 class="text-uppercase fs-6">Nama       :  {{ $d->nama }}</h6>
                        <h6 class="text-uppercase fs-6">tempat/tgl lahir  :  {{ $d->tm_lahir }}, {{ $d->tgl_lahir }}</h6>
                        <h6 class="text-uppercase fs-6">alamat    :  {{ $d->add }}</h6>
                        <h6 class="text-uppercase fs-6"> rt/rw    :  {{ $d->rt }}/{{ $d->rw }}</h6>
                        <h6 class="text-uppercase fs-6"> kecamatan  : {{ $d->kec }}</h6>
                        <h6 class="text-uppercase fs-6"> kelurahan  : {{ $d->kel }}</h6>
                        <h6 class="text-uppercase fs-6">agama      : {{ $d->agama }}</h6>
                        <h6 class="text-uppercase fs-6">status perkawinan  : {{ $d->status }}</h6>
                        <h6 class="text-uppercase fs-6">pekerjaan   : {{ $d->pekerjaan }}</h6>
                        <h6 class="text-uppercase fs-6">kewarganegaraan : {{ $d->wn }}</h6>
                        <h6 class="text-uppercase fs-6">berlaku hingga  : seumur hidup</h6>
                    </div>
                    <div class="col-md-4">
                        <img src="https://source.unsplash.com/200x240/?man" alt=""><br>
                        <div align="center">
                        <small class="text-uppercase">{{ $d->kab }}</small><br>
                        <small class="text-uppercase">{{ $d->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection