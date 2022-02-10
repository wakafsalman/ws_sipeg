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
        <p><b>{{ Auth::user()->nama }}</b></p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>

      <!-- Hak Akses Super Admin -->
      @if (auth()->user()->id_roles==1)
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Pegawai</span></a></li>
      <li class="treeview {{ request()->is('absensi') || request()->is('absen') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-list-alt"></i>
          <span>Absensi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/absensi"><i class="fa fa-circle-o"></i>Rekap Absensi WFH</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('user') || request()->is('divisi') || request()->is('jabatan') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-cog"></i>
          <span>Pengaturan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/user"><i class="fa fa-circle-o"></i>User</a></li>
          <li><a href="/divisi"><i class="fa fa-circle-o"></i>Divisi</a></li>
          <li><a href="/jabatan"><i class="fa fa-circle-o"></i>Jabatan</a></li>
          <li><a href="/role_user"><i class="fa fa-circle-o"></i>Role User</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff -->
      @elseif (auth()->user()->id_roles==7)
      <li class="treeview {{ request()->is('absensi') || request()->is('absen') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-list-alt"></i>
          <span>Absensi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/absen"><i class="fa fa-circle-o"></i>Absensi WFH</a></li>
        </ul>
      </li>

      <!-- Hak Akses HRD -->
      @elseif (auth()->user()->id_roles==8)
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Pegawai</span></a></li>
      <li class="treeview {{ request()->is('absensi') || request()->is('absen') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-list-alt"></i>
          <span>Absensi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/absensi"><i class="fa fa-circle-o"></i>Rekap Absensi WFH</a></li>
          <li><a href="/absen"><i class="fa fa-circle-o"></i>Absensi WFH</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('user') || request()->is('divisi') || request()->is('jabatan') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-cog"></i>
          <span>Pengaturan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/divisi"><i class="fa fa-circle-o"></i>Divisi</a></li>
          <li><a href="/jabatan"><i class="fa fa-circle-o"></i>Jabatan</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
