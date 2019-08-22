
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') || {!! env('APP_NAME') !!}</title>
    <meta name="author" content="Sunil Adhikari"/>
    <meta name="email" content="adhikarysunil.1@gmail.com"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!! asset('backend/bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('backend/dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('backend/dist/css/skins/_all-skins.min.css') !!}">

    @yield('header_css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        @include('layouts.admin.header')
    </header>
    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('layouts.admin.sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('dynamicdata')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        @include('layouts.admin.footer')
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{!! asset('backend/plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('backend/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- SlimScroll -->
<script src="{!! asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('backend/plugins/fastclick/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('backend/dist/js/app.min.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('backend/dist/js/demo.js') !!}"></script>
@yield('footer_js')
</body>
</html>
