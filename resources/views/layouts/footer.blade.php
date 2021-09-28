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
                                <i class="fa fa fa-clock-o fa-lg"></i>
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

                    </div>

                </div>

                <!--START OF NEWSLETTER-->
                <div class="col-md-4 col-sm-6 footer-item">
                    <div class="footer-item-content">
                        <h2 class="title">NEWSLETTER</h2>
                        <div class="f-text">
                            Subscribe to our mailing list to get the updates in your email inbox.
                        </div>

                        <p><input class="nsu-field btn-block" id="subscriber_email_address" type="email" name="email"
                                placeholder="Enter your Email Address" required="">
                        </p>
                        <p><button type="submit" class="button-sm button-theme btn-block"
                                id="btn_subscribe">Submit</button></p>
                        <p id="subscriberNotice"></p>

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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <img class="ap-img" src="http://multidynamicingleburn.com.au/images/logo.png" />
                </div>
                <div class="modal-body">


                    <div id="appraisal">

                        <div class="col-md-8">
                            <form method="POST" action="http://multidynamicingleburn.com.au/send-appraisal"
                                accept-charset="UTF-8" id="appraisal-form"><input name="_token" type="hidden"
                                    value="DARKESCVe20XUhjpdF4l6jbABMyR7wSn00K0T4Hw">

                                <div class="form-group col-md-6">
                                    <label>First Name *</label>
                                    <input class="form-control" placeholder="First name" name="fname" type="text">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name *</label>
                                    <input class="form-control" placeholder="Last name" name="lname" type="text">

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone Number *</label>
                                    <input class="form-control" placeholder="04XXXXXXX" name="contact" type="text">

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email Address *</label>
                                    <input class="form-control" placeholder="username@example.com" name="email"
                                        type="text">

                                </div>

                                <div class="form-group col-md-12">
                                    <label>Street Address *</label>
                                    <input class="form-control" placeholder="123 Example Street" name="address"
                                        type="text">

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Suburb *</label>
                                    <input class="form-control" placeholder="Ex. Mawson" name="suburb" type="text">

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Postcode *</label>
                                    <input class="form-control" placeholder="Ex. 2607" name="postcode" type="text">

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

                                </div>

                                <div class="form-group col-md-12">
                                    <label>Additional Message:</label>
                                    <textarea class="form-control" rows="10" cols="40" name="messages"></textarea>

                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                                    <script src="https://www.google.com/recaptcha/api.js?" async defer></script>

                                    <div data-sitekey="6Lc8y90UAAAAAHGkmqzQQ5Eibu-nlNZUCVFus0qR" class="g-recaptcha">
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary">Request an Appraisal</button>
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
            <div class="copyright">Copyright © {!! date('Y') !!} <a href="http://www.multidynamic.com.au">{!!
                    env('APP_NAME') !!}</a> All rights reserved. &nbsp; &nbsp; <a
                    href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy </a>
                <div class="copyright">

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <ul class="btm-sm-icon">
                <li><a href="https://www.facebook.com/multidynamic" target="_blank" class="sm-icon"><i
                            class="fa fa-facebook facebook"></i></a></li>
                <li><a href="https://www.instagram.com/multi.dynamic" target="_blank" class="sm-icon"><i
                            class="fa fa-instagram instagram"></i></a></li>
                <li><a href="https://twitter.com/" target="_blank" class="sm-icon"><i
                            class="fa fa-twitter twitter"></i></a></li>
                <li><a href="https://linkedin.com/" target="_blank" class="sm-icon"><i
                            class="fa fa-linkedin linkedin"></i></a></li>
            </ul>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="copyright">
                <!--  <a href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy</a>&nbsp; -->
                ABN: 90 165 249 954 &nbsp; &nbsp;
                <a href="{!! route('page.show', 'terms-and-conditions') !!}">Terms & Conditions</a>
            </div>
            <div class="design-develop">Design and developed by <a href="http://www.111it.com.au" target="_blank">111IT
                </a></div>
        </div>
    </div>
</div>