<!--START OF MAIN FOOTER-->
{{-- <footer>
    <div class="main-footer">
        <div class="row">
            <div class="container">
                <div class="col-md-4 col-sm-6 footer-item">
                    <div class="footer-item-content">
                        <a href="#" class="footer-logo">
                            <img class="img-responsive" src="{!! asset('images/footer-logo.png') !!}" />
                        </a>
                        <p style="text-align: justify;">Multi Dynamic is a team of professional and dedicated real
                            estate agents. Who are dedicated to serve the community with their hard working & honest
                            work ethic, prioritising the best results for their valued clients regarding any real estate
                            sales and property management matter.</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name *</label>
                        {!! Form::text('lname', null, array('class' => 'form-control', 'placeholder' => 'Last name' ))
                        !!}

                    </div>
                    <!--START OF FOOTER MENU-->
                    <div class="col-md-4 col-sm-6 footer-item">
                        <div class="footer-item-content-findout">
                            <h2 class="title">SYDNEY OFFICE</h2>
                            <ul class="contact-info">
                                <li class="clearfix">
                                    <i class="fa fa-map-marker fa-lg"></i>
                                    <label>Shop 2, 16 Ingleburn Rd, Ingleburn NSW 2565, Australia</label>
                                </li>
                                <li class="clearfix">
                                    <i class="fa fa-clock-o fa-lg"></i>
                                    <label>09:00- 17:00 (Mon -Sat)</label>
                                </li>
                                <li class="clearfix">
                                    <i class="fa fa-phone fa-lg"></i>
                                    <label><a href="tel: 02 9618 6209">(02) 9618 6209</a></label>
                                </li>
                                <li class="clearfix">
                                    <i class="fa fa-envelope-o fa-lg"></i>
                                    <label>
                                        <a href="mailto:sales@multidynamic.com.au">sales@multidynamic.com.au</a>
                                    </label>
                                </li>

                            </ul>

                            <div class="form-group col-md-6">
                                <label>Phone Number *</label>
                                {!! Form::text('contact', null, array('class' => 'form-control', 'placeholder' =>
                                '04XXXXXXX' )) !!}

                                @if($errors->has('contact'))
                                <small class="validation-error-message">{{ $errors->get('contact')[0] }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email Address *</label>
                                {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' =>
                                'username@example.com' )) !!}

                            </div>

                            <!--START OF NEWSLETTER-->
                            <div class="col-md-4 col-sm-6 footer-item">
                                <div class="footer-item-content">
                                    <h2 class="title">NEWSLETTER</h2>
                                    <div class="f-text">
                                        Subscribe to our mailing list to get the updates in your email inbox.
                                    </div>

                                    <p><input class="nsu-field btn-block" id="subscriber_email_address" type="email"
                                            name="email" placeholder="Enter your Email Address" required="">
                                    </p>
                                    <p><button type="submit" class="button-sm button-theme btn-block"
                                            id="btn_subscribe">Submit</button></p>
                                    <p id="subscriberNotice"></p>

                                    @if($errors->has('address'))
                                    <small class="validation-error-message">{{ $errors->get('address')[0] }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Suburb *</label>
                                    {!! Form::text('suburb', null, array('class' => 'form-control', 'placeholder' =>
                                    'Ex. Mawson' )) !!}

                                    @if($errors->has('suburb'))
                                    <small class="validation-error-message">{{ $errors->get('suburb')[0] }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Postcode *</label>
                                    {!! Form::text('postcode', null, array('class' => 'form-control', 'placeholder' =>
                                    'Ex. 2607' )) !!}

                                    @if($errors->has('postcode'))
                                    <small class="validation-error-message">{{ $errors->get('postcode')[0] }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Bed:</label>
                                    {!! Form::selectRange('bed', 0, 5, null, array('class' => 'form-control',
                                    'placeholder' => 'Select' )) !!}

                                    @if($errors->has('bed'))
                                    <small class="validation-error-message">{{ $errors->get('bed')[0] }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Bath:</label>
                                    {!! Form::selectRange('bath', 0, 5, null, array('class' => 'form-control',
                                    'placeholder' => 'Select' )) !!}

                                    @if($errors->has('bath'))
                                    <small class="validation-error-message">{{ $errors->get('bath')[0] }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Car Space:</label>
                                    {!! Form::selectRange('car', 0, 5, null, array('class' => 'form-control',
                                    'placeholder' => 'Select' )) !!}

                                    @if($errors->has('car'))
                                    <small class="validation-error-message">{{ $errors->get('car')[0] }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Additional Message:</label>
                                    {!! Form::textarea('messages',null,['class'=>'form-control', 'rows' => 10, 'cols' =>
                                    40]) !!}

                                    @if($errors->has('messages'))
                                    <small class="validation-error-message">{{ $errors->get('messages')[0] }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}

                                    @if($errors->has('g-recaptcha-response'))
                                    <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0]
                                        }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary">Request an Appraisal</button>
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
                                    <a href="#" class="foot-block" data-toggle="modal"
                                        data-target=".bs-example-modal-lg">Book
                                        An Appraisal</a>

                                    <span class="sp-block"></span>
                                </div>
                                <div class="col-md-3 book-apprisal">
                                    <a href="/contact-us" class="foot-block">Contact us</a>
                                    <span class="sp-block"></span>
                                </div>
                                <div class="col-md-2">
                                    <a href="https://www.facebook.com/multidynamic"><i style="color: white;"
                                            class="fa fa-facebook book-apprisal"></i></a>
                                    <a href="https://www.instagram.com/multidynamic/"><i style="color: white;"
                                            class="fa fa-instagram book-apprisal"></i></a>
                                    <a href="https://www.linkedin.com/"><i style="color: white;"
                                            class="fa fa-linkedin book-apprisal"></i></a>
                                    <a href="#"><i style="color: white;" class="fa fa-youtube book-apprisal"></i></a>
                                </div>
                            </div>
                            <div class="row col-md-8">
                                <hr style="width:100%;text-align:left;margin-left:0">
                            </div>
                            <div id="footer-second" class="row col-md-8">
                                <div class="col-md-4">
                                    <h3 class="title newsletter-h2">Multi Dynamic Ingleburn</h3>
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body">
                                            <a href="https://shorturl.at/cRV08" target="_blank">Shop 2, 16 Ingleburn Rd,
                                                Ingleburn NSW 2565</a>
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
                                            <span><a
                                                    href="mailto:sales@multidynamic.com.au">sales@multidynamic.com.au</a></span>
                                        </div>
                                    </div>
                                    <span class="sp-block"></span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <p><strong>Buy</strong></p>
                                    <a id="item" href="/buy/residential">Residential</a><br />
                                    <a id="item" href="/buy/land">Land</a><br />
                                    <a id="item" href="/buy/commercial">Commercial</a>
                                    <br />
                                    <a id="item" href="/buy/rural">Rural</a>
                                    <br />
                                    <a id="item" href="/buy/house-land">House
                                        & Land</a> <br />
                                    <span class="sp-block"></span>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>Rent</strong></p>
                                    <a id="item" href="/rent/rental">Rental</a><br />
                                    <a id="item" href="rent/holiday-rental">Holiday
                                        Rental</a><br />
                                    <span class="sp-block"></span>
                                    <p><strong>Sell</strong></p>
                                    <a id="item" href="/get-recently-sold-properties">Recent Sales</a>
                                    <span class="sp-block"></span>
                                </div>
                                <div class="col-md-3">
                                    <h3 class="title newsletter-h2">NEWSLETTER</h3>
                                    <div class="f-text">
                                        Subscribe to our mailing list to get the updates in your email inbox.
                                    </div>
                                    <p><input class="nsu-field btn-block" id="subscriber_email_address" type="email"
                                            name="email" placeholder="Enter your Email Address" required="">
                                    </p>
                                    <p><button type="submit" class="button-sm button-theme btn-block"
                                            id="btn_subscribe">Submit</button></p>
                                    <p id="subscriberNotice"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
<footer>

    <style>
        #appraisal {
            align-items: center;
            justify-content: space-around;
            display: flex;
            color: black;
        }

        .modal {
            color: black;
        }

    </style>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-" role="document">
            <div id="modalLoader" class="loader">
                <i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <img class="ap-img" src="http://multidynamicingleburn.com.au/images/logo.png" />
                </div>
                <div class="modal-body">
                    @if(Session::has('success'))
                    <script>
                        // alert("Your form has been successfully submitted!");
                    </script>
                    @elseif (count($errors) > 0)
                    <script>
                        alert("There was an error in your details. Please re-submit your form.");
                    </script>
                    @endif

                    <div id="appraisal">

                        <div class="col-md-12">
                            <form method="POST" accept-charset="UTF-8" id="appraisalForm">
                                {{-- <input name="_token" type="hidden"
                                    value="DARKESCVe20XUhjpdF4l6jbABMyR7wSn00K0T4Hw"> --}}
                                {{ csrf_field() }}

                                <div class="form-group col-md-6">
                                    <label>First Name *</label>
                                    <input class="form-control" placeholder="First name" name="fname" type="text">
                                    {{-- @if($errors->has('fname'))
                                    <span class="error">{{ $errors->first('fname') }}</span>
                                    @endif --}}
                                    <span class='text-danger error fname'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name *</label>
                                    <input class="form-control" placeholder="Last name" name="lname" type="text">
                                    {{-- @if($errors->has('lname'))
                                    <span class="error">{{ $errors->first('lname') }}</span>
                                    @endif --}}
                                    <span class='text-danger error lname'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone Number *</label>
                                    <input class="form-control" placeholder="04XXXXXXX" name="contact" type="text">
                                    {{-- @if($errors->has('contact'))
                                    <span class="error">{{ $errors->first('contact') }}</span>
                                    @endif --}}
                                    <span class='text-danger error contact'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email Address *</label>
                                    <input class="form-control" placeholder="username@example.com" name="email"
                                        type="text">
                                    {{-- @if($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                    @endif --}}
                                    <span class='text-danger error email'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-12">
                                    <label>Street Address *</label>
                                    <input class="form-control" placeholder="123 Example Street" name="address"
                                        type="text">
                                    <span class='text-danger error address'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Suburb *</label>
                                    <input class="form-control" placeholder="Ex. Mawson" name="suburb" type="text">
                                    {{-- @if($errors->has('suburb'))
                                    <span class="error">{{ $errors->first('suburb') }}</span>
                                    @endif --}}
                                    <span class='text-danger error suburb'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Postcode *</label>
                                    <input class="form-control" placeholder="Ex. 2607" name="postcode" type="text">
                                    {{-- @if($errors->has('postcode'))
                                    <span class="error">{{ $errors->first('postcode') }}</span>
                                    @endif --}}
                                    <span class='text-danger error postcode'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-4">
                                    <label>Bed:</label>
                                    <select class="form-control" name="bed">
                                        <option selected="selected" value="">Select</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class='text-danger error bed'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-4">
                                    <label>Bath:</label>
                                    <select class="form-control" name="bath">
                                        <option selected="selected" value="">Select</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class='text-danger error bath'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-4">
                                    <label>Car Space:</label>
                                    <select class="form-control" name="car">
                                        <option selected="selected" value="">Select</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class='text-danger error car'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-12">
                                    <label>Additional Message:</label>
                                    <textarea class="form-control" rows="10" cols="40" name="messages"></textarea>
                                    <span class='text-danger error messages'
                                        style='display:none;font-size:11px;color:red;'></span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Honeypot::generate('my_name', 'my_time') !!}
                                        {{-- @if($errors->has('my_name'))
                                        <span class="error">{{ $errors->first('my_name') }}</span>
                                        @endif --}}
                                        <span class='text-danger error my_time'
                                            style='display:none;font-size:11px;color:red;'></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}

                                    {{-- @if($errors->has('g-recaptcha-response'))
                                    <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0]
                                        }}</small>
                                    @endif --}}
                                    <span class='text-danger error g-recaptcha-response'
                                        style='display:none;font-size:11px;color:red;'></span>

                                </div>

                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary sendBookAppraisal">Request an Appraisal</button>
                                </div>

                            </form>
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
                                <img class="footer-logo"
                                    src="http://multidynamicingleburn.com.au/images/footer-logo.png">
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-3 book-apprisal">
                                <a href="#" class="foot-block" data-toggle="modal"
                                    data-target=".bs-example-modal-lg">Book An Appraisal</a>

                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-3 book-apprisal">
                                <a href="/contact-us" class="foot-block">Contact us</a>
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <a href="https://www.facebook.com/multidynamicingleburn"><i style="color: white;"
                                        class="fa fa-facebook book-apprisal"></i></a>
                                <a href="https://www.instagram.com/multidynamic.ingleburn/"><i style="color: white;"
                                        class="fa fa-instagram book-apprisal"></i></a>
                                {{-- <a href="https://www.linkedin.com/"><i style="color: white;" --}} {{--
                                        class="fa fa-linkedin book-apprisal"></i></a>--}}
                                <a href="https://www.youtube.com/channel/UCFmKJ8KqZ0ZVNfQ0MXoVQ9A"><i
                                        style="color: white;" class="fa fa-youtube book-apprisal"></i></a>
                            </div>
                        </div>
                        <div class="row col-md-8 ft-divider">
                            <hr style="width:100%;text-align:left;margin-left:0">
                        </div>
                        <div id="footer-second" class="row col-md-8">
                            <div class="col-md-4">
                                <h3 class="title newsletter-h2">Multi Dynamic Ingleburn</h3>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="https://www.google.com/maps/place/shop+2%2F16+Ingleburn+Rd,+Ingleburn+NSW+2565/@-33.998541,150.864215,967m/data=!3m1!1e3!4m5!3m4!1s0x6b12eb7c35efffff:0x42923019afa6e69!8m2!3d-33.9986742!4d150.8641614?hl=en"
                                            target="_blank">Shop 2, 16 Ingleburn Rd,
                                            Ingleburn NSW 2565</a>
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
                                        <span><a
                                                href="mailto:sales@multidynamic.com.au">sales@multidynamic.com.au</a></span>
                                    </div>
                                </div>
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <p><strong>Buy</strong></p>
                                <a id="item" href="/buy/residential">Residential</a><br />
                                <a id="item" href="/buy/land">Land</a><br />
                                <a id="item" href="/buy/commercial">Commercial</a>
                                <br />
                                <a id="item" href="/buy/rural">Rural</a>
                                <br />
                                <a id="item" href="/buy/house-land">House
                                    & Land</a> <br />
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <p><strong>Rent</strong></p>
                                <a id="item" href="/rent/rental">Rental</a><br />
                                <a id="item" href="rent/holiday-rental">Holiday
                                    Rental</a><br />
                                <span class="sp-block"></span>
                                <p></p>
                                <p><strong>Sell</strong></p>
                                <a id="item" href="/get-recently-sold-properties">Recent Sales</a>
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <p><strong>Suburbs</strong></p>
                                <a id="item" href="/real-estate-agent-casula">Casula</a><br />
                                <a id="item" href="/real-estate-agent-liverpool">Liverpool</a><br />
                                <a id="item" href="/real-estate-agent-austral">Austral</a><br />
                                <a id="item" href="/real-estate-agent-bardia">Bardia</a><br />
                                <a id="item" href="/real-estate-agent-leppington">Leppington</a><br />
                                <span class="sp-block"></span>
                            </div>
                            <div class="col-md-2">
                                <p style="color: #f36421"><strong>Suburbs</strong></p>
                                <a id="item" href="/real-estate-agent-hoxton-park">Hoxton-Park</a><br />
                                <a id="item" href="/real-estate-agent-minto">Minto</a><br />
                                <a id="item" href="/real-estate-agent-glenfield">Glenfield</a><br />
                                <a id="item" href="/real-estate-agent-edmondson-park">Edmondson Park</a><br />
                                <a id="item" href="/real-estate-agent-green-valley">Green-Valley</a><br />
                                <span class="sp-block"></span>
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

