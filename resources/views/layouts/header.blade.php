<header>
    <meta name="title" content="Multi Dynamic | Your Dynamic Real Estate">
    <meta name="description" content="Multi Dynamic provides real estate services to the multicultural community all over Australia. Find houses, apartments & townhouses for sale & rent i">
    <meta name="keywords" content="multidynamic, real estate in south west, real estate in minto, real estate in ingleburn, real estate in austral, real estate in edmondson park, real estate in oran park, real estate in lepington, multidynamic ingleburn, nepali real estate in Sydney,nepalese real estate, nepali real estate in Australia , nepali real estate in Australia for rent, real estate, renting , properties buy and sell near me , buy property, buy land, sell property,  house and land, buy house and land, sell land, rent houses, appartments for rent, house for rent in Sydney,house for rent in liverpool,  houses on sale, honest real estate, reliable real estate, fastest way to sell home, first home buyer help, property management near me,real estate seminars, brand new houses,rental properties in Sydney, rental properties in south west sydney, rental properties in liverpool, rental properties in ingleburn, rental property in edmondson park, properties in lease near me">
    <div class="row">
        <nav class="navbar navbar-default navbar-inverse navbar-static-top affix-top" data-spy="affix"
             data-offset-top="110">
            <div class="container">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="{{ url(env('CORPORATE_URL')) }}" class="navbar-brand">
                    <img src="{!! asset('images/logo.png') !!}" class="img-responsive"/>
                </a>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="top-menu">
                        <ul class="nav navbar-nav top-main-menu">
                            <li class="nav-item">
                                    <a class="nav-link" href="{!! route('home') !!}">Home <span class="sr-only"></span></a>
                            </li>
                            <li class="">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>

                                <ul class="dropdown-menu dropdown">
                                    @foreach($projectTypes as $projectType)
                                        <li>
                                            <a href="{{ route('project-locations.show-project-locations', ['projectType' => $projectType->slug]) }}">{!! $projectType->name !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="">
                                <a href="{!! route('properties.buy') !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Buy <span class="caret"></span></a>

                                <ul class="dropdown-menu dropdown">


                                    @foreach(DataHelper::getPropertySubCategoriesOrderByName('buy') as $propertySubCategory)
                                        <li>
                                            <a href="{{ route('properties.buy', $propertySubCategory->slug) }}">{{ $propertySubCategory->name }}</a>
                                        </li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="">
                                <a href="{!! route('properties.rent') !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rent <span class="caret"></span></a>

                                <ul class="dropdown dropdown-menu">


                                    @foreach(DataHelper::getPropertySubCategoriesOrderByName('rent') as $propertySubCategory)
                                        <li>
                                            <a href="{{ route('properties.rent', $propertySubCategory->slug) }}">{{ $propertySubCategory->name }}</a>
                                        </li>

                                        <?php

                                            break;

                                        ?>

                                    @endforeach

                                    <li><a href="{!! route('agents.index') !!}">Commercial</a></li>
                                    <li><a href="{!! route('properties.leased') !!}">Leased Properties</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sell <span class="caret"></span></a>

                                <ul class="dropdown dropdown-menu">
                                    <li>
                                        <a href="{!! route('sell-form') !!}">Property Estimate</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('properties.recently-sold') !!}">Recent Sales</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('page.aboutus') !!}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('contact-us.form') !!}">Contact Us</a>
                            </li>
                        </ul>
                        <ul class="topsocialnav">
                            <li class="nav-item">
                                <span class="header-ph"><a href="tel:+61 2 9618 6209" style="font-weight: 600; font-size: 14px;" class="nav-link">02 9618 6209</a></span>
                            </li>

                            @if($user)
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, {!! ucfirst(explode(' ', $user->full_name)[0]) !!}<span class="caret"></span></a>

                                    <ul class="dropdown dropdown-menu topsignin">
                                        <li>
                                            <a href="{!! route('logout') !!}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @else

                                <li class="nav-item">
                                    <a href="#" class="nav-linka dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In &nbsp;<span class="caret"></span></a>

                                    <ul class="dropdown dropdown-menu topsignup">
                                        <li>
                                            <a href="{!! route('social.login', 'facebook') !!}">Sign In with Facebook</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('social.login', 'google') !!}">Sign In with Google</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.facebook.com/multidynamic" target="_blank"><i class="fa fa-facebook facebook"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.instagram.com/multi.dynamic/" target="_blank"><i class="fa fa-instagram instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://linkedin.com/" target="_blank"><i class="fa fa-linkedin linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</header>