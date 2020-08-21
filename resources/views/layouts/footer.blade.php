<!--START OF MAIN FOOTER-->
<footer>
<style>
        #appraisal{
            align-items: center;
            justify-content: space-around;
            display: flex;
			color: black;
        }
		.modal{
			color: black;
		}
    </style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
    	
    	@if(Session::has('success'))

			<!--<div id="appraisal" class="row">
				<div class="col-md-8">
		    		<div class="alert alert-success" role="alert">
		    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    			{{ Session::get('success') }}
		    		</div>	
				</div>
			</div>-->
			<script>
				alert("Your form has been successfully submitted!");
			</script>
		@elseif (count($errors) > 0)
			<script>
				alert("There was an error in your details. Please re-submit your form.");
			</script>
		@endif

    	<div id="appraisal">

    		<div class="col-md-8">
    			{!! Form::open(['url' => route('appraisal.send'), 'id' => 'appraisal-form']) !!}

    				<div class="form-group col-md-6">
    					<label>First Name</label>
    					{!! Form::text('fname', null, array('class' => 'form-control', 'placeholder' => 'First name' )) !!}

					    @if($errors->has('fname'))
					        <small class="validation-error-message">{{ $errors->get('lname')[0] }}</small>
					    @endif
                    </div>
                    <div class="form-group col-md-6">
    					<label>Last Name</label>
    					{!! Form::text('lname', null, array('class' => 'form-control', 'placeholder' => 'Last name' )) !!}

					    @if($errors->has('lname'))
					        <small class="validation-error-message">{{ $errors->get('lname')[0] }}</small>
					    @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        {!! Form::text('contact', null, array('class' => 'form-control', 'placeholder' => '04XXXXXXX' )) !!}

                        @if($errors->has('contact'))
                            <small class="validation-error-message">{{ $errors->get('contact')[0] }}</small>
                        @endif
                    </div>
                    
                    <div class="form-group col-md-6">
    					<label>Email Address</label>
    					{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'username@example.com' )) !!}

					    @if($errors->has('email'))
					        <small class="validation-error-message">{{ $errors->get('email')[0] }}</small>
					    @endif
    				</div>

    				<div class="form-group col-md-12">
    					<label>Street Address</label>
    					{!! Form::text('address', null, array('class' => 'form-control', 'placeholder' => '123 Example Street' )) !!}

					    @if($errors->has('address'))
					        <small class="validation-error-message">{{ $errors->get('address')[0] }}</small>
					    @endif
                    </div>
                    
                    <div class="form-group col-md-6">
						<label>Suburb</label>
						{!! Form::text('suburb', null, array('class' => 'form-control', 'placeholder' => 'Ex. Mawson' )) !!}

					    @if($errors->has('suburb'))
					        <small class="validation-error-message">{{ $errors->get('suburb')[0] }}</small>
					    @endif
                    </div>
                    
                    <div class="form-group col-md-6">
						<label>Postcode</label>
						{!! Form::text('postcode', null, array('class' => 'form-control', 'placeholder' => 'Ex. 2607' )) !!}

					    @if($errors->has('postcode'))
					        <small class="validation-error-message">{{ $errors->get('postcode')[0] }}</small>
					    @endif
                    </div>

                    <div class="form-group col-md-4">
						<label>Bed:</label>
						{!! Form::selectRange('bed', 0, 5, null, array('class' => 'form-control', 'placeholder' => 'Select' )) !!}

					    @if($errors->has('bed'))
					        <small class="validation-error-message">{{ $errors->get('bed')[0] }}</small>
					    @endif
                    </div>

                    <div class="form-group col-md-4">
						<label>Bath:</label>
						{!! Form::selectRange('bath', 0, 5, null, array('class' => 'form-control', 'placeholder' => 'Select' )) !!}

					    @if($errors->has('bath'))
					        <small class="validation-error-message">{{ $errors->get('bath')[0] }}</small>
					    @endif
                    </div>

                    <div class="form-group col-md-4">
						<label>Car Space:</label>
						{!! Form::selectRange('car', 0, 5, null, array('class' => 'form-control', 'placeholder' => 'Select' )) !!}

					    @if($errors->has('car'))
					        <small class="validation-error-message">{{ $errors->get('car')[0] }}</small>
					    @endif
                    </div>
                    
                    <div class="form-group col-md-12">
						<label>Additional Message:</label>
						{!! Form::textarea('messages',null,['class'=>'form-control', 'rows' => 10, 'cols' => 40]) !!}

					    @if($errors->has('messages'))
					        <small class="validation-error-message">{{ $errors->get('messages')[0] }}</small>
					    @endif
					</div>
                    
                    <div class="form-group col-md-12">
                        <label class="control-label col-sm-2 col-md-2"
                               for="ReCaptcha"></label>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}

                        @if($errors->has('g-recaptcha-response'))
                            <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0] }}</small>
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
  </div>
