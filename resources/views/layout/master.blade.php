<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <!-- JavaScript Jam -->
  <script src="{{asset('js')}}/jam.js"></script>
  <style>
        #watch {
            color : rgb(252, 150, 65);
            position : absolute;
            z-index: 1;
            height: 40px;
            width: 700px;
            overflow: show:
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            -webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
                         4px 4px 20px rgba(210, 45, 26, 0.4),
                         4px 4px 30px rgba(210, 25, 16, 0.4),
                         4px 4px 40px rgba(210, 15, 06, 0.4);
        }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="realtimeClock()">
<div class="wrapper">

  @include('layout.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
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
$('.hapus').click(function(){
    var id_pegawai = $(this).attr('data-id');
    var nama_pegawai = $(this).attr('data-nama');
    swal({
        title: "Hapus data",
        text: "Apakah kamu yakin akan menghapus data "+nama_pegawai+"? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/hapus_pegawai/"+id_pegawai+""
            swal("BAAAAM! Data berhasil dihapus", {
            icon: "success",
            });
        } else {
            swal("Aksi dibatalkan!");
        }
    });
});
</script>
<script>
$('.hapus-user').click(function(){
    var id_user = $(this).attr('data-id');
    var nama_user = $(this).attr('data-nama');
    swal({
        title: "Hapus data",
        text: "Apakah kamu yakin akan menghapus data "+nama_user+"? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/hapus_user/"+id_user+""
            swal("BAAAAM! Data berhasil dihapus", {
            icon: "success",
            });
        } else {
            swal("Aksi dibatalkan!");
        }
    });
});
</script>
<script>
$('.hapus-divisi').click(function(){
    var id_divisi = $(this).attr('data-id');
    var nama_divisi = $(this).attr('data-nama');
    swal({
        title: "Hapus data",
        text: "Apakah kamu yakin akan menghapus data "+nama_divisi+"? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/hapus_divisi/"+id_divisi+""
            swal("BAAAAM! Data berhasil dihapus", {
            icon: "success",
            });
        } else {
            swal("Aksi dibatalkan!");
        }
    });
});
</script>
<script>
$('.hapus-jabatan').click(function(){
    var id_jabatan = $(this).attr('data-id');
    var nama_jabatan = $(this).attr('data-nama');
    swal({
        title: "Hapus data",
        text: "Apakah kamu yakin akan menghapus data "+nama_jabatan+"? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/hapus_jabatan/"+id_jabatan+""
            swal("BAAAAM! Data berhasil dihapus", {
            icon: "success",
            });
        } else {
            swal("Aksi dibatalkan!");
        }
    });
});
</script>
<script>
$('.hapus-role-user').click(function(){
    var id_role_user = $(this).attr('data-id');
    var nama_role_user = $(this).attr('data-nama');
    swal({
        title: "Hapus data",
        text: "Apakah kamu yakin akan menghapus data "+nama_role_user+"? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/hapus_role_user/"+id_role_user+""
            swal("BAAAAM! Data berhasil dihapus", {
            icon: "success",
            });
        } else {
            swal("Aksi dibatalkan!");
        }
    });
});
</script>
<script>
  @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
  @endif
</script>
</body>
</html>
