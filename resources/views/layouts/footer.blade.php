<!--START OF MAIN FOOTER-->
<footer>
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
                                <a href="#" class="foot-block">Book Appraisal</a>
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
    
