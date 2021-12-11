<nav class="navbar page-header">
    <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
        <i class="fa fa-indent"></i>
    </a>
    <a href="#" class="btn btn-link sidebar-mobile-toggle d-lg-none ">
        <i class="fa fa-indent"></i>
    </a>

    <a class="navbar-brand" href="#">
        <img src="{{asset('assets/images/pangaea_logo.png')}}" alt="Pangaea">
    </a>



    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/img/avatar.png') }}" class="avatar avatar-sm" alt="logo">
                <span class="small ml-1 d-md-down-none">Admin user</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fa fa-bell"></i> Notifications
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-lock"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
