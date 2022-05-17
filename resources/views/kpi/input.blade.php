<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Employee Wakaf Salman ITB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- icon WS -->
  <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/wakaf-salman.ico') }}"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layout.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
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
            <form role="form" action="/tambah_kpi/" method="POST" enctype="multipart/form-data">
            @csrf
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
                      <a href="#" class="btn btn-primary tambah-kpi"><i class="glyphicon glyphicon-plus"></i></a>
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

  <!-- /.content-wrapper -->
  @include('layout.footer')

  <!-- Control Sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('template')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('template')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('template')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="{{asset('template')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('template')}}/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('template')}}/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('template')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('template')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('template')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('template')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('template')}}/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('template')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('template')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('template')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('template')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('template')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('template')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- Sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
  @endif
</script>
<script>
  $('.ckeditor').each(function () {
      CKEDITOR.replace($(this).prop('id'));
  });
</script>
<script>
  $('.tambah-kpi').on('click', function(){
    tambah_kpi();
  });
  function tambah_kpi(){
    var kpi = '<div id="kpi-dinamis" class="row"><div class="col-xs-2"><select name="id_kode_kpis[]" class="form-control" aria-label="Default select example"><option selected>Pilih KPI</option>@foreach($kode_kpi as $row)<option value="{{ $row->id }}">{{ $row->kode }} - {{ $row->nama }}</option>@endforeach</select></div><div class="col-xs-3"><input type="text" name="target[]" class="form-control"></div><div class="col-xs-3"><input type="text" name="progress[]" class="form-control"></div><div class="col-xs-3"><input type="text" name="kendala[]" class="form-control"></div><div class="col-xs-1"><a href="#" class="btn btn-danger hapus-kpi"><i class="glyphicon glyphicon-trash"></i></a></div></div>';
    $('.form-kpi-dinamis').append(kpi);
  }
  $('.hapus-kpi').on('click', function(){
    $('#kpi-dinamis').remove();
  });
</script>
</body>
</html>
