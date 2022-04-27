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
            Cari Rekap Record Training Karyawan Berdasarkan Nama :
        </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <form method="GET" action="/rekap_training">
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
        <a href="/eksport_training" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Data Record Training</a>    
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
            <th>Nama Karyawan</th>
            <th>Jenis Training</th>
            <th>Judul Training</th>
            <th>Hasil Kerja</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->id_training_types != 2)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $row->pegawais->nama }}</td>
              <td>{{ $row->training_types->nama }}</td>
              <td>{{ $row->judul_training }}</td>
              <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-hasil-training-{{ $row->id }}">
                <i class="glyphicon glyphicon-eye-open"></i>   
                  Lihat
                </button>
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

@include('training.modal')

@endsection