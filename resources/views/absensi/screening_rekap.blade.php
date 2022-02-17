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
        <div class="col-md-4">
            Cari Rekap Screening Harian Berdasarkan Nama :
        </div>
    </div>
  </section>

  <section class="content-header">  
    <div class="row">
      <form method="GET" action="/screening">
        <div class="col-md-2">
            <select name="pegawai" class="form-control" aria-label="Default select example">
              <option selected>Pilih Pegawai</option>
              <option value="All">Semua Pegawai</option>
              @foreach($pegawai as $row)
                <option value="{{$row->id}}">{{$row->nama}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-md-1">
          <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Cari</button>
        </div>
      </form>
      <div class="col-md-1">
        <a href="/eksport_screening" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Eksport Data Screening Harian</a>    
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
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Demam</th>
            <th>Batuk Berdahak</th>
            <th>Batuk Kering</th>
            <th>Lesu Lelah</th>
            <th>Sesak Nafas</th>
            <th>Nyeri/Ngilu Sendi</th>
            <th>Sakit Kepala</th>
            <th>Bersin-bersin</th>
            <th>Pilek</th>
            <th>Hidung Tersumbat</th>
            <th>Mata Berair</th>
            <th>Sakit Tenggorokan</th>
            <th>Diare</th>
            <th>Penciuman</th>
            <th>Rasa Lidah</th>
            <th>Keluhan Lainnya</th>
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
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->demam }}</td>
            <td>{{ $row->batuk_dahak }}</td>
            <td>{{ $row->batuk_kering }}</td>
            <td>{{ $row->lelah }}</td>
            <td>{{ $row->sesak_nafas }}</td>
            <td>{{ $row->nyeri_sendi }}</td>
            <td>{{ $row->sakit_kepala }}</td>
            <td>{{ $row->bersin }}</td>
            <td>{{ $row->pilek }}</td>
            <td>{{ $row->hidung_mampet }}</td>
            <td>{{ $row->mata_berair }}</td>
            <td>{{ $row->sakit_tenggorokan }}</td>
            <td>{{ $row->diare }}</td>
            <td>{{ $row->cium_aroma }}</td>
            <td>{{ $row->rasa_lidah }}</td>
            <td>{{ $row->lain_lain }}</td>
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

@include('absensi.modal')

@endsection