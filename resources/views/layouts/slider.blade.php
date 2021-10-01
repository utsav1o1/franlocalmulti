<!--START OF SLIDER PART-->
<div class="row">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2" class="active"></li><!--
            <li data-target="#myCarousel" data-slide-to="3" class="active"></li>-->
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="{!! asset('images/slider1-bg.jpg') !!}?v=1" alt="{!! env('APP_NAME') !!}"/>
                <div class="conatiner">
                    <div class="carousel-caption">
                        <h1>Find Your Dream Home Today</h1>
                        <p>Australia's Trusted & Fastest Growing Real Estate</p>
                    </div>
                </div>
            </div>
            <!--START OF SECOND SLIDER-->
            <div class="item">
                <img class="second-slide" src="{!! asset('images/slider2-bg.jpg') !!}?v=1" alt="{!! env('APP_NAME') !!}"/>
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Honest &#8226; Reliable &#8226; Dynamic</h1>
                        <p>Australia's Trusted & Fastest Growing Real Estate</p>
                    </div>
                     
           
                    <div class="clearfix"></div>
                </div>
            </div>

             <div class="item">
                <img class="second-slide" src="{!! asset('images/m-slider.JPG') !!}?v=1" alt="{!! env('APP_NAME') !!}"/>
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Buy &#8226;  Sell &#8226; Rent</h1>
                        <p>Australia's Trusted & Fastest Growing Real Estate</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div><!--
            <div class="item">
                <img class="second-slide" src="{!! asset('images/slider4-bg.JPG') !!}" alt="{!! env('APP_NAME') !!}"/>
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Buy &#8226;  Sell &#8226; Rent</h1>
                        <p>Australia's Trusted & Fastest Growing Real Estate</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>-->
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

    <div class="finalist-image container down">
        <img src="{{ env('CORPORATE_URL') . '/assets/images/finalist-image.png' }}"/>
    </div>
    
<!--SART OF SLIDER FORM-->
<div class="row">
    <div class="slider-form-wrapper">
        <div class="container">
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
                        <input type='hidden' id='location_id' name="location_id" >
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