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
            <a href="{!! route('agent.dashboard') !!}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
              <i class="fa pull-right"></i>
            </span>
            </a>
        </li>
        <li class="treeview" style="display: none;">
            <a href="{!! route('agent.property.index') !!}">
                <i class="fa fa-pie-chart"></i>
                <span>Properties</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li class="treeview">
            <a href="{!! route('agent.message.index') !!}">
                <i class="fa fa-envelope"></i>
                <span>Messages</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li><a href="{!! route('agent.logout') !!}"><i class="fa fa-circle-o"></i> <span>Logout</span></a></li>
    </ul>
</section>