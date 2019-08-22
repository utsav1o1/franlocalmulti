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
    			<h1 class="form-title">Vacate Notice</h1>
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
    			<div class="vacate-notice-container">
    				{!! Form::open(['url' => route('vacate-notice.send'), 'id' => 'vacate-notice-form']) !!}

	    				<div class="form-group col-md-6">
	    					<label>Tenant's Name(s)</label>
	    					{!! Form::text('tenant_name', null, ['class' => 'form-control']) !!}

						    @if($errors->has('tenant_name'))
						        <small class="validation-error-message">{{ $errors->get('tenant_name')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-7">
	    					<label>Tenant's/Property Address</label>
	    					{!! Form::text('tenant_address', null, ['class' => 'form-control']) !!}

						    @if($errors->has('tenant_address'))
						        <small class="validation-error-message">{{ $errors->get('tenant_address')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-4">
	    					<label>Contact Number</label>
	    					{!! Form::text('contact_number', null, ['class' => 'form-control']) !!}

						    @if($errors->has('contact_number'))
						        <small class="validation-error-message">{{ $errors->get('contact_number')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-7">
	    					<label>Email Address</label>
	    					{!! Form::text('email_address', null, ['class' => 'form-control']) !!}

						    @if($errors->has('email_address'))
						        <small class="validation-error-message">{{ $errors->get('email_address')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-4">
	    					<label>Vacating Date</label>
	    					{!! Form::text('vacating_date', null, ['class' => 'form-control']) !!}

						    @if($errors->has('vacating_date'))
						        <small class="validation-error-message">{{ $errors->get('vacating_date')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-4">
	    					<label>Future Address</label>
	    					{!! Form::text('future_address', null, ['class' => 'form-control']) !!}

						    @if($errors->has('future_address'))
						        <small class="validation-error-message">{{ $errors->get('future_address')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-7">
	    					<label>Reason For Vacate</label>
	    					{!! Form::textarea('reason_for_notice', null, ['class' => 'form-control']) !!}

						    @if($errors->has('reason_for_notice'))
						        <small class="validation-error-message">{{ $errors->get('reason_for_notice')[0] }}</small>
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

        	$("#vacate-notice-form input[name='vacating_date']").datepicker({
        		autoclose: true,
        		format: 'yyyy-mm-dd'
        	});

        });
    </script>

@stop