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
        <a href="/absen_keluar" class="btn btn-success">Absen Keluar</a>    
      </div>
      <div class="col-md-1 pull-right">
        @if($jam_masuk->count() == 0)
        <a href="/absen_masuk" class="btn btn-info">Absen Masuk</a>
        @else
        <div></div>
        @endif
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
            <th>Rencana Kerja</th>
            <th>Jam Absen Keluar</th>
            <th>Hasil Kerja</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->pegawais->nama }}</td>
            <td>WFH</td>
            <td>{{ $row->jam_masuk }}</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-rencana">
                Lihat
              </button>

              <div class="modal fade" id="modal-rencana">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Rencana Kerja {{ $row->pegawais->nama }} Tanggal {{ $row->tanggal }}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </div>
                    <div class="modal-body">
                      <p>{{ $row->rencana_kerja }}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </td>
            @if( $row->jam_keluar != NULL)
            <td>{{ $row->jam_keluar }}</td>
            @else
            <td>00:00:00</td>
            @endif
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-hasil">
                Lihat
              </button>

              <div class="modal fade" id="modal-hasil">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hasil Kerja {{ $row->pegawais->nama }} Tanggal {{ $row->tanggal }}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </div>
                    <div class="modal-body">
                      <img src="{{ asset('img/hasil-kerja-wfh/'.$row->hasil_kerja)  }}" style="width: 580px; height: 300px;">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
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
@endsection