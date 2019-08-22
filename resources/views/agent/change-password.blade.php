<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="PeaceNepalDOTCom">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>{{ env('APP_NAME') }}</title>

    <!--Core CSS -->
    <link href="{!! asset('bs3/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap-reset.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style-responsive.css') !!}" rel="stylesheet"/>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="{!! asset('js/ie8-responsive-file-warning.js') !!}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">
<div class="container">

    <form class="form-signin" action="" method="POST">
        @if (count($errors) > 0)
            <div class="portlet-body">
                <div class="alert alert-block alert-danger fade in">
                    <button class="close close-sm" data-dismiss="alert" type="button">
                        <i class="fa fa-times">
                        </i>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <h2 class="form-signin-heading">Change Password</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="password" class="form-control" placeholder="Current Password" name="current_password">
                <input type="password" class="form-control" placeholder="New Password" name="new_password">
                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
            </div>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <button class="btn btn-lg btn-login btn-block" type="submit">Change</button>
            <a class="btn btn-lg btn-login btn-block" href="{!! URL::current() == URL::previous() ? route('dashboard') : URL::previous() !!}">Back</a>
        </div>

    </form>

</div>


<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="{!! asset('js/jquery.js') !!}"></script>
<script src="{!! asset('bs3/js/bootstrap.min.js') !!}"></script>

</body>
</html>
