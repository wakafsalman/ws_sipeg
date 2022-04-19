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
            Cari Rekap Cuti Berdasarkan Nama :
        </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <form method="GET" action="/rekap_cuti">
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
        <a href="/eksport_cuti" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Rekap Cuti Karyawan</a>    
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
            <th>Nama</th>
            <th>Tanggal Awal Cuti</th>
            <th>Tanggal Akhir Cuti</th>
            <th>Jumlah Hari Cuti</th>
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
            <td>{{ $row->pegawais->nama }}</td>
            <td>{{ $row->tanggal_awal_indo }}</td>
            <td>{{ $row->tanggal_akhir_indo }}</td>
            <td>{{ $row->jumlah_cuti + 1 }}</td>
            <td>
                <a href="/buka_form_cuti/{{ $row->id }}" class="btn btn-info"><i class="glyphicon glyphicon-print"></i> Buka</a>
                <a href="/simpan_form_cuti/{{ $row->id }}" class="btn btn-info"><i class="glyphicon glyphicon-download-alt"></i> Simpan</a>
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

@endsection