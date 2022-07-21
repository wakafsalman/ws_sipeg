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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-upload-bapb"><i class="glyphicon glyphicon-upload"></i> Upload BAPB</a>

      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Berita Acara Pengembalian Barang</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal Surat</th>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Jabatan</th>
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
            <td>{{ $row->no_surat }}</td>
            <td>{{ $row->tgl_surat }}</td>
            <td>{{ $row->pegawais->nama }}</td>
            <td>{{ $row->pegawais->divisis->nama }}</td>
            <td>{{ $row->pegawais->jabatans->nama }}</td>
            <td>
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-bapb-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                <a href="#" class="btn btn-danger hapus-bapb" data-id="{{ $row->id }}" data-surat="{{ $row->no_surat }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                <a href="{{asset('pdf/bapb')}}/{{ $row->file_surat }}" class="btn btn-info" download><i class="glyphicon glyphicon-download"></i> Simpan</a>
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

@include('aset.bapb.modal')

@push('bapb')

<script>
  $('.hapus-bapb').click(function(){
      var id_bapb = $(this).attr('data-id');
      var no_bapb = $(this).attr('data-surat');
      swal({
          title: "Hapus data",
          text: "Apakah kamu yakin akan menghapus data "+no_bapb+" ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/hapus_bapb/"+id_bapb+""
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