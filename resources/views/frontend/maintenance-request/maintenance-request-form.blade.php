@extends('layouts.app')

@section('title', 'Project Locations')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('header_css')

	<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">

@stop

@section('dynamicdata')

    <div class="enquiry-form-container container">
    	<div class="row">
    		<div class="col-md-12">
    			<h1 class="form-title">Maintenance Request</h1>
    		</div>
    	</div>

    	@if(Session::has('success'))

			<div class="row">
				<div class="col-md-6">
		    		<div class="alert alert-success" role="alert">
		    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    			{{ Session::get('success') }}
		    		</div>	
				</div>
			</div>

		@endif


    	<div class="row">
    		<div class="col-md-12">
    			<div class="maintenance-request-container">
    				{!! Form::open(['url' => route('maintenance-request.send'), 'id' => 'maintenance-request-form']) !!}

	    				<div class="form-group col-md-3">
	    					<label>Date</label>
	    					{!! Form::text('date', null, ['class' => 'form-control']) !!}

						    @if($errors->has('date'))
						        <small class="validation-error-message">{{ $errors->get('date')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-6">
	    					<label>Tenant's Name</label>
	    					{!! Form::text('tenant_name', null, ['class' => 'form-control']) !!}

						    @if($errors->has('tenant_name'))
						        <small class="validation-error-message">{{ $errors->get('tenant_name')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-7">
	    					<label>Address</label>
	    					{!! Form::text('tenant_address', null, ['class' => 'form-control']) !!}

						    @if($errors->has('tenant_address'))
						        <small class="validation-error-message">{{ $errors->get('tenant_address')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-7">
	    					<label>Email</label>
	    					{!! Form::text('tenant_email', null, ['class' => 'form-control']) !!}

						    @if($errors->has('tenant_email'))
						        <small class="validation-error-message">{{ $errors->get('tenant_email')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-4">
	    					<label>Phone Number</label>
	    					{!! Form::text('tenant_phone_number', null, ['class' => 'form-control']) !!}

						    @if($errors->has('tenant_phone_number'))
						        <small class="validation-error-message">{{ $errors->get('tenant_phone_number')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-6">
	    					<label>Message</label>
	    					{!! Form::textarea('message', null, ['class' => 'form-control']) !!}

						    @if($errors->has('message'))
						        <small class="validation-error-message">{{ $errors->get('message')[0] }}</small>
						    @endif
	    				</div>

						<div class="form-group col-md-12">
							<button class="btn btn-primary">Submit</button>
						</div>

    				{!! Form::close() !!}
    			</div>
    		</div>
    	</div>
    </div>

@stop

@section('footer_js')

	<script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    <script category="text/javascript">
        $(document).ready(function () {

        	$("#maintenance-request-form input[name='date']").datepicker({
        		autoclose: true,
        		format: 'yyyy-mm-dd'
        	});

        });
    </script>

@stop