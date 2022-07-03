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
          <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-pengajuan-aset"><i class="glyphicon glyphicon-plus"></i> Pengajuan Barang</a>
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
            <th>Jabatan</th>
            <th>Tanggal Pengajuan</th>
            <th>Nama Aset</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Keterangan</th>
            <th>Status</th>
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
            <td>{{ $row->pegawais->nama }}</td>
            <td>{{ $row->jabatans->nama }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->assets }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->satuan }}</td>
            <td>{{ $row->keterangan }}</td>
            @if($row->status=="")
            <td>Waiting approval from GA/Operation Manager</td>
            @else
              @if($row->status=="Accepted")
                <td><div class="label label-success" style="font-size: 14px;">{{ $row->status }}</div></td>
              @elseif($row->status=="Rejected")
                <td><div class="label label-danger" style="font-size: 14px;">{{ $row->status }}</div></td>
              @endif
            @endif
            <td style="padding: 5px;">
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-pengajuan-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="#" class="btn btn-danger hapus-pengajuan" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" data-aset="{{ $row->assets }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
              <br>
              <a href="/setujui_pengajuan/{{ $row->id }}" class="btn btn-success" style="margin-top: 5px;"><i class="glyphicon glyphicon-ok"></i> Approve</a>
              <a href="/batalkan_pengajuan/{{ $row->id }}" class="btn btn-danger" style="margin-top: 5px;"><i class="glyphicon glyphicon-remove"></i> Reject</a>
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

@include('aset.pengajuan.modal')

@endsection