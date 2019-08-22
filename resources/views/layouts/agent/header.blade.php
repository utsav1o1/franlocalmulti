
    <!-- Logo -->
    <a href="{!! route('admin.dashboard') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b>Dy</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Multi</b>Dynamic</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! asset('backend/dist/img/user2-160x160.jpg') !!}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{!! $agent->first_name !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{!! asset('backend/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">

                            <p>
                                {!! $agent->first_name !!}
                                <small></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! route('home') !!}" target="_blank" class="btn btn-default btn-flat">Visit Website</a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! route('admin.logout') !!}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>