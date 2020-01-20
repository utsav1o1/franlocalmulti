<!--START OF MAIN FOOTER-->
<footer>
    <div class="main-footer">
        <div class="row">
            <div class="container">
                <div class="col-md-4 col-sm-6 footer-item">
                    <div class="footer-item-content">
                        <a href="#" class="footer-logo">
                            <img class="img-responsive" src="{!! asset('images/footer-logo.png') !!}" />
                        </a>
                        <p style="text-align: justify;">Multi Dynamic is a team of professional and dedicated real estate agents committed to serving the local community. Hardworking, honest and ethical in all we do, our priority is to secure the best result possible for our valued clients, whether in sales or property management. </p>
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

                            <p><input class="nsu-field btn-block" id="subscriber_email_address" type="email" name="email" placeholder="Enter your Email Address" required="">
                            </p>
                            <p><button type="submit" class="button-sm button-theme btn-block" id="btn_subscribe">Submit</button></p>
                            <p id="subscriberNotice"></p>

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
    <div class="container" >
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
            <div class="copyright">Copyright &copy; {!! date('Y') !!} <a href="http://www.multidynamic.com.au">{!! env('APP_NAME') !!}</a> All rights reserved. &nbsp; &nbsp; <a href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy  </a>
                 <div class="copyright">
            
        </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <ul class="btm-sm-icon">
                <li><a href="https://www.facebook.com/multidynamic" target="_blank" class="sm-icon"><i class="fa fa-facebook facebook"></i></a></li>
                <li><a href="https://www.instagram.com/multi.dynamic" target="_blank" class="sm-icon"><i class="fa fa-instagram instagram"></i></a></li>
                <li><a href="https://twitter.com/" target="_blank" class="sm-icon"><i class="fa fa-twitter twitter"></i></a></li>
                <li><a href="https://linkedin.com/" target="_blank" class="sm-icon"><i class="fa fa-linkedin linkedin"></i></a></li>
            </ul>
         
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="copyright">
           <!--  <a href="{!! route('page.show', 'privacy-policy') !!}">Privacy Policy</a>&nbsp; -->
           ABN: 90 165 249 954 &nbsp; &nbsp; 
            <a href="{!! route('page.show', 'terms-and-conditions') !!}">Terms &amp; Conditions</a>
        </div>
        <div class="design-develop">Design &amp; Developed By: <a href="http://www.111it.com.au" target="_blank">111iT</a></div> 
    </div>
        </div>
    
