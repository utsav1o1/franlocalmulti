@extends('layouts.app')
@section('title', 'Home')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')
<!--START OF SLIDER PART-->
<div class="main__banner">
    <div class="main__banner__slide">
        <div class="item ">
            <img src="images/main-slider.jpg" alt="Multi Dynamic" />
            <div class="main-banner-caption">
                <img src="images/home-banner-icon.png" alt="">
            </div>
        </div>
        <!-- end item  -->

        <div class="item ">
            <img src="images/main-slider.jpg" alt="Multi Dynamic" />
            <div class="main-banner-caption">
                <img src="images/home-banner-icon.png" alt="">
            </div>
        </div>
        <!-- end item  -->

        <div class="item ">
            <img src="images/main-slider.jpg" alt="Multi Dynamic" />
            <div class="main-banner-caption">
                <img src="images/home-banner-icon.png" alt="">
            </div>
        </div>
        <!-- end item  -->
    </div>
</div>

<!-- <div class="finalist-image container down">
        <img src="https://multidynamic.com.au/assets/images/finalist-image.png" />
    </div> -->

<!--SART OF SLIDER FORM-->
<div class="search-form-section">
    <div class="slider-form-wrapper">
        <div class="container">
            <h1>Find your dream home </h1>
            <div class="slider-form-bg">
                <form action="http://multidynamicingleburn.com.au/properties/search" method="get" class="form-group-lg">
                    <div class="col-md-2 slide-category">


                        <select class="form-control type" name="category">
                            <option value="">Select Category</option>
                            <option value="1">Buy - Residential</option>
                            <option value="2">Buy - House & Land</option>
                            <option value="3">Buy - Land</option>
                            <option value="4">Buy - Commercial</option>
                            <option value="5">Buy - Rural</option>
                            <option value="6">Rent - Residential</option>
                            <option value="7">Rent - Commercial</option>
                            <option value="8">Rent - Rental</option>
                            <option value="9">Rent - Holiday Rental</option>
                        </select>
                    </div>
                    <div class="col-md-2 slider-loc">
                        <input type="text" class="form-control" id="location" placeholder="Choose Location" />
                        <input type='hidden' id='location_id' name="location_id">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control property_type" name="property_type">
                            <option value="">Property Type</option>
                            <option value="1">Duplex</option>
                            <option value="2">Terrace</option>
                            <option value="3">Studio</option>
                            <option value="4">Townhouse</option>
                            <option value="5">Unit</option>
                            <option value="6">House</option>
                            <option value="7">House & Land</option>
                            <option value="8">Land</option>
                            <option value="9">Villa</option>
                            <option value="10">Acreage</option>
                            <option value="11">Serviced Apartment</option>
                            <option value="12">Apartment</option>
                            <option value="13">Others</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control price_range" name="price_range">
                            <option value="">Price Range</option>
                            <option value="0-250000">Upto $250K</option>
                            <option value="250000-500000">$250K-$500K</option>
                            <option value="500000-650000">$500K-$650K</option>
                            <option value="650000-750000">$650K-$750K</option>
                            <option value="750000-1000000">$750K-$1M</option>
                            <option value="1000000-100000000000">$1M Over</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control type" name="number_of_bedrooms">
                            <option value="" selected="selected">Beds</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control type" name="number_of_bathrooms">
                            <option value="" selected="selected">Baths</option>

                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="1">1.5</option>
                            <option value="2">2</option>
                            <option value="1">2.5</option>
                            <option value="3">3+</option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control type" name="number_of_garages">
                            <option value="" selected="selected">Garage</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3+</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Search</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- end section  -->
