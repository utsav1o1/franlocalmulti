@extends('layouts.app')
@section('title', 'Property Management')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')
<!-- selling banner  -->
<div class="banner banner--property">
    <div class="container">
        <div class="banner__caption">
            <h1>WHAT IS YOUR RENTAL PROPERTY WORTH?</h1>
            <p>Looking to rent and want to know what your
                rental property is worth in the current market? </p>
            <a href="#">BOOK a PROPERTY APPRAISAL</a>
        </div>
    </div>
</div>
<!-- end selling banner  -->
<div class="property__management text-center">
    <div class="container">
        <h2>Property Management</h2>
        <p>Are you the proud owner of an investment property, or thinking about buying an investment property? We
            are here to help. You need a property manager that is trustworthy, knowledgeable, and skilled at
            communicating with you and your tenants.</p>
        <p>We know the Ingleburn market better than anyone. Contact us today to find out what we can do for you.</p>
        <a href="#">contact us now</a>
    </div>
</div>
<!-- end prpperty management  -->
<div class="typical__property">
    <div class="container">
        <h2>WE OFFER MORE THAN A TYPICAL PROPERTY MANAGER</h2>
        <ul>
            <li>
                <div class="typical__property__wrapper">
                    <div class="image-wrapper">
                        <img src="images/p1.jpg" alt="">
                    </div>
                    <div class="content-wrapper">
                        <h3>Landlord Insurance</h3>
                        <p>Feel Secure About Your Property with Multi Dynamic’s Landlord Insurance Policy</p>
                        <p>Get upto one year of free insurance on your investment property with Multi Dynamic Property
                            Management</p>
                        <a href="#">Read more</a>
                    </div>
                </div>
            </li>
            <!-- end list  -->

            <li>
                <div class="typical__property__wrapper">
                    <div class="image-wrapper">
                        <img src="images/p2.jpg" alt="">
                    </div>
                    <div class="content-wrapper">
                        <h3>Leasing</h3>
                        <p>Want the Best Tenants for Your Property? We are on it.
                            Leave your worries to our dedicated property team.
                            Why Multi Dynamic Property Management for your Leasing needs?
                        </p>
                        <p>MD Property Management has a team of qualified and highly motivated individuals: real estate
                            agents, leasing managers, business development manager, digital marketers, and support
                            staff. </p>
                        <a href="#">Read more</a>
                    </div>
                </div>
            </li>
            <!-- end list  -->
            <li>
                <div class="typical__property__wrapper">
                    <div class="image-wrapper">
                        <img src="images/p3.jpg" alt="">
                    </div>
                    <div class="content-wrapper">
                        <h3>Property Maintenance</h3>
                        <p>Best Property Maintenance Service Perfect for Both Landlords and Tenants
                        </p>
                        <p>Efficient and Accountable maintenance service to make sure your investment is always in mint
                            condition.</p>
                        <a href="#">Read more</a>
                    </div>
                </div>
            </li>
            <!-- end list  -->

            <li>
                <div class="typical__property__wrapper">
                    <div class="image-wrapper">
                        <img src="images/p4.jpg" alt="">
                    </div>
                    <div class="content-wrapper">
                        <h3>Rent Guarantee</h3>
                        <p>Get Your Rent Payout On Time. No Excuses!
                            Multi Dynamic Property Management guarantees you always get your payment on (XXXX) day of
                            the month.</p>
                        <a href="#">Read more</a>
                    </div>
                </div>
            </li>
            <!-- end list  -->

            <li>
                <div class="typical__property__wrapper">
                    <div class="image-wrapper">
                        <img src="images/p5.jpg" alt="">
                    </div>
                    <div class="content-wrapper">
                        <h3>Routine Inspections</h3>
                        <p>How Often Will Your Property be Inspected Under Our Supervision!</p>
                        <p>Each survey of your Property Will be Overseen with Proper Care and Attention to Finest of
                            Details by Experienced Team</p>
                        <a href="#">Read more</a>
                    </div>
                </div>
            </li>
            <!-- end list  -->

            <li>
                <div class="typical__property__wrapper">
                    <div class="image-wrapper">
                        <img src="images/p6.jpg" alt="">
                    </div>
                    <div class="content-wrapper">
                        <h3>Team Based Approach</h3>
                        <p>Team of experienced Home Experts That will Lay foundations for Long term Partnership & Proper
                            Care of Your Property</p>
                        <p>Dedicated Team of Home Experts That Will Never Let you Down</p>
                        <a href="#">Read more</a>
                    </div>
                </div>
            </li>
            <!-- end list  -->
        </ul>
    </div>
</div>

<div class="free-apprisal-banner">
    <div class="container">
        <div class="banner-wrapper">
            <img src="images/banner.png" alt="">
        </div>
    </div>
</div>
<!-- end appraisal banner  -->

<div class="property-evaluation-block">
    <div class="container">
        <h2>Curious about your property's value?</h2>
        <p>Don’t list in Ingleburn without talking to Ingleburn’s premium property experts</p>
        <div class="property-evaluation-wrapper">
            <h2>Free Property Evaluation!</h2>
            <p>We’ll send you a comprehensive, personalised report with in-depth analysis and market insights from
                Multi Dynamic</p>
            <form action="">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="" id="" placeholder="Enter your name" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="email" name="" id="" placeholder="Enter your name" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="number" name="" id="" placeholder="Enter your phone" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="" id="" placeholder="Enter your post code" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="" id="" placeholder="Your property address" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn btn-warning">submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- end property evaluation block  -->
@stop