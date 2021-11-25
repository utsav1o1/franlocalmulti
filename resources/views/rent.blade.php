@extends('layouts.app')

@section('title', 'Rent')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')

<div class="search-field-wrap">
    <div class="container">

        <div class="row">
            <div class="inner-menu-bg col-md-12">
                <ul class="nav nav-tabs">
                    {{-- <li @if($slug=='residential' ) class="active" @endif><a data-toggle="tab"
                            href="#residential">Residential</a>
                    </li> --}}
                    <li class="active"><a data-toggle="tab" href="#residential">Residential</a>
                    </li>
                    <li><a href="{!! route('agents.index') !!}">Commercial</a></li>
                    </li>
                    <li class="">
                        <a href="#" class="dropdown-toggle first" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Forms <span class="caret"></span>
                        </a>
                        <ul class="dropdown dropdown-menu">
                            <li><a href="{!! asset('storage/Tenancy-Application-Form-2018.pdf') !!}"
                                    target="_blank">Application</a>
                            </li>
                            <li><a href="{!! asset('storage/Landlord-Information-Book-2017-MD.pdf') !!}">Owner</a></li>
                            <li><a href="{!! asset('storage/Master-Appraisal-Letter-of-MD-by-Bish.docx') !!}">Master
                                    Appraisal Letter</a></li>
                            <li><a href="{{ route('maintenance-request.form')}}">Maintenance Request</a></li>
                            <li><a href="{{ route('vacate-notice.form') }}">Vacate Notice</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="clearfix tab-content">
                {{-- <div id="residential"
                    class="tab-pane fade in @if($slug == DataHelper::getRentResidentialSlug()) {{ 'active' }} @endif">
                    <form method="get" action="{!! route('properties.rent', DataHelper::getRentResidentialSlug()) !!}"
                        class="clearfix form-group-lg">
                        @include('layouts.rent-search')
                    </form>
                </div> --}}
                <div id="residential" class="tab-pane fade in active">
                    <form method="get" action="{!! route('properties.rent', 'residential') !!}"
                        class="clearfix form-group-lg">
                        @include('layouts.rent-search')
                    </form>
                </div>
                <div id="unit" class="tab-pane fade in @if($slug == 'unit') {{ 'active' }} @endif">
                    <form method="get" action="{!! route('properties.rent', 'unit') !!}" class="clearfix form-group-lg">
                        @include('layouts.rent-search')
                    </form>
                </div>
                <div id="appartment" class="tab-pane fade in @if($slug == 'appartment') {{ 'active' }} @endif">
                    <form method="get" action="{!! route('properties.rent', 'appartment') !!}"
                        class="clearfix form-group-lg">
                        @include('layouts.rent-search')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Result Part-->
<div class="container">


    <div class="row">

        <div class="">
            <div class="row">
                <div class="search-result">
                    <!--Search Result Heading-->

                    <div class="inner-search-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-12 col-md-12">
                                <font color="#f26522">
                                    <h1 class="rent-resi">
                                        <b>@if($category) {!! $category->name !!} @else {{ 'Search Results' }}
                                            @endif</b>
                                    </h1>
                                </font>
                                <h4>
                                    <center>
                                        <p>
                                            <font color="#0c5aa0"><b>"Multi Dynamic Property Management
                                                    Team has been managing Australia's Property to its
                                                    best"</b> </font>

                                        </p>
                                    </center>
                                </h4>
                            </div>

                        </div>
                        <div class="col-sm-12 land-search">
                            <h1>Search Result</h1>
                        </div>

                        {{-- <div class="col-sm-12 col-md-12">
                            <button type="button" class="btn btn-default btn-sm signintosave">
                                <span class="glyphicon glyphicon-log-in"></span>Sign in to save this search
                            </button>
                        </div> --}}
                    </div>

                    <div class="tab-content">
                        <div id="allproperties" class="tab-pane fade in active">
                            @foreach($properties as $property)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="thumbnail">
                                    <div class="thumbnail recent-properties-box">
                                        <a class="thumbnail-container"
                                            href="{!! route('properties.show', $property->slug) !!}">

                                            <img src="{!! url($property->getCoverImage()) !!}"
                                                alt="{!! $property->name !!}" class="img-responsive" />
                                        </a>
                                        @if($property->contractType)
                                        <span class="properties__ribon">{!! $property->contractType->heading !!}</span>
                                        @endif
                                        <!--Caption Detail-->
                                        <div class="caption detail">
                                            <header>
                                                <div class="pull-left inner-pull-left">
                                                    <h1 class="title">
                                                        <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                                                        str_limit($property->street_number.' '.$property->street.' '.$property->location_short_name,30)
                                                                !!}</a>
                                                    </h1>
                                                </div>
                                                <div class="price">
                                                    {{ $property->getFormattedPrice() }}
                                                </div>
                                                <div class="price-block">
                                                    <div class="starting-price">{!! $property->price_type_name !!}</div>
                                                    <div class="price">{{ $property->getFormattedPrice() }}</div>
                                                </div>
                                                <div class="area-block">
                                                    <div class="property-type">Property Type</div>
                                                    <div class="property-area">{!! $property->property_type_name !!}
                                                    </div>
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
                                                    <p class="item-area">@if($property->area > 0) {!! $property->area
                                                        !!} m<sup>2</sup>@else --.-- @endif</p>
                                                </li>

                                                <li>
                                                    <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="item-garage">{!! $property->number_of_garages !!} Garage
                                                    </p>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="detail-footer">
                                                <a href="#"><i class="fa-user"></i> {{ $property->agents_count }} {{
                                                    ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                                        <span><i class="fa-calendar-o"></i>{!!
                                                            App\Http\Helper::time_elapsed_string($property->created_at)
                                                            !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12">
                            {!! $properties->appends($requestData)->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--SIDEBAR COLUMN-->
    </div>
</div>
@stop