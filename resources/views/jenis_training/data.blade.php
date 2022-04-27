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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-jenis-training"><i class="glyphicon glyphicon-plus"></i> Tambah Jenis Training</a>

      </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
        <a href="/eksport_jenis_training" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Excel</a>    
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-import-jenis-training">
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
        <h3 class="box-title">Jenis Training Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Jenis Training</th>
            <th>Poin</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
            @if($row->nama != "Bonus Point")
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $row->nama }}</td>
              <td>{{ $row->poin }}</td>
              <td>
                  <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-jenis-training-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger hapus-jenis-training" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
              </td>
            </tr>
            @endif
          @endforeach
          </tbody>
        </table>

        @if(!empty($bonus))
          @foreach($bonus as $data_bonus)
            <div style="margin-top: 40px;">
              <b> Bonus Point Saat Ini : {{ $data_bonus->poin }} Point. <a href="" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-rubah-bonus-{{ $data_bonus->id }}" style="margin-left: 16px;"><i class="glyphicon glyphicon-pencil"></i> Edit Bonus Point</a></b>
            </div>
          @endforeach
        @endif
    
      </div>
      <!-- /.box-body -->
    </div>

  </section>

  <!-- /.content -->
</div>

@include('jenis_training.modal')

@endsection