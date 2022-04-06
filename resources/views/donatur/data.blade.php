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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-donatur"><i class="glyphicon glyphicon-plus"></i> Tambah Donatur</a>

      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_donatur" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-import-donatur">
        <i class="glyphicon glyphicon-open"></i>
          Import Data
        </button>

      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Donatur Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Tempat dan Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>No. HP</th>
            <th>Asal Data</th>
            <th>Event</th>
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
            <td>{{ $row->nama_lengkap }}</td>
            <td>{{ $row->nama_panggilan }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->jenis_kelamin }}</td>
            <td>{{ $row->tempat_lahir }}, {{ date('j F Y', strtotime($row->tgl_lahir))}}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->no_telepon }}</td>
            <td>{{ $row->no_hp }}</td>
            <td>{{ $row->asal_data }}</td>
            <td>{{ $row->event }}</td>
            <td>
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-donatur-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                <a href="#" class="btn btn-danger hapus-donatur" data-id="{{ $row->id }}" data-nama="{{ $row->nama_lengkap }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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

@include('donatur.modal')

@endsection