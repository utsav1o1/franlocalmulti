@extends('layouts.admin.containerlist')

@section('title', 'Audit Log')

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
            Logs
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Logs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="get" action="">
                            <div class="form-group col-md-6">
                                <label>Period From</label>
                                <input class="form-control date" type="text" name="from_date" placeholder="Start date"
                                       value="{{ (!empty($requestData['from_date'])) ? $requestData['from_date'] : date('Y-m-d') }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Period To</label>
                                <input class="form-control date" type="text" placeholder="end date" name="to_date"
                                       value="{{ (!empty($requestData['to_date'])) ? $requestData['to_date'] : date('Y-m-d') }}"/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xs-6 form-group">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Type</th>
                                <th>Username</th>
                                <th>IP Address</th>
                                <th>Datetime</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td>{!! $index+1 !!}</td>
                                    <td>{!! $record->loginable_type !!}</td>
                                    <td>{!! $record->loginable->email_address !!}</td>
                                    <td>{!! $record->ip_address !!}</td>
                                    <td>{!! $record->created_on !!}</td>
                                    <td>{!! $record->description !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $logs->appends($requestData)->render() !!}
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