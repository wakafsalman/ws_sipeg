@extends('layout.master')

@section('title', 'WAKAF SALMAN SIPEG')

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
        <a href="#" class="btn btn-success">Absen Keluar</a>    
      </div>
      <div class="col-md-1 pull-right">
        <a href="#" class="btn btn-info">Absen Masuk</a>
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
            <th>Jam Absen Keluar</th>
            <th>Hasil Kerja</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th scope="row">1</th>
            <td>8 February 2022</td>
            <td>Radian Pradhana</td>
            <td>WFH</td>
            <td>08:51:19</td>
            <td>18:10:13</td>
            <td>
                <img src="{{ asset('img/absensi-wfh/radian-pradhana/Hasil-Kerja-08-02-2022.png')  }}" style="width: 180px; height: 200px;">
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

  </section>
  <!-- /.content -->
</div>
@endsection