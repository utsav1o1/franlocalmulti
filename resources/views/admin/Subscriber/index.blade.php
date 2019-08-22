@extends('layouts.admin.containerlist')

@section('title', 'Subscribers')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');
            var oTable = $("#data-table").DataTable();
        });
    </script>
@endsection

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Subscribers
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Subscribers</li>
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
                        @include('layouts.admin.alert')
                    </div>
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Email Address</th>
                                <th>Subscribed On</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="email_address">{!! $record->email_address !!}</td>
                                    <td class="subscribed_on">{!! $record->created_at->toFormattedDateString() !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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