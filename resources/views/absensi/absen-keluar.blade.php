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
            <form role="form" action="/proses_absen_keluar" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                    <label>Nama Pegawai : {{ Auth::user()->pegawais->nama }}</label>
                </div>
                <div class="form-group">
                    <label>Tanggal : {{ $tanggal }}</label>
                </div>
                <div class="form-group">
                    <label>Jam Sekarang : </label> <label id="clock"></label>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputResultWork" class="form-label">Hasil Kerja</label>
                    <input type="file" name="hasil_kerja" class="form-control" id="exampleInputResultWork">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/absen" class="btn btn-primary">Kembali</a>
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