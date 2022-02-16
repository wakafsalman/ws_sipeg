@extends('layout.master')

@section('title', 'Sistem Employee Wakaf Salman ITB')

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
            <form role="form" action="/proses_rubah_pegawai/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $data->nama }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputGender" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                        <option selected>{{ $data->jenis_kelamin }}</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone" class="form-label">Nomor Telepon</label>
                    <input type="number" name="no_telepon" class="form-control" id="exampleInputPhone" value="{{ $data->no_telepon }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputBirthdate" class="form-label">Tempat / Tanggal Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputBirthdate" class="col-4" value="{{ $data->tempat_lahir }}"> /
                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputBirthdate" value="{{ $data->tgl_lahir }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress" class="form-label">Alamat</label>
                    <input type="textarea" name="alamat" class="form-control" id="exampleInputAddress" value="{{ $data->alamat }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputTitle" class="form-label">Jabatan</label>
                    <select name="id_jabatans" class="form-control" aria-label="Default select example">
                    <option selected value="{{ $data->id_jabatans }}">{{ $data->jabatans->nama }}</option>
                        @foreach($jabatan as $row)
                          <option value="{{ $row->id }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputDivision" class="form-label">Divisi</label>
                    <select name="id_divisis" class="form-control" aria-label="Default select example">
                        <option selected value="{{ $data->id_divisis }}">{{ $data->divisis->nama }}</option>
                        @foreach($divisi as $row)
                          <option value="{{ $row->id }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPhoto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="exampleInputPhoto">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/pegawai" class="btn btn-default">Kembali</a>
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