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
    <h1>
    </h1>
    <ol class="breadcrumb" style="font-size: 20px;">
      <li>Update : {{ $tanggal_indo }}</li>
    </ol>
  </section>
  <br>
  <br>

  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Stock Merchandise Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            @if(in_array(Auth::user()->id, [1, 16, 17, 46, 47]))
              <th>Limit</th>
              <th>Aksi</th>
            @endif
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->jumlah <= $row->limit)
                <tr style="color: red;">
                    <th scope="row">{{ $no++ }}</th>
                    <td><i class="glyphicon glyphicon-alert"></i> {{ $row->nama }}</td>
                    <td>{{ $row->satuan }}</td>
                    <td>{{ $row->jumlah }}</td>
                    @if(in_array(Auth::user()->id, [1, 16, 17, 46, 47]))
                      <td>{{ $row->limit }}</td>
                      <td>
                          <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-limit-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Set/Edit</a>
                          <a href="#" class="btn btn-danger hapus-limit" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                      </td>
                    @endif
                </tr>
            @else
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->satuan }}</td>
                    <td>{{ $row->jumlah }}</td>
                    @if(in_array(Auth::user()->id, [1, 16, 17, 46, 47]))
                      <td>{{ $row->limit }}</td>
                      <td>
                          <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-limit-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Set/Edit</a>
                          <a href="#" class="btn btn-danger hapus-limit" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                      </td>
                    @endif
                </tr>
            @endif
          @endforeach
          </tbody>
        </table>

      </div>
      <!-- /.box-body -->
    </div>

    <p>Keterangan tanda <i class="glyphicon glyphicon-alert" style="color: red;"> </i> dan warna merah : Stock Merchandise sudah terkena limit. Silahkan hubungi bagian GA/Manajer Operasional</p>

  </section>
  <!-- /.content -->
</div>

@include('aset.stock.modal')

@push('stock')

<script>
  $('.hapus-limit').click(function(){
      var id_limit = $(this).attr('data-id');
      var nama_limit = $(this).attr('data-nama');
      swal({
          title: "Hapus data",
          text: "Apakah kamu yakin akan menghapus data "+nama_limit+" ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/hapus_stock_merchandise/"+id_limit+""
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