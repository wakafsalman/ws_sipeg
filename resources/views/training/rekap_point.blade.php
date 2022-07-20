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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Point</th>
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
            <td>{{ $row->nama_karyawan }}</td>
            <td>{{ $row->point }}</td>
            <td>
              <a href="#" class="btn btn-info reset-point" data-id="{{ $row->id_karyawan }}" data-nama="{{ $row->nama_karyawan }}"><i class="glyphicon glyphicon-repeat"></i> Reset Point</a>
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

@push('reset_point')

<script>
  $('.reset-point').click(function(){
      var id_karyawan = $(this).attr('data-id');
      var nama_karyawan = $(this).attr('data-nama');
      swal({
          title: "Reset Point",
          text: "Apakah kamu yakin akan mereset point training karyawan "+nama_karyawan+" ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/reset_point/"+id_karyawan+""
              swal("Data berhasil direset point", {
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