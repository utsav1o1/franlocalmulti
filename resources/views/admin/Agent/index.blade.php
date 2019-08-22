@extends('layouts.admin.containerlist')

@section('title', 'Agents')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            var oTable = $("#data-table").DataTable();

            $('table tbody').sortable({
                update: function (event, ui) {
                    var $object = $(this);
                    var agents = $(this).sortable('serialize');
                    var count = parseInt($object.children().first().children('td:nth-child(2)').html());
                    $object.children('tr').each(function () {
                        var sn = parseInt($(this).children('td:nth-child(2)').html());
                        if (sn < count) {
                            count = sn;
                        }
                    });
                    $object.children('tr').each(function () {
                        $(this).children('td:nth-child(2)').html(count);
                        count++;
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.agent.sort.order') }}",
                        data: {agents: agents},
                        success: function (response) {
                            swal("Thank You!", response.message, "success")
                        },
                        error: function (error) {
                            swal("OOPS!", error.message, "error")
                        }
                    });
                }
            });

            $('#data-table').on('click','.delete-record',function(e){
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('/admin/agent/') }}"+"/"+ id,
                        dataType: 'json',
                        success: function(response){
                            oTable.row($($object).parents('tr')).remove().draw();
                            swal('Success',response.message, 'success');
                        },
                        error: function(e){
                            swal('Oops...','Something went wrong!','error');
                        }
                    });
                });
            });
        });
    </script>
@endsection

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Agents
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Agents</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <a href="{!! route('admin.agent.create') !!}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.admin.alert')
                    </div>
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Designation</th>
                                <th>Location</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($agents as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td><i class="fa fa-arrows"></i></td>
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="full_name">{!! $record->first_name .' '. $record->last_name !!}</td>
                                    <td class="email_address">{!! $record->email_address !!}</td>
                                    <td class="designation">{!! $record->designation ? $record->designation->designation : '' !!}</td>
                                    <td class="location">{!! $record->location ? $record->location->location_name : '' !!}</td>
                                    <td class="options">
                                        <a href="{!! route('admin.agent.edit', $record->id) !!}" class="edit-record" id="{!! $record->id !!}" title="Edit Agent"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                        <a href="javascript:void(0)" class="delete-record" id="{!! $record->id !!}" title="Delete Record"><i class="fa  fa-trash-o"></i>Delete</a>
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

@stop