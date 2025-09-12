 <!-- Navbar -->
 <nav class="main-header main_top_headershow navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-inline-block">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->



      <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="{{ asset('storage/' . Auth::user()->profile) }}" class="user-image" alt="User Image">
            <span>Admin</span>
            </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a class="dropdown-item" href="{{route('profile',auth::id())}}"><i class="fa fa-user d-inlne-block text-muted mr-2"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('adminLogout')}}"><i class="fas fa-sign-out-alt d-inlne-block text-muted mr-2"></i> Logout</a>
      </div>
      </li>

      <!--<li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt d-inlne-block text-muted mr-2"></i> Logout</a></li>-->
    </ul>
  </nav>
  <!-- /.navbar -->
