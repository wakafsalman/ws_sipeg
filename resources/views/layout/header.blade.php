<header class="main-header">
  <!-- Logo -->
  <a href="/beranda" class="logo">
    <!-- logo for regular state and mobile devices -->
    <img src="{{ asset('img/logo/wakaf-salman-white.png')  }}" style="width: 200px; height: 50px;">
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('img/profil/'.Auth::user()->foto)  }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->nama }}</span> 
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ asset('img/profil/'.Auth::user()->foto)  }}" class="img-circle" alt="User Image">

              <p>
                {{ Auth::user()->nama }} - {{ Auth::user()->roles->nama }}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/profil" class="btn btn-default btn-flat">Profil</a>
              </div>
              <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
