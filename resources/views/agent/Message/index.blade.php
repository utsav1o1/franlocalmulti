@extends('layouts.agent.containerlist')

@section('title', 'Properties')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');
            var oTable = $("#data-table").DataTable();

            $('#viewMessageModal').on('hidden.bs.modal', function () {
                $(this).data('bs.modal', null);
                $('#viewMessageModal').removeData('bs.modal');
            });
        });
    </script>
@endsection

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Messages
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('agent.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Messages</li>
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
                        @include('layouts.agent.alert')
                    </div>
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Message</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="full_name">{!! $record->full_name !!}</td>
                                    <td class="email_address">{!! $record->email_address !!}</td>
                                    <td class="phone_number">{!! $record->phone_number !!}</td>
                                    <td class="message">{!! str_limit($record->message, 30) !!}</td>
                                    <td>
                                        <a data-toggle="modal"
                                           href="{!! route('agent.message.show', $record->id) !!}"
                                           data-target="#viewMessageModal" title="View Message">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
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

    <!-- Show view item model -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"></div>
        </div>
    </div>


@stop