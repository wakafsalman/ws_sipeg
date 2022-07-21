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
            <th>Divisi</th>
            <th>KPi</th>
            <th>Deskripsi</th>
            <th>PIC</th>
            <th>Jabatan</th>
            <th>Progress</th>
            <th>Keterangan</th>
            <th>Kendala</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
            <tr>
            @if($row->id_divisis == 2)
              <td>Kolaborasi</td>
            @else
              <td>{{ $row->divisis->nama }}</td>
            @endif
            <td>{{ $row->kode_kpis->kode }} - {{ $row->kode_kpis->nama }}</td>
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
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-report-user-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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

@include('kpi.report.staff.modal')

@endsection