<div class="services">
    <div class="container">
        <h2>We are a full-service real estate agency operating in your area</h2>
        <div class="title-border">
            <span>Check out what we do below</span>
        </div>
        <div class="services__lists">
            <ul>
                <li>
                    <div class="services__lists__item">
                        <div class="service-image">
                            <img src="images/service1.jpg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Buy A Home</h3>
                            <p>Browse our listings to find your dream home or next investment property.</p>
                            <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <!-- end list  -->
                <li>
                    <div class="services__lists__item">
                        <div class="service-image">
                            <img src="images/service2.jpg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Rent A Property</h3>
                            <p>Browse our current available homes for rent.</p>
                            <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <!-- end list  -->

                <li>
                    <div class="services__lists__item">
                        <div class="service-image">
                            <img src="images/service3.jpg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Property Management</h3>
                            <p>We manage your investment property
                                like it’s our own.</p>
                            <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <!-- end list  -->

                <li>
                    <div class="services__lists__item">
                        <div class="service-image">
                            <img src="images/service4.jpg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>House & Land</h3>
                            <p>Build a new, beautiful home in one of our hand selected estates throughout the region
                            </p>
                            <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <!-- end list  -->

                <li>
                    <div class="services__lists__item">
                        <div class="service-image">
                            <img src="images/service5.jpg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Sold</h3>
                            <p>Our recently sold listings for homes, land
                                and commercial properties.
                            </p>
                            <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <!-- end list  -->

                <li>
                    <div class="services__lists__item">
                        <div class="service-image">
                            <img src="images/service6.jpg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Sell Your Property</h3>
                            <p>We prepare your property for the market,
                                so it’s ready to sell!</p>
                            <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <!-- end list  -->
            </ul>
        </div>
    </div>
</div>

