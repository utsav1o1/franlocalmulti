<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Sunil Adhikari">
    <meta name="email" content="adhikarysunil.1@gmail.com">
    <title>{{ env('APP_NAME') }} || Reset Password</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="{!! asset('backend/plugins/iCheck/square/blue.css') !!}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>{!! env('APP_NAME') !!}</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Reset Password</p>

        <form action="{{ route('agent.forgot.password.update', $agent->reset_token) }}" method="post">
            @include('layouts.agent.alert')
            <div class="form-group has-feedback">
                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    <input type="hidden" name="_method" value="PUT" />
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{!! asset('backend/plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('backend/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- iCheck -->
<script src="{!! asset('backend/plugins/iCheck/icheck.min.js') !!}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>

