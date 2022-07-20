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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-kode-kpi"><i class="glyphicon glyphicon-plus"></i> Tambah Kode KPI</a>

      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_kode_kpi" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-import-kode-kpi">
        <i class="glyphicon glyphicon-open"></i>
          Import Data
        </button>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Kode KPI</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kode KPI</th>
            <th>KPI</th>
            <th>Definisi</th>
            <th>Target</th>
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
            <td>{{ $row->kode }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->definisi }}</td>
            <td>{{ $row->target }}</td>
            <td>
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-kode-kpi-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                <a href="#" class="btn btn-danger hapus-kode-kpi" data-id="{{ $row->id }}" data-kode="{{ $row->kode }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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

@include('kode_kpi.modal')

@push('kode_kpi')

<script>
  $('.hapus-kode-kpi').click(function(){
      var id_kode_kpi = $(this).attr('data-id');
      var kode_kpi = $(this).attr('data-kode');
      swal({
          title: "Hapus data",
          text: "Apakah kamu yakin akan menghapus data "+kode_kpi+"? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/hapus_kode_kpi/"+id_kode_kpi+""
              swal("Data berhasil dihapus", {
              icon: "success",
              });
          } else {
              swal("Aksi dibatalkan!");
          }
      });
  });
</script>

@endpush


@endsection