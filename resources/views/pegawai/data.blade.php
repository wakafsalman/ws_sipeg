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

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/tambah_pegawai" class="btn btn-success mb-4">+ Tambah Pegawai</a>
      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_pdf" class="btn btn-info">Eksport PDF</a>
      </div>
      <div class="col-md-1">
        <a href="/eksport_excel" class="btn btn-success">Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
          Import Data
        </button>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Import Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </div>
              <form action="/import_excel" method="POST" enctype="multipart/form-data">
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
        <h3 class="box-title">Daftar Pegawai Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Jenis Kelamin</th>
            <th>No. Telepon</th>
            <th>Tempat dan Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Divisi</th>
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
            <td>
                <img src="{{ asset('img/pegawai/'.$row->foto)  }}" style="width: 180px; height: 200px;">
            </td>
            <td>{{ $row->jenis_kelamin }}</td>
            @if($row->no_telepon != NULL)
            <td>0{{ $row->no_telepon }}</td>
            @else
              <td></td>
            @endif
            @if($row->tempat_lahir != NULL && $row->tgl_lahir != NULL)
              <td>{{ $row->tempat_lahir }}, {{ date('j F Y', strtotime($row->tgl_lahir))}}</td>
            @else
              <td></td>
            @endif
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->jabatan }}</td>
            <td>{{ $row->divisi }}</td>
            <td>
                <a href="/rubah_pegawai/{{ $row->id }}" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger hapus" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
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