@extends('layout.master')

@section('title', 'Sistem Employee Wakaf Salman ITB')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @foreach($judul_data as $row_data)
      @if($row_data->id_divisis == 2)
        @if($loop->first)
            <h1>
                {{$judul}} Kolaborasi : {{ $row_data->kode_kpis->nama }}
            </h1>
        @endif
      @else
        @if($loop->first)
            <h1>
                {{$judul}} {{ $row_data->divisis->nama }} : {{ $row_data->kode_kpis->nama }}
            </h1>
        @endif
      @endif
    @endforeach
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$judul}}</a></li>
    </ol>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-report-kpi"><i class="glyphicon glyphicon-plus"></i> Tambah Report</a>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>Deskripsi</th>
            <th>PIC</th>
            <th>Jabatan</th>
            <th>Progress</th>
            @foreach($judul_data as $row_data)
              @if(in_array($row_data->id_kode_kpis, [1, 3]))
                @if($loop->first)
                  <th>Tanggal</th>
                @endif
              @else
                @if($loop->first)
                  <th>Keterangan</th>
                @endif
              @endif
            @endforeach
            <th>Kendala</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
          <tr>
            <td>{{ $row->deskripsi }}</td>
            <td>{{ $row->pegawais->nama }}</td>
            <td>{{ $row->pegawais->jabatans->nama }}</td>
            <td>
              <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $row->progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $row->progress }}%;">
                </div>
              </div>              
              <span>{{ $row->progress }}%</span>
            </td>
            @if(in_array($row->id_kode_kpis, [1, 3]))
              <td>{{ $row->tanggal }}</td>
            @else
              <td>{{ $row->keterangan }}</td>
            @endif
            <td>{{ $row->kendala }}</td>
            <td>
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-report-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              @if($row->id_divisis == 2)
                <a href="#" class="btn btn-danger hapus-report-kpi" data-id="{{ $row->id }}" data-divisi="Kolaborasi" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}" data-deskripsi="{{ $row->deskripsi }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
              @else            
                <a href="#" class="btn btn-danger hapus-report-kpi" data-id="{{ $row->id }}" data-divisi="{{ $row->divisis->nama }}" data-kode="{{ $row->kode_kpis->kode }}" data-nama="{{ $row->kode_kpis->nama }}" data-deskripsi="{{ $row->deskripsi }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
              @endif
          </td>
        </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="row">
      <div class="col-md-1">
        <a href="/kpi" class="btn btn-info mb-4"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
      </div>
    </div>

  </section>

  <!-- /.content -->
</div>

@include('kpi.report.management.modal')

@endsection