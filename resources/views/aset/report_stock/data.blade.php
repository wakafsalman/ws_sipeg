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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-report-stock"><i class="glyphicon glyphicon-plus"></i> Tambah Data Stock Aset</a>

      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_report_stock_pdf" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i> Eksport PDF</a>
      </div>
      <div class="col-md-1">
        <a href="/eksport_report_stock" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Laporan Stok Aset Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th rowspan="2" style="text-align: center;">Nama Aset (Merk)</th>
              <th rowspan="2" style="text-align: center;">Stock Awal</th>
              <th rowspan="2" style="text-align: center;">Satuan</th>
              <th colspan="2" style="text-align: center;">Mutasi</th>
              <th rowspan="2" style="text-align: center;">Stock Akhir</th>
            </tr>
            <tr>
              <th style="text-align: center;">In</th>
              <th style="text-align: center;">Out</th>  
            </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
          <tr>
            <td>{{ $row->assets->nama }} ({{ $row->assets->merk }})</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->satuan }}</td>
            <td>{{ $row->jumlah_in }}</td>
            <td>{{ $row->jumlah_out }}</td>
            <td>{{ ($row->jumlah+$row->jumlah_in)-$row->jumlah_out }}</td>
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

@include('aset.report_stock.modal')

@endsection