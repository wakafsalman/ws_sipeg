@extends('layout.master')

@section('title','Sistem Employee Wakaf Salman ITB')

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
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Sistem Employee Wakaf Salman ITB</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        Sistem Pegawai Wakaf Salman ITB
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @if(in_array(Auth::user()->id, [1, 7, 16, 17]))
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $jumlah }} <small style="color: white;">orang</small> </h3>

            <p>Jumlah Karyawan</p>
          </div>
          <div class="icon">
            <i class="glyphicon glyphicon-user"></i>
          </div>
        </div>
      </div>
    </div>
    @endif

  </section>
</div>
@endsection