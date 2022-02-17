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
      <div class="col-md-1 pull-right">
        @if($jam_masuk->count() == 0)
          <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-absen-masuk"><i class="glyphicon glyphicon-log-in"></i> Absen Masuk</a>
        @else
          <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-absen-keluar"><i class="glyphicon glyphicon-log-out"></i> Absen Keluar</a>    
        @endif
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Jam Absen Masuk</th>
            <th>Rencana Kerja</th>
            <th>Jam Absen Keluar</th>
            <th>Hasil Kerja</th>
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
            <td>{{ $row->pegawais->nama }}</td>
            <td>WFH</td>
            <td>{{ $row->jam_masuk }}</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-rencana-{{ $row->id }}">
              <i class="glyphicon glyphicon-eye-open"></i> 
                Lihat
              </button>
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-rencana-kerja-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            </td>
            @if( $row->jam_keluar != NULL)
            <td>{{ $row->jam_keluar }}</td>
            @else
            <td>00:00:00</td>
            @endif
            @if( $row->hasil_kerja != NULL)
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-hasil-{{ $row->id }}">
              <i class="glyphicon glyphicon-eye-open"></i> 
                Lihat
              </button>
            </td>            
            @else
            <td></td>
            @endif
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

@include('absensi.modal')

@endsection