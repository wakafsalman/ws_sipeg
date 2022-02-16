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
            <form role="form" action="/proses_tambah_jabatan" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName" class="form-label">Nama Jabatan</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputName">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/jabatan" class="btn btn-default">Kembali</a>
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