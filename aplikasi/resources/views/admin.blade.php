@extends('layouts.main')

@section('container')

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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahData }}</div>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userLoggedIn }}</div>
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
            <button type="button" class="bi bi-filter btn btn-outline-success my-3" data-bs-toggle="modal" data-bs-target="#import_d">
                Import
            </button>
            <a align="right" class="bi bi-printer btn btn-outline-primary no-print" data-bs-toggle="modal" data-bs-target="#export_d"> Export</a>
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
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($data as $d)
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><img src="https://source.unsplash.com/100x120/?man" alt=""></td>
                            <td>{{ $d->NIK }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->tm_lahir }}, {{ $d->tgl_lahir }}</td>
                            <td>{{ $d->jk }}</td>
                            <td>{{ $d->add }}, RT {{ $d->rt }}/ RW {{ $d->rw }}, {{ $d->kel }}, {{ $d->kec }}, {{ $d->kab }}</td>
                            <td><a type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $d['id'];?>"><i class="fa fa-pencil me-2"></i></a>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#hapus<?= $d['id'];?>"><i class="fa fa-trash"></i></a></td>
                            <td><a type="button" data-bs-toggle="modal" data-bs-target="#detail<?= $d['id'];?>" class="btn btn-outline-primary"><i class="fa-solid fa-info"></i></a></td>
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

