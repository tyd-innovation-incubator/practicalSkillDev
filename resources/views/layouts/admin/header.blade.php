<header class="main-header">
  <!-- Logo -->
  <a href="/admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>PRASDEL</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="css/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" style="width:30px; ">
            <span class="hidden-xs">{{ucfirst(Auth::user()->name)}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="/css/admin/dist/img/user2-160x160.jpg" class="img-circle " alt="User Image" style="width:50px; ">

              <p>
                {{ucfirst(Auth::user()->name)}} - Web Developer
                <small>Member since {{ucfirst(Auth::user()->created_at->toFormattedDateString())}}</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                  {{csrf_field()}}
                </form>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>
