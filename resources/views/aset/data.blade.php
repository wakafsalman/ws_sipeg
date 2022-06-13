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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-aset"><i class="glyphicon glyphicon-plus"></i> Tambah Aset</a>

      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_aset_pdf" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i> Eksport PDF</a>
      </div>
      <div class="col-md-1">
        <a href="/eksport_aset" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-import-aset">
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
          <h3 class="box-title">Daftar Aset Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kode Aset</th>
            <th>Nama Aset</th>
            <th>Merk</th>
            <th>PIC/Tempat</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Gambar</th>
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
            <td>{{ $row->kode }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->merk }}</td>
            <td>{{ $row->pic }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->satuan }}</td>
            @if($row->gambar != "")
              <td>
                  <img src="{{ asset('img/aset/'.$row->gambar)  }}" style="width: 180px; height: 200px;">
              </td>
            @else
              <td></td>
            @endif
            <td>
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-aset-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                <a href="#" class="btn btn-danger hapus-aset" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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

@include('aset.modal')

@endsection