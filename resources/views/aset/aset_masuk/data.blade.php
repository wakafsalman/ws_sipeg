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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-aset-masuk"><i class="glyphicon glyphicon-plus"></i> Tambah Aset Masuk</a>

      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_aset_masuk_pdf" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i> Eksport PDF</a>
      </div>
      <div class="col-md-1">
        <a href="/eksport_aset_masuk" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Laporan Aset Masuk Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Aset Masuk</th>
            <th>Nama Aset</th>
            <th>Satuan</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->assets->nama }}</td>
            <td>{{ $row->satuan }}</td>
            <td>{{ $row->merk }}</td>
            <td>{{ $row->harga }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->harga*$row->jumlah }}</td>
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

@include('aset.aset_masuk.modal')

@endsection