<div class="fefatured__property">
    <div class="container">
        <div class="col-lg-12">
            <h2>Featured Properties</h2>
        </div>
        <div class="fefatured__property__slider">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/registered-land-in-the-heart-of-the-macarthur-height">

                            <img src="https://multidynamic.com.au/uploads/properties/846/thumbnail-property-image-163090244652707789-rsd.jpg"
                                alt="REGISTERED LAND IN THE HEART OF THE MACARTHUR HEIGHT" class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/registered-land-in-the-heart-of-the-macarthur-height">REGISTERED
                                            LAND IN THE HEART O...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">Others</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">0 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">0 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">0 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/registered-land-in-the-heart-of-the-macarthur-height"><i
                                        class="fa-user"></i> 1 agent</a>
                                <span><i class="fa-calendar-o"></i>1 day ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/hidden-gem-of-gregory-hills">

                            <img src="https://multidynamic.com.au/uploads/properties/845/thumbnail-property-image-163097337326658381-rsd.jpg"
                                alt="Hidden Gem of Gregory Hills" class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/hidden-gem-of-gregory-hills">Hidden
                                            Gem of Gregory Hills</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">House</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">3 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">2 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">1 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a href="http://multidynamicingleburn.com.au/properties/hidden-gem-of-gregory-hills"><i
                                        class="fa-user"></i> 1 agent</a>
                                <span><i class="fa-calendar-o"></i>1 day ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/dual-occupancy-outstanding-family-home-with-a-granny-flat-in-the-heart-of-edmondson-park">

                            <img src="https://multidynamic.com.au/uploads/properties/843/thumbnail-property-image-163053833527229384-rsd.jpg"
                                alt="DUAL OCCUPANCY OUTSTANDING FAMILY HOME WITH A GRANNY FLAT IN THE HEART OF EDMONDSON PARK."
                                class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/dual-occupancy-outstanding-family-home-with-a-granny-flat-in-the-heart-of-edmondson-park">DUAL
                                            OCCUPANCY OUTSTANDING FAM...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">House</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">6 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">4 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">2 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/dual-occupancy-outstanding-family-home-with-a-granny-flat-in-the-heart-of-edmondson-park"><i
                                        class="fa-user"></i> 1 agent</a>
                                <span><i class="fa-calendar-o"></i>4 days ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/only-pay-10-000-now-to-secure-your-next-property-selling-fast">

                            <img src="https://multidynamic.com.au/uploads/properties/841/thumbnail-property-image-163031020852274422-rsd.jpg"
                                alt="ONLY PAY $10,000 NOW TO SECURE YOUR NEXT PROPERTY. SELLING FAST!!!"
                                class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/only-pay-10-000-now-to-secure-your-next-property-selling-fast">ONLY
                                            PAY $10,000 NOW TO SECURE...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">House</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">4 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">2 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">1 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/only-pay-10-000-now-to-secure-your-next-property-selling-fast"><i
                                        class="fa-user"></i> 2 agents</a>
                                <span><i class="fa-calendar-o"></i>1 week ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/luxury-double-storey-house-at-the-heart-of-edmondson-park">

                            <img src="https://multidynamic.com.au/uploads/properties/840/thumbnail-property-image-163038790855970845-rsd.jpg"
                                alt="Luxury double storey house at the heart of Edmondson Park"
                                class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/luxury-double-storey-house-at-the-heart-of-edmondson-park">Luxury
                                            double storey house at...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">House</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">4 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">3 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">2 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/luxury-double-storey-house-at-the-heart-of-edmondson-park"><i
                                        class="fa-user"></i> 0 agent</a>
                                <span><i class="fa-calendar-o"></i>1 week ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/welcome-to-the-meadows-in-bardia-1">

                            <img src="https://multidynamic.com.au/uploads/properties/827/thumbnail-property-image-162874489581679803-rsd.jpg"
                                alt="Welcome To The Meadows in Bardia" class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/welcome-to-the-meadows-in-bardia-1">Welcome
                                            To The Meadows in Bard...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">Others</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">3 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">2 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">1 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/welcome-to-the-meadows-in-bardia-1"><i
                                        class="fa-user"></i> 2 agents</a>
                                <span><i class="fa-calendar-o"></i>3 weeks ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/the-one-you-have-been-waiting-for">

                            <img src="https://multidynamic.com.au/uploads/properties/823/thumbnail-property-image-162570970766966453-rsd.jpg"
                                alt="THE ONE YOU HAVE BEEN WAITING FOR!" class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/the-one-you-have-been-waiting-for">THE
                                            ONE YOU HAVE BEEN WAITING...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">House</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">3 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">2 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">1 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/the-one-you-have-been-waiting-for"><i
                                        class="fa-user"></i> 2 agents</a>
                                <span><i class="fa-calendar-o"></i>1 month ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/in-bardia-ready-to-move-in-home-under-760k">

                            <img src="https://multidynamic.com.au/uploads/properties/822/thumbnail-property-image-162701099101010304-rsd.jpg"
                                alt="IN BARDIA ,READY TO MOVE IN HOME UNDER $760K" class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/in-bardia-ready-to-move-in-home-under-760k">IN
                                            BARDIA ,READY TO MOVE IN HO...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">House</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">3 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">2 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">1 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/in-bardia-ready-to-move-in-home-under-760k"><i
                                        class="fa-user"></i> 2 agents</a>
                                <span><i class="fa-calendar-o"></i>1 month ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container"
                            href="http://multidynamicingleburn.com.au/properties/everything-you-need-in-a-family-home-1">

                            <img src="https://multidynamic.com.au/uploads/properties/821/thumbnail-property-image-162701165962417421-rsd.jpg"
                                alt="EVERYTHING YOU NEED IN A FAMILY HOME!!" class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a
                                            href="http://multidynamicingleburn.com.au/properties/everything-you-need-in-a-family-home-1">EVERYTHING
                                            YOU NEED IN A FAMIL...</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">Price view</div>
                                    <div class="price"></div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">House</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area"> --.-- </p>
                                </li>

                                <li>
                                    <p class="item-bed">3 Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">2 Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">1 Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a
                                    href="http://multidynamicingleburn.com.au/properties/everything-you-need-in-a-family-home-1"><i
                                        class="fa-user"></i> 2 agents</a>
                                <span><i class="fa-calendar-o"></i>1 month ago</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured  -->

<div class="welcome-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="hidden embed-responsive-item" src="http://www.youtube.com/embed/ex7jGbyFgpA?rel=0"
                        allowfullscreen=""></iframe>
                        
                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/ex7jGbyFgpA"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="main-title">
                    <h2>Welcome to Multi Dynamic Ingleburn</h2>

                </div>
                <p>

                    Multi Dynamic Real Estate is one of the most trusted and fastest growing real estate franchises
                    in
                    Australia. Our dedicated, educated and hardworking Ingleburn team has a proven track record of
                    results in serving our customers to buy, sell, rent and build their properties. You can be
                    assured
                    when you engage Multi Dynamic Ingleburn, you will find every solution to your real estate
                    requirements, because it’s our client's satisfaction which is the key to our success.


                </p>

            </div>


        </div>
    </div>
