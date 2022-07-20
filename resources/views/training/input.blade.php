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
          <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-training"><i class="glyphicon glyphicon-plus"></i> Input Training</a>
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
            <th>Jenis Training</th>
            <th>Judul Training</th>
            <th>Point</th>
            <th>Aksi</th>
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
                <td>{{ $row->poin }}</td>
                <td>
                  <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-training-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger hapus-training" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" data-judul="{{ $row->judul_training }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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

@push('training')

<script>
  $('.hapus-training').click(function(){
      var id_training = $(this).attr('data-id');
      var nama_karyawan = $(this).attr('data-nama');
      var judul_training = $(this).attr('data-judul');
      swal({
          title: "Hapus data",
          text: "Apakah kamu yakin akan menghapus data training karyawan "+nama_karyawan+" dengan judul "+judul_training+" ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/hapus_training/"+id_training+""
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