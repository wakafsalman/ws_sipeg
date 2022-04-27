<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('img/profil/'.Auth::user()->foto)  }}" class="img-circle" alt="User Image" style="width:45px; height:45px;">
      </div>
      <div class="pull-left info">
        <p>Welcome,</p>
        <p><b>{{ Auth::user()->nama }}</b></p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>

      <!-- Hak Akses Admin System Employee Wakaf Salman -->
      @if (auth()->user()->id_roles==33)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Karyawan</span></a></li>
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
          <li><a href="/screening"><i class="fa fa-circle-o"></i>Rekap Screening Harian</a></li>
          <li><a href="/absensi"><i class="fa fa-circle-o"></i>Rekap Absensi WFH</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('cuti') || request()->is('rekap_cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
          <li><a href="/rekap_cuti"><i class="fa fa-circle-o"></i>Rekap Cuti Karyawan</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
          <li><a href="/rekap_training"><i class="fa fa-circle-o"></i>Rekap Training Karyawan</a></li>
          <li><a href="/rekap_point"><i class="fa fa-circle-o"></i>Rekap Poin Karyawan</a></li>
          <li><a href="/jenis_training"><i class="fa fa-circle-o"></i>Jenis Training</a></li>
          <li><a href="/benefit"><i class="fa fa-circle-o"></i>Benefit</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('kode_kpi') || request()->is('kpi') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-calendar"></i>
          <span>KPI</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/kode_kpi"><i class="fa fa-circle-o"></i>Kode KPI</a></li>
          <li><a href="/kpi"><i class="fa fa-circle-o"></i>KPI</a></li>
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
      <li class="{{ request()->is('donatur') ? 'active' : '' }}"><a href="/donatur"><i class="glyphicon glyphicon-user"></i><span>Donatur</span></a></li>

      <!-- Hak Akses Direktur -->
      @elseif (auth()->user()->id_roles==11)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Karyawan</span></a></li>
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
          <li><a href="/screening"><i class="fa fa-circle-o"></i>Rekap Screening Harian</a></li>
          <li><a href="/absensi"><i class="fa fa-circle-o"></i>Rekap Absensi WFH</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('cuti') || request()->is('rekap_cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
          <li><a href="/rekap_cuti"><i class="fa fa-circle-o"></i>Rekap Cuti Karyawan</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
          <li><a href="/rekap_training"><i class="fa fa-circle-o"></i>Rekap Training Karyawan</a></li>
          <li><a href="/rekap_point"><i class="fa fa-circle-o"></i>Rekap Poin Karyawan</a></li>
          <li><a href="/jenis_training"><i class="fa fa-circle-o"></i>Jenis Training</a></li>
          <li><a href="/benefit"><i class="fa fa-circle-o"></i>Benefit</a></li>
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
      <li class="{{ request()->is('donatur') ? 'active' : '' }}"><a href="/donatur"><i class="glyphicon glyphicon-user"></i><span>Donatur</span></a></li>

      <!-- Hak Akses Jr. Manager Operational -->
      @elseif (auth()->user()->id_roles==12)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Karyawan</span></a></li>
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
          <li><a href="/screening"><i class="fa fa-circle-o"></i>Rekap Screening Harian</a></li>
          <li><a href="/absensi"><i class="fa fa-circle-o"></i>Rekap Absensi WFH</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('cuti') || request()->is('rekap_cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
          <li><a href="/rekap_cuti"><i class="fa fa-circle-o"></i>Rekap Cuti Karyawan</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
          <li><a href="/rekap_training"><i class="fa fa-circle-o"></i>Rekap Training Karyawan</a></li>
          <li><a href="/rekap_point"><i class="fa fa-circle-o"></i>Rekap Poin Karyawan</a></li>
          <li><a href="/jenis_training"><i class="fa fa-circle-o"></i>Jenis Training</a></li>
          <li><a href="/benefit"><i class="fa fa-circle-o"></i>Benefit</a></li>
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

      <!-- Hak Akses Jr. Manager Marketing -->
      @elseif (auth()->user()->id_roles==13)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Jr. Manager Program -->
      @elseif (auth()->user()->id_roles==14)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Sr. Assistant Manager Marketing Ritel & CRM -->
      @elseif (auth()->user()->id_roles==15)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Sr. Assistant Manager Program -->
      @elseif (auth()->user()->id_roles==16)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Jr. Assistant Manager System Analyst -->
      @elseif (auth()->user()->id_roles==17)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Jr. Assistant Manager Marketing Communication -->
      @elseif (auth()->user()->id_roles==18)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Jr. Assistant Manager Marketing Corporate -->
      @elseif (auth()->user()->id_roles==19)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Supervisor Digital Marketing -->
      @elseif (auth()->user()->id_roles==20)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Supervisor Finance -->
      @elseif (auth()->user()->id_roles==21)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Supervisor Marketing Ritel & CRM -->
      @elseif (auth()->user()->id_roles==22)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Graphic Designer -->
      @elseif (auth()->user()->id_roles==23)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses HR Officer -->
      @elseif (auth()->user()->id_roles==24)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Karyawan</span></a></li>
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
          <li><a href="/screening"><i class="fa fa-circle-o"></i>Rekap Screening Harian</a></li>
          <li><a href="/absensi"><i class="fa fa-circle-o"></i>Rekap Absensi WFH</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('cuti') || request()->is('rekap_cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
          <li><a href="/rekap_cuti"><i class="fa fa-circle-o"></i>Rekap Cuti Karyawan</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
          <li><a href="/rekap_training"><i class="fa fa-circle-o"></i>Rekap Training Karyawan</a></li>
          <li><a href="/rekap_point"><i class="fa fa-circle-o"></i>Rekap Poin Karyawan</a></li>
          <li><a href="/jenis_training"><i class="fa fa-circle-o"></i>Jenis Training</a></li>
          <li><a href="/benefit"><i class="fa fa-circle-o"></i>Benefit</a></li>
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

      <!-- Hak Akses Public Relation -->
      @elseif (auth()->user()->id_roles==25)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff Administration & Support -->
      @elseif (auth()->user()->id_roles==27)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff Finance -->
      @elseif (auth()->user()->id_roles==28)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff Marketing Communication -->
      @elseif (auth()->user()->id_roles==29)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff Marketing Corporate -->
      @elseif (auth()->user()->id_roles==30)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff Marketing Ritel & CRM -->
      @elseif (auth()->user()->id_roles==31)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff Program -->
      @elseif (auth()->user()->id_roles==32)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>

      <!-- Hak Akses Staff -->
      @elseif (auth()->user()->id_roles==26)
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
      <li class="{{ request()->is('pegawai') ? 'active' : '' }}"><a href="/pegawai"><i class="glyphicon glyphicon-user"></i><span>Data Pribadi</span></a></li>
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
      <li class="treeview {{ request()->is('cuti') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i>
          <span>Perizinan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('training') || request()->is('rekap_training') || request()->is('rekap_point') || request()->is('jenis_training') || request()->is('benefit') ? 'active' : '' }}">
        <a href="#">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Training</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/training"><i class="fa fa-circle-o"></i>Input Training</a></li>
        </ul>
      </li>
      @endif


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
