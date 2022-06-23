@extends('layouts.main')

@section('container')

<h1 class="mb-4">Edit data</h1>

<form>
    <div class="row mb-2 g-3">
        <div class="mb-3 col-md-3 form-group">
          <label for="nik" class="form-label">NIK</label>
          <input type="number" class="form-control" id="nik">
        </div>
        <div class="mb-3 col-md-3 form-group">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama">
        </div>  
        <div class="mb-3 col-md-3 form-group">
          <label for="tm_lahir" class="form-label">Tempat lahir</label>
          <input type="text" class="form-control" id="tm_lahir">
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

          <div class="mb-3 col-md-3 form-group">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan">
          </div>
          
          <div class="mb-3 col-md-2 form-group">
          <label for="wn" class="form-label">Warga negara</label>
          <select class="form-select" id="jk" name="jk">
            <option value="" selected disabled>Pilih</option>
            <option value="WNI">WNI</option>
            <option value="WNA">WNA</option>
            </select>
        </div>
        
        <label for="alamat" class="form-label">Alamat</label>
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
          <textarea type="textarea" class="form-control" id="alamat"></textarea>
        </div>
        
          
    </div>
        
    <button type="submit" class="btn btn-primary">Ubah</button>
      </form>

@endsection