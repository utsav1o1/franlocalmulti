@extends('layouts.app')

@section('title', 'Project Locations')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('header_css')

	<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">

@stop

@section('dynamicdata')

    <div class="sell-form-container container">
    	<div class="row">
    		<div class="col-md-12">
    			<h1 class="form-title">Property Estimation</h1>
    		</div>
    		<div class="col-md-12 form-details">
    			Need to know how much your property can be sold for?<br/>
    			Give us your contact and property details and we will contact you for a comprehensive property estimation.
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
    				{!! Form::open(['url' => route('property-estimation.send'), 'id' => 'sell-contact-form']) !!}

    					<div class="col-md-12">
    						<h2 class="form-sub-title">Your Contact Details</h2>
    					</div>

	    				<div class="form-group col-md-6">
	    					<label>Full Name</label>
	    					{!! Form::text('full_name', null, ['class' => 'form-control']) !!}

						    @if($errors->has('full_name'))
						        <small class="validation-error-message">{{ $errors->get('full_name')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-6">
	    					<label>Email</label>
	    					{!! Form::text('email', null, ['class' => 'form-control']) !!}

						    @if($errors->has('email'))
						        <small class="validation-error-message">{{ $errors->get('email')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-5">
	    					<label>Phone Number</label>
	    					{!! Form::text('phone_number', null, ['class' => 'form-control']) !!}

						    @if($errors->has('phone_number'))
						        <small class="validation-error-message">{{ $errors->get('phone_number')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-7">
	    					<label>Additional Message</label>
	    					{!! Form::textarea('additional_message', null, ['class' => 'form-control']) !!}

						    @if($errors->has('additional_message'))
						        <small class="validation-error-message">{{ $errors->get('additional_message')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

    					<div class="col-md-12">
    						<h2 class="form-sub-title">Property Details</h2>
    					</div>
    					
	    				<div class="form-group col-md-4">
	    					<label>Street Address</label>
	    					{!! Form::text('street_address', null, ['class' => 'form-control']) !!}

						    @if($errors->has('street_address'))
						        <small class="validation-error-message">{{ $errors->get('street_address')[0] }}</small>
						    @endif
	    				</div>

    					<div class="clearfix"></div>

	    				<div class="form-group col-md-4">
	    					<label>Suburb and Postcode</label>
	    					{!! Form::text('suburb_postcode', null, ['class' => 'form-control']) !!}

						    @if($errors->has('suburb_postcode'))
						        <small class="validation-error-message">{{ $errors->get('suburb_postcode')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-4">
	    					<label>Bedrooms</label>
	    					{!! Form::select('bedrooms', ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4+'], null, ['class' => 'form-control']) !!}

						    @if($errors->has('bedrooms'))
						        <small class="validation-error-message">{{ $errors->get('bedrooms')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>


	    				<div class="form-group col-md-4">
	    					<label>Bathrooms</label>
	    					{!! Form::select('bathrooms', ['0' => '0', '1' => '1', '1.5' => '1.5', '2' => '2', '2.5' => '2.5', '3' => '3+'], null, ['class' => 'form-control']) !!}

						    @if($errors->has('bathrooms'))
						        <small class="validation-error-message">{{ $errors->get('bathrooms')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

	    				<div class="form-group col-md-4">
	    					<label>Garages</label>
	    					{!! Form::select('garages', ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4+'], null, ['class' => 'form-control']) !!}

						    @if($errors->has('garages'))
						        <small class="validation-error-message">{{ $errors->get('garages')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>
	    				
	    				<div class="form-group col-md-5">
	    					<label>Additional Details</label>
	    					{!! Form::textarea('additional_details', null, ['class' => 'form-control']) !!}

						    @if($errors->has('additional_details'))
						        <small class="validation-error-message">{{ $errors->get('additional_details')[0] }}</small>
						    @endif
	    				</div>

	    				<div class="clearfix"></div>

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