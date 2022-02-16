@extends('layout.master')

@section('title', 'Sistem Employee Wakaf Salman ITB')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{$judul}}
    </h1>
  </section>

  <section class="content-header">  
    <div class="row">
        <div class="col-md-4">
            Cari Rekap Absensi WFH Berdasarkan Nama :
        </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <form method="GET" action="/absensi">
        <div class="col-md-2">
            <select name="pegawai" class="form-control" aria-label="Default select example">
              <option selected>Pilih Pegawai</option>
              <option value="All">Semua Pegawai</option>
              @foreach($pegawai as $row)
                <option value="{{$row->id}}">{{$row->nama}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-md-1">
          <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Cari</button>
        </div>
      </form>
      <div class="col-md-1">
        <a href="/eksport_absensi" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Data Absensi</a>    
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
            </td>
            @if( $row->jam_keluar != NULL)
            <td>{{ $row->jam_keluar }}</td>
            @else
            <td>00:00:00</td>
            @endif
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-hasil-{{ $row->id }}">
              <i class="glyphicon glyphicon-eye-open"></i>   
                Lihat
              </button>
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

@include('absensi.modal')

@endsection