</div>
<!-- end section  -->
<div class="zero-dollars" style="background: url('images/selling-banner.jpg');">
    <div class="container">
        <div class="zero-dollars--capton">
            <h2><span>WE WILL LIST YOUR HOME</span>FOR ZERO
                DOLLARS!</h2>
            <div class="text-center">
                <a href="#">ask us now</a>
            </div>
        </div>
    </div>
</div>
<!-- end banner  -->
<div class="sold-banner">
    <div class="container">
        <a href="">
            <img src="images/sold-banner.jpg" alt="">
        </a>
    </div>
</div>
<!-- end section  -->


<div class="property-evaluation-block">
    <div class="container">
        <h2>What’s your property worth?</h2>
        <p>When you are considering selling your home or renting out a property you own, one of the most important
            things to know is how much your home is worth, whether it is the overall value or the potential rental
            income. Want to know what your home is worth? We will be happy to review your property, completely free
            and with no obligation, to provide you a comprehensive review of your home, the current market analysis,
            and suburb insights.</p>
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
                            <input type="text" name="" id="" placeholder="Enter your name" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="" id="" placeholder="Enter your name" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="" id="" placeholder="Enter your name" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="" id="" placeholder="Enter your name" class="form-control">
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
<div class="why-choose-multydynamic">
    <div class="container">
        <h2>Why Choose Multi Dynamic ?<span>What makes us better than the other real estate agents</span></h2>
        <ul class="row">
            <li class="col-lg-6">
                <div class="choose-block">
                    <p>Multi Dynamic is a team of Professional and Dynamic Real Estate Agents who are dedicated to
                        serve the community with their honest work ethics and hard-working nature.
                    </p>
                </div>
            </li>
            <!-- end list  -->

            <li class="col-lg-6">
                <div class="choose-block">
                    <p>We only use premier advertisements on marketing platforms to get the maximum number of
                        viewers for our property.</p>
                </div>
            </li>
            <!-- end list  -->

            <li class="col-lg-6">
                <div class="choose-block">
                    <p>Multi Dynamic is selling existing property, property management and selling projects such as
                        House & Land or Apartments.</p>
                </div>
            </li>
            <!-- end list  -->

            <li class="col-lg-6">
                <div class="choose-block">
                    <p>We are local agents, who know your area well. </p>
                </div>
            </li>
            <!-- end list  -->

            <li class="col-lg-6">
                <div class="choose-block">
                    <p>We allocate at least 2 agents for every open house. Which results in a quick and professional
                        sale of your property.</p>
                </div>
            </li>
            <!-- end list  -->

            <li class="col-lg-6">
                <div class="choose-block">
                    <p>Our proven success rate is 97% when it comes to the property market. Which is why we are the
                        fastest growing real estate in Sydney. </p>
                </div>
            </li>
            <!-- end list  -->
        </ul>
        <div class="multi-dynamic-button text-center">
            <a href="#" class="btn btn-primary">Contact Multi Dynamic Now!</a>
        </div>
    </div>
</div>
<!-- end  why-choose-multydynamic-->
<div class="free-guides">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="first-content-block">
                    <h3>We offer <strong>FREE</strong> <br>
                        Buyers and Sellers Guides
                    </h3>
                    <p><strong>We care to prepare</strong> - We go the extra mile to best prepare your property for
                        the market. If you would like to know how to best prepare your home for the market then
                        contact us today.</p>
                    <h4>Download yours today!</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>SELLING YOUR HOME?</h3>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#sellingModal">Download Seller’s Guide</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>buying a HOME?</h3>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#buyingModal">Download Buyer’s Guide</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="free-apprisal-banner">
    <div class="container">
        <div class="banner-wrapper">
            <img src="images/banner.png" alt="">
        </div>
    </div>
</div>
<!-- end free-apprisal-banner  -->

