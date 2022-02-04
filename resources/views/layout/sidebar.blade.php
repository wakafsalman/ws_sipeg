<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Welcome,</p>
        <p><b>Ryan Pradhana</b></p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Pegawai</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
