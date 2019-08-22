<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{!! asset('backend/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="treeview">
            <a href="{!! route('admin.dashboard') !!}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
        </li>
        <li class="treeview" style="display: none;">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Settings</span>
                <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{!! route('admin.property-type.index') !!}"><i class="fa fa-circle-o"></i> Property Types</a></li>
                <li><a href="{!! route('admin.property-category.index') !!}"><i class="fa fa-circle-o"></i> Property Categories</a></li>
                <li><a href="{!! route('admin.location.index') !!}"><i class="fa fa-circle-o"></i> Location</a></li>
            </ul>
        </li>

        <li class="treeview" style="display: none;">
            <a href="{!! route('admin.property.index') !!}">
                <i class="fa fa-suitcase"></i>
                <span>Properties</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>

        <li class="treeview">
            <a href="{!! route('admin.page.index') !!}">
                <i class="fa fa-pie-chart"></i>
                <span>Pages</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>

        <li style="display: none;">
            <a href="{!! route('admin.project-type.list') !!}">
                <i class="fa fa-product-hunt"></i>
                <span>Project Types</span>
                <span class="pull-right-container"></span>
            </a>
        </li>

        <li class="treeview" style="display: none;">
            <a href="{!! route('admin.project-location.list') !!}">
                <i class="fa fa-product-hunt"></i>
                <span>Project Locations</span>
                <span class="pull-right-container"></span>
            </a>
        </li>

        <li class="treeview" style="display: none;">
            <a href="{!! route('admin.project.list') !!}">
                <i class="fa fa-product-hunt"></i>
                <span>Projects</span>
                <span class="pull-right-container"></span>
            </a>
        </li>
        {{--<li class="treeview">--}}
            {{--<a href="{!! route('banner.index') !!}">--}}
                {{--<i class="fa fa-camera"></i>--}}
                {{--<span>Banners</span>--}}
                {{--<span class="pull-right-container">--}}
            {{--</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Users</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                {{--<li><a href="#"><i class="fa fa-circle-o"></i> Admins</a></li>--}}
                <li><a href="{!! route('admin.agent.index') !!}"><i class="fa fa-circle-o"></i> Agents</a></li>
                <li><a href="{!! route('admin.user.index') !!}"><i class="fa fa-circle-o"></i> Normal Users</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="{!! route('admin.subscriber.index') !!}">
                <i class="fa fa-envelope"></i>
                <span>Subscribers</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li><a href="{!! route('admin.logout') !!}"><i class="fa fa-circle-o"></i> <span>Logout</span></a></li>
    </ul>
</section>