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
            <form role="form" action="/proses_rubah_user/{{ $data->id }}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $data->nama }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail" value="{{ $data->email }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputRoles" class="form-label">Roles</label>
                    <input type="text" name="roles" class="form-control" id="exampleInputRoles" value="{{ $data->roles }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/user" class="btn btn-primary">Kembali</a>
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