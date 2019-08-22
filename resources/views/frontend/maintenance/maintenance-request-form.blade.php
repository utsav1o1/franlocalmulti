@extends('layouts.app')

@section('title', 'Project Locations')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('header_css')

	<link rel="stylesheet" href="{!! asset('backend/plugins/select2/select2.min.css') !!}">

@stop

@section('dynamicdata')

    <div class="enquiry-form-container container">
    	<div class="row">
    		<div class="col-md-12">
    			<h1 class="form-title">Maintenance Request</h1>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-md-12">
    			<div class="maintenance-request-container">
    				{!! Form::open(['url' => route('maintenance-reqest.form'), 'id' => 'maintenance-request-form']) !!}

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

    <script category="text/javascript">
        $(document).ready(function () {

        });
    </script>

@stop