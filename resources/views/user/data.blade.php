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

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/tambah_user" class="btn btn-success mb-4"><i class="glyphicon glyphicon-plus"></i> Tambah User</a>
      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_user" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
        <i class="glyphicon glyphicon-open"></i>
          Import Data
        </button>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Import Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </div>
              <form action="/import_user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <input type="file" name="file" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar User</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->roles->nama }}</td>
            <td>
                <a href="/rubah_user/{{ $row->id }}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                <a href="#" class="btn btn-danger hapus-user" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

  </section>
  <!-- /.content -->
</div>
@endsection