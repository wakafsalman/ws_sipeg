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
        <!--
        <a href="/input_kpi" class="btn btn-success mb-4"><i class="glyphicon glyphicon-plus"></i> Tambah KPI</a>
        -->
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-kpi"><i class="glyphicon glyphicon-plus"></i> Tambah KPI</a>
      </div>
    </div>
  </section>

  <!--
  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_kpi" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-import-kpi">
        <i class="glyphicon glyphicon-open"></i>
          Import Data
        </button>
      </div>
    </div>
  </section>
  -->

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">KPI</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Posisi</th>
            <th>Kode KPI</th>
            <th>KPI</th>
            <th>Target</th>
            <th>Progress</th>
            <th>Kendala</th>
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
            <td>{{ $row->jabatans->nama }}</td>
            <td>{{ $row->kode_kpis->kode }}</td>
            <td>{{ $row->kode_kpis->nama }}</td>
            <td>{{ $row->kode_kpis->target }}</td>
            <td>{{ $row->progress }}</td>
            <td>{{ $row->kendala }}</td>
            <td>
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="#" class="btn btn-danger hapus-kpi" data-id="{{ $row->id }}" data-jabatan="{{ $row->jabatans->nama }}" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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

@include('kpi.modal')

@endsection