<div class="blog blog__home">
    <div class="container">
        <div class="blog__title text-center">
            <h2>BLOGS</h2>
            <p>Find the latest useful information about property in Ingleburn and surrounding areas</p>
        </div>

        <div class="blogs-links-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog__block">
                        <div class="blog-link">
                            <div class=" blog-link-image-container">
                                <a href="#">
                                    <img
                                        src="https://multidynamic.com.au/uploads/blogs/blog-image-MDE6MDg6NTM5OQ==.jpg" />
                                </a>
                            </div>
                            <div class=" blog-short-details-container">
                                <div class="blog-link-heading">
                                    <a href="#">Multi Dynamic First Home Buyer Seminar</a>
                                </div>
                                <div class="blog-short-descriptions">Join us for a property seminar with Multi
                                    Dynamic
                                    Real Estate team</div>
                                <div class="row blog-other-attributes">

                                    <div class="col-md-6 posted-date-container">
                                        <i class="fa fa-calendar"></i> <span class="posted-date">12 Aug, 2019</span>
                                    </div>
                                    <div class="col-md-6 posted-by-container">
                                        <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__block">
                        <div class="blog-link">
                            <div class="blog-link-image-container">
                                <a href="#"><img
                                        src="https://multidynamic.com.au/uploads/blogs/blog-image-MDI6MDg6NDc5NQ==.jpg" /></a>
                            </div>
                            <div class="blog-short-details-container">
                                <div class="blog-link-heading"><a href="#">Families upgrading from units to
                                        houses</a></div>
                                <div class="blog-short-descriptions">Families upgrading from units to houses rule
                                    Sydney’s auction market</div>
                                <div class="row blog-other-attributes">
                                    <div class="col-md-6 posted-date-container">
                                        <i class="fa fa-calendar"></i> <span class="posted-date">12 Aug, 2019</span>
                                    </div>
                                    <div class="col-md-6 posted-by-container">

                                        <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__block">
                        <div class="blog-link">
                            <div class="blog-link-image-container">
                                <a href="#"><img
                                        src="https://multidynamic.com.au/uploads/blogs/blog-image-MDM6MDY6MzI1NQ==.jpg" /></a>
                            </div>
                            <div class="blog-short-details-container">
                                <div class="blog-link-heading">
                                    <a href="#">Finance &amp; Property Information Seminar</a>
                                </div>
                                <div class="blog-short-descriptions">Free Property Information Session</div>
                                <div class="row blog-other-attributes">
                                    <div class="col-md-6 posted-date-container">
                                        <i class="fa fa-calendar"></i> <span class="posted-date">07 Jun, 2019</span>
                                    </div>
                                    <div class="col-md-6 posted-by-container">
                                        <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-all text-center">
                <a href="">View all</a>
            </div>
        </div>
    </div>
