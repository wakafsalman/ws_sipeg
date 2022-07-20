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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-report-stock"><i class="glyphicon glyphicon-plus"></i> Tambah Laporan</a>

      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Laporan Stok Opname Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Keterangan</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>File</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
          <tr>
            <td>{{ $row->keterangan }}</td>
            <td>{{ $row->tanggal_indo }}</td>
            <td>{{ $row->status }}</td>
            <td><a href="{{asset('pdf/stock-opname')}}/{{ $row->file }}">{{ $row->file }}</a></td>
            <td>
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-stock-opname-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="#" class="btn btn-danger hapus-stock-opname" data-id="{{ $row->id }}" data-nama="{{ $row->keterangan }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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

@include('aset.report_stock.modal')

@push('report_stock')

<script>
  $('.hapus-stock-opname').click(function(){
      var id_stock_opname = $(this).attr('data-id');
      var nama_stock_opname = $(this).attr('data-nama');
      swal({
          title: "Hapus data",
          text: "Apakah kamu yakin akan menghapus data "+nama_stock_opname+" ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/hapus_report_stock/"+id_stock_opname+""
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