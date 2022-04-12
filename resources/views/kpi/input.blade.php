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

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control">
                    </div>
                    <div class="col-xs-6">
                      <label for="exampleInputTitle" class="form-label">Jabatan</label>
                      <select name="id_jabatans" class="form-control" aria-label="Default select example">
                          <option selected>Pilih Jabatan</option>
                          @foreach($jabatan as $row)
                          <option value="{{ $row->id }}">{{ $row->nama }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
              </div>
              <br>
              <br>
              <br>
              <br>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-1">
                    <a href="#" class="btn btn-primary mb-4 tambah-kpi"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label for="exampleInputTitle" class="form-label">Key Performance Indikator</label>
                    <select name="id_kode_kpis" class="form-control" aria-label="Default select example">
                        <option selected>Pilih KPI</option>
                        @foreach($kode_kpi as $row)
                        <option value="{{ $row->id }}">{{ $row->kode }} - {{ $row->nama }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-xs-3">
                    <label>Target</label>
                    <input type="text" name="target" class="form-control">
                  </div>
                  <div class="col-xs-3">
                    <label>Progress</label>
                    <input type="text" name="progress" class="form-control">
                  </div>
                  <div class="col-xs-3">
                    <label>Kendala</label>
                    <input type="text" name="kendala" class="form-control">
                  </div>
                  <div class="col-xs-1">
                    <label>Aksi</label>
                    <br>
                    <a href="#" class="btn btn-danger hapus-kpi"><i class="glyphicon glyphicon-trash"></i></a>
                  </div>
                </div>
              </div>
              <div class="form-group form-kpi-dinamis"></div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-1 pull-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

@endsection
