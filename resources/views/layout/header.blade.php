<header class="main-header">
  <!-- Logo -->
  <a href="{{asset('template')}}/index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">WKF</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Wakaf Salman ITB</span>
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
            <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">Ryan Pradhana</span> 
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                Ryan Pradhana - Junior Assistant Manager System Analyst
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <form id="logout-form" action="#" method="POST" class="d-none">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat">Logout</button>
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
