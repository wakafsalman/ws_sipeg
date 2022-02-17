@extends('layout.master')

@section('title','Sistem Employee Wakaf Salman ITB')

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
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/profil/'.Auth::user()->foto)  }}" style="width:128px; height:128px;" alt="User profile picture">

            <h3 class="profile-username text-center">{{ Auth::user()->nama }}</h3>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Email : </b> <div class="pull-right">{{ Auth::user()->email }}</div>
              </li>
            </ul>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#settings">Rubah Profil</a>
          </ul>
          <div class="tab-content">
            <form role="form" class="form-horizontal" action="/rubah_profil/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
            @csrf  
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Nama Lengkap</label>

                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ Auth::user()->nama }}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="text" name="email" class="form-control" id="exampleInputEmail" value="{{ Auth::user()->email }}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPhoto" class="col-sm-2 control-label">Foto</label>

                <div class="col-sm-10">
                  <input type="file" name="foto" class="form-control" id="exampleInputPhoto">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="exampleInputPassword" value="{{ Auth::user()->password }}">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>

</div>
@endsection