</div>
<!-- end blog  -->
<div class="testimonial">
    <div class="container">
        <div class="main-title">
            <h2>Testimonials</h2>
            <p>Find out what people are really saying about Multi Dynamic</p>
        </div>
        <div class="testimonial__slider">
            <div class="slider-item">
                <div class="content-wrapper">
                    <div class="testimonial-image">
                        <img src="images/insta3.png" alt="">
                    </div>
                    <div class="title">
                        <h3>Awesome Service</h3>
                    </div>
                    <div class="content">
                        <p> Great environment, awesome service. I recommend Multi Dynamic to all my friends and
                            family if anyone need a help regarding real estate. Whether it’s buying selling or
                            renting. Multi Dynamic is one of the best I have found.</p>
                    </div>

                    <div class="author">
                        Tirtha Raj Karki
                    </div>
                </div>
            </div>

            <div class="slider-item">
                <div class="content-wrapper">
                    <div class="testimonial-image">
                        <img src="images/insta3.png" alt="">
                    </div>
                    <div class="title">
                        <h3>Very Professional and friendly</h3>
                    </div>
                    <div class="content">
                        <p>I find MultiDynamic very professional and friendly. MultiDynamic guided us from finding
                            land to the sev I would like to thank @Nava Pandey and @Bishnu Sapkota for their advice
                            and help during the entire process. Also recommend the team for anyone’s realestate
                            needs.</p>
                    </div>
                    <div class="author">
                        Prakash Poudel
                    </div>
                </div>
            </div>

            <div class="slider-item">
                <div class="content-wrapper">
                    <div class="testimonial-image">
                        <img src="images/insta3.png" alt="">
                    </div>
                    <div class="title">
                        <h3>Highly recommend to allmy friends</h3>
                    </div>
                    <div class="content">
                        <p> I would highly recommend all my friends and relatives to go to Multi dynamic for buying
                            and selling the property, the whole team is so professional the way they deal with it
                            and also best agency according to my view.</p>
                    </div>

                    <div class="author">
                        Aliz Khatri
                    </div>
                </div>
            </div>

            <div class="slider-item">
                <div class="content-wrapper">
                    <div class="testimonial-image">
                        <img src="images/insta3.png" alt="">
                    </div>
                    <div class="title">
                        <h3>Very Professional and friendly</h3>
                    </div>
                    <div class="content">
                        <p> find MultiDynamic very professional and friendly. MultiDynamic guided us from finding
                            land to the settlement. I would like to thank @Nava Pandey and @Bishnu Sapkota for their
                            advice and help during the entire process. Also recommend the team for anyone’s
                            realestate needs.</p>
                    </div>

                    <div class="author">
                        Anup Timilsana
                    </div>
                </div>
            </div>

            <div class="slider-item">
                <div class="content-wrapper">
                    <div class="testimonial-image">
                        <img src="images/insta3.png" alt="">
                    </div>
                    <div class="title">
                        <h3>Very Professional and friendly</h3>
                    </div>
                    <div class="content">
                        <p> find MultiDynamic very professional and friendly. MultiDynamic guided us from finding
                            land to the settlement.</p>
                    </div>
                    <div class="author">
                        Anup Timilsana
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonial  -->
<!-- team section  -->
<!-- end team section  -->
<div class="team">
    <div class="container">
        <h2>Meet The Team</h2>
        <div class="team__slider">
            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team1.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>BISHNU PRABHAT SAPKOTA<em>Principal</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->

            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team2.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>BIJAYA PAUDEL UPADHYAYA
                            (BJAY PAUL)<em>Sales Director</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->

            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team3.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>MURARI LAMSAL<em>Sales Director</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->

            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team4.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>PAUL MCKEOWN<em>Sales manager</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->
            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team1.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>BISHNU PRABHAT SAPKOTA<em>Principal</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->

            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team2.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>BIJAYA PAUDEL UPADHYAYA
                            (BJAY PAUL)<em>Sales Director</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->

            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team3.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>MURARI LAMSAL<em>Sales Director</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->

            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="images/team4.png" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>PAUL MCKEOWN<em>Sales manager</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="#"><img src="images/telephone.png" alt=""></a></li>
                            <li><a href="#"><img src="images/mobile.png" alt=""></a></li>
                            <li><a href="#"><img src="images/message.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end item  -->
        </div>
    </div>
</div>
<div class="instagram">
    <div class="container">
        <h2>Follow our instagram <a href="#">@multi.dynamic</a></h2>
        <div class="insta-gallery">
            <ul>
                <li class="insta-gallery-block">
                    <div class="image">
                        <a href="#"><img src="images/insta1.png" alt=""></a>
                    </div>
                    <div class="insta-share">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class="count">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span class="count">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end block  -->
                <li class="insta-gallery-block">
                    <div class="image">
                        <a href="#"><img src="images/insta2.png" alt=""></a>
                    </div>
                    <div class="insta-share">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class="count">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span class="count">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end block  -->

                <li class="insta-gallery-block">
                    <div class="image">
                        <a href="#"><img src="images/insta3.png" alt=""></a>
                    </div>
                    <div class="insta-share">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class="count">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span class="count">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end block  -->

                <li class="insta-gallery-block">
                    <div class="image">
                        <a href="#"><img src="images/insta4.png" alt=""></a>
                    </div>
                    <div class="insta-share">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class="count">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span class="count">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end block  -->

                <li class="insta-gallery-block">
                    <div class="image">
                        <a href="#"><img src="images/insta5.png" alt=""></a>
                    </div>
                    <div class="insta-share">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class="count">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span class="count">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end block  -->

                <li class="insta-gallery-block">
                    <div class="image">
                        <a href="#"><img src="images/insta1.png" alt=""></a>
                    </div>
                    <div class="insta-share">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class="count">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span class="count">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end block  -->
            </ul>
            <div class="follow-us-btn text-center">
                <a href="#" class="btn btn-primary">Follow Us</a>
            </div>
        </div>
    </div>
</div>
<!-- end instagram  -->
@endsection