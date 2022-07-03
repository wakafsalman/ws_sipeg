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

    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">KOLABORASI</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>KPI</th>
            <th>Target</th>
            <th>Progress</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->id_divisis == 2)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->kode_kpis->kode }} - {{ $row->kode_kpis->nama }}</td>
                <td>{{ $row->kode_kpis->target }}</td>
                <td>On Going</td>
                <td>
                  <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger hapus-kpi" data-id="{{ $row->id }}" data-divisi="Kolaborasi" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                  <a href="/report_kpi/{{ $row->id_divisis }}/{{ $row->id_kode_kpis }}" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Report KPI</a>
                </td>
              </tr>
            @endif
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">MANAJEMEN</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>KPI</th>
            <th>Target</th>
            <th>Progress</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->id_divisis == 5)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->kode_kpis->kode }} - {{ $row->kode_kpis->nama }}</td>
                <td>{{ $row->kode_kpis->target }}</td>
                <td>On Going</td>
                <td>
                  <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger hapus-kpi" data-id="{{ $row->id }}" data-divisi="{{ $row->divisis->nama }}" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                  <a href="/report_kpi/{{ $row->id_divisis }}/{{ $row->id_kode_kpis }}" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Report KPI</a>
                </td>
              </tr>
            @endif
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">MARKETING</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>KPI</th>
            <th>Target</th>
            <th>Progress</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->id_divisis == 3)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->kode_kpis->kode }} - {{ $row->kode_kpis->nama }}</td>
                <td>{{ $row->kode_kpis->target }}</td>
                <td>On Going</td>
                <td>
                  <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger hapus-kpi" data-id="{{ $row->id }}" data-divisi="{{ $row->divisis->nama }}" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                  <a href="/report_kpi/{{ $row->id_divisis }}/{{ $row->id_kode_kpis }}" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Report KPI</a>
                </td>
              </tr>
            @endif
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">OPERASIONAL</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>KPI</th>
            <th>Target</th>
            <th>Progress</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->id_divisis == 1)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->kode_kpis->kode }} - {{ $row->kode_kpis->nama }}</td>
                <td>{{ $row->kode_kpis->target }}</td>
                <td>On Going</td>
                <td>
                  <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger hapus-kpi" data-id="{{ $row->id }}" data-divisi="{{ $row->divisis->nama }}" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                  <a href="/report_kpi/{{ $row->id_divisis }}/{{ $row->id_kode_kpis }}" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Report KPI</a>
                </td>
              </tr>
            @endif
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">PROGRAM</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>KPI</th>
            <th>Target</th>
            <th>Progress</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->id_divisis == 4)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->kode_kpis->kode }} - {{ $row->kode_kpis->nama }}</td>
                <td>{{ $row->kode_kpis->target }}</td>
                <td>On Going</td>
                <td>
                  <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger hapus-kpi" data-id="{{ $row->id }}" data-divisi="{{ $row->divisis->nama }}" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                  <a href="/report_kpi/{{ $row->id_divisis }}/{{ $row->id_kode_kpis }}" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Report KPI</a>
                </td>
              </tr>
            @endif
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