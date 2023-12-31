@extends('layouts.app')

@section('title', 'Project Locations')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('header_css')

<link rel="stylesheet" href="{!! asset('backend/plugins/select2/select2.min.css') !!}">

@stop

@section('dynamicdata')

<div class="container enquiry-form-container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="form-title">CONTACT US</h1>
			<p class="text-center font-weight-bold">
				Isn’t it time you experienced the Multi Dynamic Auburn difference? <br>
				Here’s how you can get in contact with our team of real estate agents, based throughout Australia.
				<hr>
			</p>
		</div>
	</div>

	@if(Session::has('success'))

	<div class="row">
		<div class="col-md-6">
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				{{ Session::get('success') }}
			</div>
		</div>
	</div>

	@endif

	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="address-and-location-container">
				<div class="address-container">
					<ul>
						<li class="clearfix">
							<i class="fa fa-map-marker fa-lg"></i>
							<label>Shop 26/22, 20 Northumberland Rd, Auburn NSW 2144</label>
						</li>
						<li class="clearfix">
							<i class="fa fa-clock-o fa-lg"></i>
							<label>09:00- 17:00 (Mon -Sat)</label>
						</li>
						<li class="clearfix">
							<i class="fa fa-phone fa-lg"></i>
							<label><a href="tel: 1300 201 330">1300 201 330</a></label>
						</li>
						<li class="clearfix">
							<i class="fa fa-envelope-o fa-lg"></i>
							<label>
								<a href="mailto: auburn@multidynamic.com.au">auburn@multidynamic.com.au</a>
							</label>
						</li>
					</ul>
				</div>
				<div class="location-container">
					<div class="google_map">
						<iframe width="100%" height="500" id="gmap_canvas"
							src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3313.581374688448!2d151.031725!3d-33.848905!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a34ddbea1001%3A0x309657ae29900cc4!2sAuburn%20Central!5e0!3m2!1sen!2snp!4v1693647827785!5m2!1sen!2snp"></iframe>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-sm-12 col-xs-12">
			{!! Form::open(['url' => route('enquiry.send'), 'id' => 'enquiry-form']) !!}

			<div class="form-group col-md-12">
				<label>Name *</label>
				{!! Form::text('name', null, ['class' => 'form-control']) !!}

				@if($errors->has('name'))
				<small class="validation-error-message">{{ $errors->get('name')[0] }}</small>
				@endif
			</div>

			<!-- <div class="form-group col-md-12">
				<label>Address *</label>
				{!! Form::text('address', null, ['class' => 'form-control']) !!}

				@if($errors->has('address'))
				<small class="validation-error-message">{{ $errors->get('address')[0] }}</small>
				@endif
			</div> -->

			<div class="form-group col-md-12">
				<label>Email *</label>
				{!! Form::text('email', null, ['class' => 'form-control']) !!}

				@if($errors->has('email'))
				<small class="validation-error-message">{{ $errors->get('email')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>Contact *</label>
				{!! Form::text('contact', null, ['class' => 'form-control']) !!}

				@if($errors->has('contact'))
				<small class="validation-error-message">{{ $errors->get('contact')[0] }}</small>
				@endif
			</div>
			
			<div class="form-group col-md-12">
				<label>Post Code *</label>
				{!! Form::text('postcode', null, ['class' => 'form-control']) !!}

				@if($errors->has('postcode'))
				<small class="validation-error-message">{{ $errors->get('postcode')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>Purpose *</label>
				{!! Form::select('purpose', ['buying'=>'Buying','selling'=>'Selling','rent'=>'Rent'], null, ['class' => 'form-control', 'placeholder' => 'Choose purpose']) !!}

				@if($errors->has('purpose'))
				<small class="validation-error-message">{{ $errors->get('purpose')[0] }}</small>
				@endif
			</div>

			<!-- <div class="form-group col-md-12">
				<label>1. How did you hear about Multi Dynamic? *</label>
				<div class="checkbox">
					<label>
						{!! Form::checkbox('reference_source[]', 'facebook') !!} Facebook
					</label>
				</div>

				<div class="checkbox">
					<label>
						{!! Form::checkbox('reference_source[]', 'newspaper') !!} Newspaper
					</label>
				</div>

				<div class="checkbox">
					<label>
						{!! Form::checkbox('reference_source[]', 'event') !!} Event
					</label>
				</div>

				<div class="checkbox">
					<label>
						{!! Form::checkbox('reference_source[]', 'website') !!} Website
					</label>
				</div>
				<div class="checkbox">
					<label>
						{!! Form::checkbox('reference_source[]', 'real-estate-dot-com') !!} Real Estate.com
					</label>
				</div>

				<div class="checkbox">
					<label>
						{!! Form::checkbox('reference_source[]', 'friends') !!} Friends
					</label>
				</div>

				<div class="checkbox">
					<label>
						{!! Form::checkbox('reference_source[]', 'others') !!} Others
					</label>
				</div>

				@if($errors->has('reference_source'))
				<small class="validation-error-message">{{ $errors->get('reference_source')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>2. Where would you prefer to buy? *</label>
				{!! Form::select('location', [], null, ['class' => 'form-control', 'select2-link' =>
				route('enquiry.location-list'), 'placeholder' => 'Choose Location']) !!}

				@if($errors->has('location'))
				<small class="validation-error-message">{{ $errors->get('location')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>3. Do you have your finance ready? *</label>
				{!! Form::text('finance_ready', null, ['class' => 'form-control']) !!}

				@if($errors->has('finance_ready'))
				<small class="validation-error-message">{{ $errors->get('finance_ready')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>4. What is your budget? *</label>
				{!! Form::text('budget', null, ['class' => 'form-control']) !!}

				@if($errors->has('budget'))
				<small class="validation-error-message">{{ $errors->get('budget')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>5. How long have you been looking for property?</label>
				{!! Form::text('length_looking_for_property', null, ['class' => 'form-control']) !!}

				@if($errors->has('length_looking_for_property'))
				<small class="validation-error-message">{{ $errors->get('length_looking_for_property')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>6. Within what period of time are you planning to buy the property?</label>
				{!! Form::text('period_of_time_to_buy_property', null, ['class' => 'form-control']) !!}

				@if($errors->has('period_of_time_to_buy_property'))
				<small class="validation-error-message">{{ $errors->get('period_of_time_to_buy_property')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<label>7. Are you first home buyer or investor? *</label>
				<div class="radio">
					<label>
						{!! Form::radio('first_home_buyer_investor', 'home-buyer', null) !!} Home Buyer
					</label>
				</div>

				<div class="radio">
					<label>
						{!! Form::radio('first_home_buyer_investor', 'investor', null) !!} Investor
					</label>
				</div>

				<div class="radio">
					<label>
						{!! Form::radio('first_home_buyer_investor', 'others', null) !!} Others
					</label>
				</div>

				@if($errors->has('first_home_buyer_investor'))
				<small class="validation-error-message">{{ $errors->get('first_home_buyer_investor')[0] }}</small>
				@endif
			</div> -->

			<div class="form-group col-md-12">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('agree_terms_conditions', 'Y') !!} I agree to the terms and conditions.
					</label>
				</div>

				@if($errors->has('agree_terms_conditions'))
				<small class="validation-error-message">{{ $errors->get('agree_terms_conditions')[0] }}</small>
				@endif
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					{!! Honeypot::generate('my_name', 'my_time') !!}
					@if($errors->has('my_name'))
					<span class="error">{{ $errors->first('my_name') }}</span>
					@endif
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
				{!! NoCaptcha::renderJs() !!}
				{!! NoCaptcha::display() !!}

				@if($errors->has('g-recaptcha-response'))
				<small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0] }}</small>
				@endif
			</div>

			<div class="form-group col-md-12">
				<button id='submit' class="btn btn-primary">Submit</button>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>

@stop

@section('footer_js')

<script src="{!! asset('backend/plugins/select2/select2.full.min.js') !!}"></script>

<script src="{{ asset('backend/custom/js/custom-plugin.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAP_KEY') !!}&secure=false"
	type="text/javascript"></script>

<script category="text/javascript">
	$(document).ready(function () {
			$('#submit').click(function() {
				$('#loading').show();
			});

            var locationSelectInput = $("[name='location']");

            locationSelectInput.iniRemoteSelect2({
                url: locationSelectInput.attr('select2-link')
            });

	        var latitude = '-33.998694';
	        var longitude = '150.864174';
	        var zoomValue = 15;
	        var name = 'Multidynamic Sydney';
	        var address = 'Shop 26/22, 20 Northumberland Rd, Auburn NSW 2144';

	        function init_map() {
	            var myOptions = {
	                zoom: zoomValue,
	                center: new google.maps.LatLng(latitude, longitude),
	                mapTypeId: google.maps.MapTypeId.ROADMAP
	            };
	            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
	            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(latitude, longitude)});
	            infowindow = new google.maps.InfoWindow({content: "<b>" + name + " </b><br/>" + address});
	            google.maps.event.addListener(marker, "click", function () {
	                infowindow.open(map, marker);
	            });
	            infowindow.open(map, marker);
	        }

	        init_map();


        });
</script>

@stop