<!-- modal untuk tambah data -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form novalidate action="/admin/adm_bem/save" role="form" method="POST" enctype="multipart/form-data" id="form_tambah" class="needs-validation">
                {{-- <?= csrf_field(); ?> --}}
                <input type="hidden" name="berlaku" id="berlaku" value="Seumur Hidup">
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <div class="mb-3">
                            <label class="mb-2"><b>Pilih Foto</b></label>
                            <div class="col-sm-3">
                                <img src="img/SD-default-image.png" class="img-thumbnail img-preview">
                            </div>
                            <div class="mt-2 col-md-4">
                                <input class="form-control" type="file" id="gambar" name="gambar" value="<?= old('gambar'); ?>" onchange="preview_img()">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form>
                            <div class="row mb-2 g-3">
                                <div class="mb-3 col-md-3 form-group">
                                  <label for="nik" class="form-label">NIK</label>
                                  <input type="number" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan">
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                  <label for="nama" class="form-label">Nama</label>
                                  <input type="text" class="form-control" id="nama" placeholder="Nama lengkap">
                                </div>  
                                <div class="mb-3 col-md-3 form-group">
                                  <label for="tm_lahir" class="form-label">Tempat lahir</label>
                                  <input type="text" class="form-control" id="tm_lahir" placeholder="Jakarta">
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                  <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
                                  <input type="date" class="form-control" id="tgl_lahir">
                                </div>
                                
                                <div class="mb-3 col-md-2 form-group">
                                  <label for="jk" class="form-label">Jenis Kelamin</label>
                                  <select class="form-select" id="jk" name="jk">
                                  <option value="" selected disabled>Pilih</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                  <option value="Tidak diketahui">Tidak diketahui</option>
                                  </select>
                                </div>
                          
                                <div class="mb-3 col-md-2 form-group">
                                  <label for="agama" class="form-label">Agama</label>
                                  <select class="form-select" id="agama" name="agama">
                                    <option value="" selected disabled>Pilih</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghu chu">Konghu chu</option>
                                    <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                
                                
                                <div class="mb-3 col-md-2 form-group">
                                  <label for="status" class="form-label">Status</label>
                                  <select class="form-select" id="status" name="status">
                                    <option value="" selected disabled>Pilih</option>
                                    <option value="Belum kawin">Belum kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai">Cerai</option>
                                    </select>
                                </div>
                          
                                <div class="mb-3 col-md-2 form-group">
                                  <label for="goldar" class="form-label">Gol. Darah</label>
                                  <select class="form-select" id="goldar" name="goldar">
                                    <option value="" selected disabled>Pilih</option>
                                    <option value="A">A</option>
                                    <option value="O">O</option>
                                    <option value="AB">AB</option>
                                    <option value="B">B</option>
                                    <option value="-">-</option>
                                    </select>
                                </div>
                          
                                  <div class="mb-3 col-md-3 form-group">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" placeholder="Pengusaha">
                                  </div>
                                  
                                
                                <label for="alamat" class="form-label">Alamat</label>
                          
                                <div class="mb-3 col-md-2 form-group">
                                  <select class="form-select" id="jk" name="jk">
                                    <option value="" selected disabled>Warga Negara</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                    </select>
                                </div>
                          
                                <div class="mb-3 col-md-2 form-group">
                                  <select class="form-select" id="jk" name="jk">
                                    <option value="" selected disabled>Provinsi</option>
                                    {{-- <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2 form-group">
                                  <select class="form-select" id="jk" name="jk">
                                    <option value="" selected disabled>Kabupaten/Kota</option>
                                    {{-- <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2 form-group">
                                  <select class="form-select" id="jk" name="jk">
                                    <option value="" selected disabled>Kecamatan</option>
                                    {{-- <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2 form-group">
                                  <select class="form-select" id="jk" name="jk">
                                    <option value="" selected disabled>Kel/Desa</option>
                                    {{-- <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-md-1 form-group">
                                  <select class="form-select" id="jk" name="jk">
                                    <option value="" selected disabled>RT</option>
                                    {{-- <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-md-1 form-group">
                                  <select class="form-select" id="jk" name="jk">
                                    <option value="" selected disabled>RW</option>
                                    {{-- <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4 form-group">
                                  <textarea type="textarea" class="form-control" id="alamat" placeholder="Alamat tambahan"></textarea>
                                </div>
                                
                                  
                            </div>
                          </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                    <button type="submit" class="bi bi-plus-square btn btn-primary" id="btn_tambah"> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal untuk edit data -->
@foreach ($data as $d)
<div class="modal fade" id="edit<?= $d['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/update/<?= $d['id'];?>" method="POST" role="form" enctype="multipart/form-data" class="needs-validation">
                <?= csrf_field(); ?>
                <input type="hidden" name="kepemilikan" id="kepemilikan" value="BEM FKI UMS">
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <div class="mb-3">
                            <label class="mb-2"><b>Pilih Foto</b></label>
                            <div class="col-sm-3">
                                <img src="img/SD-default-image.png" class="img-thumbnail img-preview">
                            </div>
                            <div class="mt-2 col-md-4">
                                <input class="form-control" type="file" id="gambar" name="gambar" value="<?= old('gambar'); ?>" onchange="preview_img()">
                                <div class="invalid-feedback">
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <form>
                                <div class="row mb-2 g-3">
                                    <div class="mb-3 col-md-3 form-group">
                                      <label for="nik" class="form-label">NIK</label>
                                      <input type="number" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan">
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                      <label for="nama" class="form-label">Nama</label>
                                      <input type="text" class="form-control" id="nama" placeholder="Nama lengkap">
                                    </div>  
                                    <div class="mb-3 col-md-3 form-group">
                                      <label for="tm_lahir" class="form-label">Tempat lahir</label>
                                      <input type="text" class="form-control" id="tm_lahir" placeholder="Jakarta">
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                      <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
                                      <input type="date" class="form-control" id="tgl_lahir">
                                    </div>
                                    
                                    <div class="mb-3 col-md-2 form-group">
                                      <label for="jk" class="form-label">Jenis Kelamin</label>
                                      <select class="form-select" id="jk" name="jk">
                                      <option value="" selected disabled>Pilih</option>
                                      <option value="Laki-laki">Laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                      <option value="Tidak diketahui">Tidak diketahui</option>
                                      </select>
                                    </div>
                              
                                    <div class="mb-3 col-md-2 form-group">
                                      <label for="agama" class="form-label">Agama</label>
                                      <select class="form-select" id="agama" name="agama">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghu chu">Konghu chu</option>
                                        <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="mb-3 col-md-2 form-group">
                                      <label for="status" class="form-label">Status</label>
                                      <select class="form-select" id="status" name="status">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Belum kawin">Belum kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai">Cerai</option>
                                        </select>
                                    </div>
                              
                                    <div class="mb-3 col-md-2 form-group">
                                      <label for="goldar" class="form-label">Gol. Darah</label>
                                      <select class="form-select" id="goldar" name="goldar">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="A">A</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="-">-</option>
                                        </select>
                                    </div>
                              
                                      <div class="mb-3 col-md-3 form-group">
                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" placeholder="Pengusaha">
                                      </div>
                                      
                                    
                                    <label for="alamat" class="form-label">Alamat</label>
                              
                                    <div class="mb-3 col-md-2 form-group">
                                      <select class="form-select" id="jk" name="jk">
                                        <option value="" selected disabled>Warga Negara</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                        </select>
                                    </div>
                              
                                    <div class="mb-3 col-md-2 form-group">
                                      <select class="form-select" id="jk" name="jk">
                                        <option value="" selected disabled>Provinsi</option>
                                        {{-- <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                      <select class="form-select" id="jk" name="jk">
                                        <option value="" selected disabled>Kabupaten/Kota</option>
                                        {{-- <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                      <select class="form-select" id="jk" name="jk">
                                        <option value="" selected disabled>Kecamatan</option>
                                        {{-- <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                      <select class="form-select" id="jk" name="jk">
                                        <option value="" selected disabled>Kel/Desa</option>
                                        {{-- <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-2 form-group">
                                      <select class="form-select" id="jk" name="jk">
                                        <option value="" selected disabled>RT/RW</option>
                                        {{-- <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option> --}}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4 form-group">
                                      <textarea type="textarea" class="form-control" id="alamat" placeholder="Alamat tambahan"></textarea>
                                    </div>
                                    
                                      
                                </div>
                              </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                        <button type="submit" name="update" class="bi bi-pencil-square btn btn-warning"> Simpan</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
@endforeach

<!-- modal untuk hapus data -->
@foreach ($data as $d)
    <div class="modal fade" id="hapus<?= $d['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/delete" method="post" role="form" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-body modal-lg">
                                            <h6 class="text-uppercase fs-5">nik  :  {{ $d->NIK }}</h6>
                                            <h6 class="text-uppercase fs-6">Nama       :  {{ $d->nama }}</h6>
                                            <h6 class="text-uppercase fs-6">tempat/tgl lahir  :  {{ $d->tm_lahir }}, {{ $d->tgl_lahir }}</h6>
                                            <h6 class="text-uppercase fs-6">kewarganegaraan : {{ $d->wn }}</h6>
                                            <h6 class="text-uppercase fs-6">berlaku hingga  : seumur hidup</h6>
                                            <hr>
                            <div id="emailHelp" class="form-text">Apakah anda yakin akan menghapus data KTP atas nama {{ $d->nama }}?</div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="bi bi-close btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                            <button type="submit" name="update" class="bi bi-trash btn btn-danger"> Hapus</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
@endforeach

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

<!-- modal untuk menampilkan data yang ditentukan (with import from csv) -->
<div class="modal fade" id="import_d" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
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
                <a class="bi bi-printer btn btn-danger no-print" href="javascript:printDiv('laporan_cetak_i');"> Import now</a>
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