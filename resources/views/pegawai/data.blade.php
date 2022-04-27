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

  @if(in_array(Auth::user()->id, [1, 7, 16, 17]))
  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-pegawai"><i class="glyphicon glyphicon-plus"></i> Tambah Pegawai</a>

      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_pdf" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i> Eksport PDF</a>
      </div>
      <div class="col-md-1">
        <a href="/eksport_pegawai" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-import-pegawai">
        <i class="glyphicon glyphicon-open"></i>
          Import Data
        </button>

      </div>
    </div>
  </section>
  @endif

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        @if(in_array(Auth::user()->id, [1, 7, 16, 17]))
          <h3 class="box-title">Daftar Pegawai Wakaf Salman ITB</h3>
        @else
          <h3 class="box-title">Data Resmi {{ Auth::user()->pegawais->nama }}</h3>
        @endif
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
              <td>{{ $row->tempat_lahir }}, {{ $row->tgl_lahir }}</td>
            @else
              <td></td>
            @endif
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->jabatans->nama }}</td>
            <td>{{ $row->divisis->nama }}</td>
            <td>
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-pegawai-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                @if(in_array(Auth::user()->id, [1, 7, 16, 17]))
                  <a href="#" class="btn btn-danger hapus" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                @endif
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

@include('pegawai.modal')

@endsection