</div>
    <div class="main-footer">
        <div class="company-location-details-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="footer-first" class="row col-md-8">
                            <div class="col-md-4 align-self-center">
                                <img class="footer-logo" src="{{ url('images/footer-logo.png') }}">
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-3 book-apprisal">
                                <a href="#" class="foot-block" data-toggle="modal" data-target=".bs-example-modal-lg">Book Appraisal</a>
                                
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-3 book-apprisal">
                                <a href="/contact-us" class="foot-block">Contact us</a>
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <a href="https://www.facebook.com/multidynamic"><i class="fa fa-facebook book-apprisal"></i></a>
                                <a href="https://www.instagram.com/multidynamic/"<i class="fa fa-instagram book-apprisal"></i></a>
                                <a href="https://www.linkedin.com/"<i class="fa fa-linkedin book-apprisal"></i></a>
                                <a href="#"<i class="fa fa-youtube book-apprisal"></i></a>
                            </div>
                        </div>
                        <div class="row col-md-8"><hr style="width:100%;text-align:left;margin-left:0"></div>
                        <div id="footer-second" class="row col-md-8">
                            <div class="col-md-4">
                                <p style="font-size: 24px"><strong>Multi Dynamic Ingleburn</strong></p>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="https://shorturl.at/cRV08" target="_blank">Shop 2, 16 Ingleburn Rd, Ingleburn NSW 2565, Australia</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="glyphicon glyphicon-time" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>09:00 - 17:00 (Mon -Sat)</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <span><a href="tel:+61296186209">(02) 9618 6209</a></span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <span><a href="mailto:sales@multidynamic.com.au">sales@multidynamic.com.au</a></span>
                                    </div>
                                </div>
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <p><strong>Buy</strong></p>
                                <a id="item"
                                   href="/buy/residential">Residential</a><br/>
                                <a id="item"
                                   href="/buy/land">Land</a><br/>
                                <a id="item"
                                   href="/buy/commercial">Commercial</a>
                                <br/>
                                <a id="item"
                                   href="/buy/rural">Rural</a>
                                <br/>
                                <a id="item"
                                   href="/buy/house-land">House
                                    & Land</a> <br/>
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <p><strong>Rent</strong></p>
                                <a id="item"
                                   href="/rent/rental">Rental</a><br/>
                                <a id="item"
                                   href="rent/holiday-rental">Holiday
                                    Rental</a><br/>
                                <span class="sp-block"></span>
                                <p><strong>Sell</strong></p>
                                <a id="item" href="/get-recently-sold-properties">Recent Sales</a>
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-4">
                                <h2 class="title newsletter-h2">NEWSLETTER</h2>
                                <div class="f-text">
                                    Subscribe to our mailing list to get the updates in your email inbox.
                                </div>
                                <p><input class="nsu-field btn-block" id="subscriber_email_address" type="email" name="email" placeholder="Enter your Email Address" required="">
                                </p>
                                <p><button type="submit" class="button-sm button-theme btn-block" id="btn_subscribe">Submit</button></p>
                                <p id="subscriberNotice"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

<script type="text/javascript">
    @yield ('scripts')
</script>

<!--BOTTOM FOOTER-->
<div class="bottom-footer">
    <div class="container">
    <!--   <div class="col-lg-12 col-md-12 col-sm-12">
<nav class="navbar btm-footer-bar">
<ul>
<li><a href="{!! route('properties.buy') !!}"">Buy</a></li>
<li><a href="{!! route('agents.index') !!}">Sell</a></li>
<li><a href="{!! route('properties.rent') !!}">Rent</a></li>
</ul>
</nav>
</div> -->

        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="copyright">Copyright © {!! date('Y') !!} <a
                        href="http://www.multidynamic.com.au">{!! env('APP_NAME') !!}</a> All rights reserved. &nbsp;
                &nbsp; <a href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy </a>
                <div class="copyright">

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <ul class="btm-sm-icon">
                <li><a href="https://www.facebook.com/multidynamic" target="_blank" class="sm-icon"><i
                                class="fa fa-facebook facebook"></i></a></li>
                <li><a href="https://www.instagram.com/multi.dynamic/" target="_blank" class="sm-icon"><i
                                class="fa fa-instagram instagram"></i></a></li>
                <li><a href="#"></i></a></li>
                <li><a href="#" target="_blank"
                       class="sm-icon"><i class="fa fa-linkedin linkedin"></i></a></li>
            </ul>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="copyright">
            <!--  <a href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy</a>&nbsp; -->
                ABN: 90 165 249 954 &nbsp; &nbsp;
                <a href="{!! route('page.show', 'terms-and-conditions') !!}">Terms & Conditions</a>
            </div>
            <div class="design-develop">Design and developed by <a href="http://www.111it.com.au" target="_blank">111IT </a></div>
        </div>
    </div>
    