<!-- modals  -->
<!-- selling modal  -->
<div class="modal modal__download fade" id="sellingModal" tabindex="-1" role="dialog"
    aria-labelledby="sellingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="sellingGuideForm" method="POST" action="{{ route('sellingdownloadguide') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="sellingModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" id="" placeholder="Enter your name" class="form-control">
                                {{-- @if($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                                @endif --}}
                                <span class='text-danger error name'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" id="" placeholder="Enter your email"
                                    class="form-control">
                                {{-- @if($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif --}}
                                <span class='text-danger error email'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="phone" id="" placeholder="Enter your phone"
                                    class="form-control">
                                {{-- @if($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                                @endif --}}
                                <span class='text-danger error phone'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="postal_code" id="" placeholder="Enter your postal code"
                                    class="form-control">
                                {{-- @if($errors->has('postal_code'))
                                <span class="error">{{ $errors->first('postal_code') }}</span>
                                @endif --}}
                                <span class='text-danger error postal_code'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="property_address" id=""
                                    placeholder="Enter your property address" class="form-control">
                                @if($errors->has('property_address'))
                                <span class="error">{{ $errors->first('property_address') }}</span>
                                @endif
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Honeypot::generate('my_name', 'my_time') !!}
                                {{-- @if($errors->has('my_name'))
                                <span class="error">{{ $errors->first('my_name') }}</span>
                                @endif --}}
                                <span class='text-danger error my_time'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            {{-- @if($errors->has('g-recaptcha-response'))
                            <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0]
                                }}</small>
                            @endif --}}
                            <span class='text-danger error g-recaptcha-response'
                                style='display:none;font-size:11px;color:red;'></span>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning sendSellingGuide">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- buying modal  -->
<div class="modal modal__download fade" id="buyingModal" tabindex="-1" role="dialog" aria-labelledby="buyingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="buyingGuideForm" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="buyingModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" id="" placeholder="Enter your name" class="form-control">
                                {{-- @if($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                                @endif --}}
                                <span class='text-danger error name'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" id="" placeholder="Enter your email"
                                    class="form-control">
                                {{-- @if($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif --}}
                                <span class='text-danger error email'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="phone" id="" placeholder="Enter your phone"
                                    class="form-control">
                                {{-- @if($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                                @endif --}}
                                <span class='text-danger error phone'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="postal_code" id="" placeholder="Enter your postal code"
                                    class="form-control">
                                {{-- @if($errors->has('postal_code'))
                                <span class="error">{{ $errors->first('postal_code') }}</span>
                                @endif --}}
                                <span class='text-danger error postal_code'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="property_address" id=""
                                    placeholder="Enter your property address" class="form-control">
                                @if($errors->has('property_address'))
                                <span class="error">{{ $errors->first('property_address') }}</span>
                                @endif
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Honeypot::generate('my_name', 'my_time') !!}
                                {{-- @if($errors->has('my_name'))
                                <span class="error">{{ $errors->first('my_name') }}</span>
                                @endif --}}
                                <span class='text-danger error my_time'
                                    style='display:none;font-size:11px;color:red;'></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            {{-- @if($errors->has('g-recaptcha-response'))
                            <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0]
                                }}</small>
                            @endif --}}
                            <span class='text-danger error g-recaptcha-response'
                                style='display:none;font-size:11px;color:red;'></span>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-warning sendBuyingGuide">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
            <div class="copyright">Copyright © {!! date('Y') !!} <a href="http://www.multidynamic.com.au">{!!
                    env('APP_NAME') !!}</a> All rights reserved. &nbsp;
                &nbsp; <a href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy </a>
                <div class="copyright">

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <ul class="btm-sm-icon">
                <li><a href="https://www.facebook.com/multidynamicingleburn" target="_blank" class="sm-icon"><i
                            class="fa fa-facebook "></i></a></li>
                <li><a href="https://www.instagram.com/multidynamic.ingleburn/" target="_blank" class="sm-icon"><i
                            class="fa fa-instagram instagram"></i></a></li>
                <li class="linkedin-link social-link-icon"><a
                        href="https://www.youtube.com/channel/UCFmKJ8KqZ0ZVNfQ0MXoVQ9A"><i class="fa fa-youtube"
                            aria-hidden="true"></i></a></li>
            </ul>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="copyright">
                <!--  <a href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy</a>&nbsp; -->
                ABN:77 629 002 366 &nbsp; &nbsp;
                <a href="{!! route('page.show', 'terms-and-conditions') !!}">Terms & Conditions</a>
            </div>
            <div class="design-develop">Design and developed by <a href="http://www.111it.com.au" target="_blank">111IT
                </a></div>
        </div>
    </div>
