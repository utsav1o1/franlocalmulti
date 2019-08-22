@extends('layouts.agent.container')

@section('title', 'Access Denied')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');
        });
    </script>
@endsection

@section('dynamicdata')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('agent.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Error! Access Denied</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Error! Access Denied
                        </h3>
                    </div>
                    <div class="box-body">
                        <p><strong> An error has occurred while processing your request.</strong></p>
                        <p>This may occurred because there was an attempt to manipulate this software or
                            you have not enough permission to process this request.</p>
                        <p>If you have not enough permission, you can request to your system administrator to
                            get
                            additional access.</p>
                        <p>Users are prohibited from taking unauthorized actions to intentionally modify the
                            system.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@stop