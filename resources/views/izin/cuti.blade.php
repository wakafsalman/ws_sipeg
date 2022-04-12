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
          <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-cuti"><i class="glyphicon glyphicon-plus"></i> Ajukan Cuti</a>
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
            <th>Nama</th>
            <th>Tanggal Awal Cuti</th>
            <th>Tanggal Akhir Cuti</th>
            <th>Jumlah Hari Cuti</th>
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
            <td>{{ $row->tanggal_awal }}</td>
            <td>{{ $row->tanggal_akhir }}</td>
            <td></td>
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

@include('izin.modal')

@endsection