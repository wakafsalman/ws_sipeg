@extends('layout.master')

@section('title', 'WAKAF SALMAN SIPEG')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{$judul}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$judul}}</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" action="/proses_tambah_pegawai" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputName">
                </div>
                <div class="form-group">
                    <label for="exampleInputGender" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone" class="form-label">Nomor Telepon</label>
                    <input type="number" name="no_telepon" class="form-control" id="exampleInputPhone">
                </div>
                <div class="form-group">
                    <label for="exampleInputBirthdate" class="form-label">Tempat / Tanggal Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputBirthdate" class="col-4"> /
                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputBirthdate">
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress" class="form-label">Alamat</label>
                    <input type="textarea" name="alamat" class="form-control" id="exampleInputAddress">
                </div>
                <div class="form-group">
                    <label for="exampleInputTitle" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="exampleInputTitle">
                </div>
                <div class="form-group">
                    <label for="exampleInputDivision" class="form-label">Divisi</label>
                    <input type="text" name="divisi" class="form-control" id="exampleInputDivision">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhoto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="exampleInputPhoto">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/pegawai" class="btn btn-primary">Kembali</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection