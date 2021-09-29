@extends('layouts.app')
@section('title', 'Home')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')
<!--START OF SLIDER PART-->
@isset($sliders)
@if($sliders->count()>0)
<div class="main__banner">
    <div class="main__banner__slide">
        @foreach($sliders as $slider)
        <div class="item ">
            <img src="{{ url($slider->getSliderImagePath()) }}" alt="Multi Dynamic" />
            <div class="main-banner-caption">
                <img src="images/home-banner-icon.png" alt="">
            </div>
        </div>
        @endforeach
        <!-- end item  -->
    </div>
</div>
@endif
@endisset

<!-- <div class="container finalist-image down">
        <img src="https://multidynamic.com.au/assets/images/finalist-image.png" />
    </div> -->

<!--SART OF SLIDER FORM-->
<div class="search-form-section">
    <div class="slider-form-wrapper">
        <div class="container">
            <h1>Find your dream home </h1>
            <div class="slider-form-bg">
                <form action="{!! route('properties.search') !!}" method="get" class="form-group-lg">
                    <div class="col-md-2 slide-category">


                        <select class="form-control type" name="category">
                            <option value="">Select Category</option>
                            @foreach(DataHelper::getPropertySubCategoriesOrderByName('buy') as $key => $category)
                            <option value="{!! $category->id !!}">Buy - {!! $category->name !!}</option>
                            @endforeach
                            @foreach(DataHelper::getPropertySubCategoriesOrderByName('rent') as $key => $category)
                            <option value="{!! $category->id !!}">Rent - {!! $category->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 slider-loc">
                        <input type="text" class="form-control" id="location" placeholder="Choose Location" />
                        <input type='hidden' id='location_id' name="location_id">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control property_type" name="property_type">
                            <option value="">Property Type</option>
                            @foreach(DataHelper::getPropertyTypesForSearch() as $key => $type)
                            <option value="{!! $type->id !!}">{!! $type->name !!}</option>
                            @endforeach
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
@isset($services)
@if($services->count()>0)
<div class="services">
    <div class="container">
        <h2>We are a full-service real estate agency operating in your area</h2>
        <div class="title-border">
            <span>Check out what we do below</span>
        </div>
        <div class="services__lists">
            <ul>
                @foreach($services as $service)
                <li>
                    <div class="services__lists__item">
                        <div class="service-image">
                            <img src="{{ url($service->getServiceImagePath()) }}" alt="" />
                        </div>
                        <div class="service-content">
                            <h3>{{$service->title}}</h3>
                            <p>{!! $service->description !!}</p>
                            <a href="#">Read more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                @endforeach
                <!-- end list  -->

            </ul>
        </div>
    </div>
</div>
@endif
@endisset

<div class="fefatured__property">
    <div class="container">
        <div class="col-lg-12">
            <h2>Featured Properties</h2>
        </div>
        <div class="fefatured__property__slider">
            @foreach($properties as $property)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container" href="{!! route('properties.show', $property->slug) !!}">

                            <img src="{!! url($property->getCoverImage()) !!}" alt="{!! $property->name !!}"
                                class="img-responsive" />
                        </a>
                        <!--Caption Detail-->
                        <div class="caption detail">
                            <header>
                                <div class="pull-left">
                                    <h1 class="title">
                                        <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                            str_limit($property->name, 30) !!}</a>
                                    </h1>
                                </div>

                                <div class="price-block">
                                    <div class="starting-price">{!! $property->price_type_name !!}</div>
                                    <div class="price">{{ $property->getFormattedPrice() }}</div>
                                </div>
                                <!--Area Block-->
                                <div class="area-block">
                                    <div class="property-type">Property Type</div>
                                    <div class="property-area">{!! $property->property_type_name !!}</div>
                                </div>
                            </header>
                            <!--Location-->
                            <h3 class="location">
                                @if($property->location)
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>{!! $property->location_name !!}
                                </a>
                                @endif
                            </h3>
                            <!--Item Details-->
                            <ul class="item-details col-md-12">
                                <li>
                                    <p class="item-area">@if($property->area > 0) {!! $property->area !!}
                                        m<sup>2</sup>@else --.-- @endif</p>
                                </li>

                                <li>
                                    <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom</p>
                                </li>
                                <li>
                                    <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom</p>
                                </li>
                                <li>
                                    <p class="item-garage">{!! $property->number_of_garages !!} Garage</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="detail-footer">
                                <a href="{!! route('properties.show', $property->slug) !!}"><i class="fa-user"></i>
                                    {{ $property->agents_count }}
                                    {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                <span><i class="fa-calendar-o"></i>{!!
                                    App\Http\Helper::time_elapsed_string($property->created_at) !!}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end featured  -->

@isset($home)
<div class="welcome-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="hidden embed-responsive-item" src="https://www.youtube.com/embed/ex7jGbyFgpA?rel=0"
                        allowfullscreen=""></iframe>
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ex7jGbyFgpA"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="main-title">
                    @if($home->welcome_message)
                    <h2>{!!$home->welcome_message->meta_value!!}</h2>
                    @endif

                </div>


            </div>


        </div>
    </div>
</div>
@endisset
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
        <div class="text-center multi-dynamic-button">
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
                    <a href="#" class="btn btn-warning">Download Seller’s Guide</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>buying a HOME?</h3>
                    <a href="#" class="btn btn-warning">Download Buyer’s Guide</a>
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
        <div class="text-center blog__title">
            <h2>BLOGS</h2>
            <p>Find the latest useful information about property in Ingleburn and surrounding areas</p>
        </div>

        <div class="blogs-links-container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4">
                    <div class="blog__block">
                        <div class="blog-link">
                            <div class=" blog-link-image-container">
                                <a href="{{ route('page.blog', ['slug' => $blog->slug]) }}">
                                    <img src="{{ url($blog->getBlogImagePath()) }}" />
                                </a>
                            </div>
                            <div class=" blog-short-details-container">
                                <div class="blog-link-heading">
                                    <a href="{{ route('page.blog', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                </div>
                                <div class="blog-short-descriptions">{{ str_limit($blog->description, 120) }}</div>
                                <div class="row blog-other-attributes">

                                    <div class="col-md-6 posted-date-container">
                                        <i class="fa fa-calendar"></i> <span
                                            class="posted-date">{{ $blog->getCreatedDate() }}</span>
                                    </div>
                                    <div class="col-md-6 posted-by-container">
                                        <a href="{{ route('page.blog', ['slug' => $blog->slug]) }}">Read more <i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center view-all">
                <a href="">View all</a>
            </div>
        </div>
    </div>
</div>
<!-- end blog  -->
@isset($testimonials)
@if($testimonials->count()>0)
<div class="testimonial">
    <div class="container">
        <div class="main-title">
            <h2>Testimonilas</h2>
            <p>Find out what people are really saying about Multi Dynamic</p>
        </div>
        <div class="testimonial__slider">
            @foreach ($testimonials as $testimonial)


            <div class="slider-item">
                <div class="content-wrapper">
                    <div class="testimonial-image">
                        <img src="{{ url($testimonial->getImagePath()) }}" alt="">
                    </div>
                    <div class="title">
                        <h3>{{$testimonial->title}}</h3>
                    </div>
                    <div class="content">
                        {!!$testimonial->description!!}
                    </div>

                    <div class="author">
                        {{$testimonial->name}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endisset
<!-- end testimonial  -->
<!-- team section  -->
<!-- end team section  -->
@isset($agents)
@if($agents->count()>0)

<div class="team">
    <div class="container">
        <h2>Meet The Team</h2>
        <div class="team__slider">
            @foreach ($agents as $agent)
            <div class="team__slider__item">
                <div class="team__block">
                    <div class="team__image">
                        <img src="{{$agent->getAgentImagePath()}}" alt="team">
                    </div>
                    <div class="team__content">
                        <h3>{{ $agent->getFullName() }}<em>{!! $agent->designation ? $agent->designation->designation :
                                '' !!}</em></h3>
                    </div>
                    <div class="team-links">
                        <ul>
                            <li><a href="tel:{{$agent->phone_number}}"><img src="{{asset('')}}images/telephone.png"
                                        alt=""></a></li>
                            <li><a href="tel:{{$agent->mobile_number}}"><img src="{{asset('')}}images/mobile.png"
                                        alt=""></a></li>
                            <li><a href="mailto:{{$agent->email}}"><img src="{{asset('')}}images/message.png"
                                        alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- end item  -->

        </div>
    </div>
</div>
@endif
@endisset
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
            <div class="text-center follow-us-btn">
                <a href="#" class="btn btn-primary">Follow Us</a>
            </div>
        </div>
    </div>
</div>
<!-- end instagram  -->
@endsection