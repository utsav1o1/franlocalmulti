<header>
    <meta name="title" content="Multi Dynamic - Ingleburn | Your Dynamic Real Estate">
    <meta name="description" content="Multi Dynamic provides real estate services to the multicultural community all over Australia. Find houses, apartments & townhouses for sale & rent near Ingleburn area.">
    <meta name="keywords" content="multidynamic">
    <meta name="keywords" content="real estate in south west">
    <meta name="keywords" content="real estate in minto">
    <meta name="keywords" content="real estate in ingleburn">
    <meta name="keywords" content="real estate in austral">
    <meta name="keywords" content="real estate in edmondson park">
    <meta name="keywords" content="real estate in oran park">
    <meta name="keywords" content="real estate in lepington">
    <meta name="keywords" content="multidynamic ingleburn">
    <meta name="keywords" content="nepali real estate in Sydney">
    <meta name="keywords" content="nepalese real estate">
    <meta name="keywords" content="nepali real estate in Australia">
    <meta name="keywords" content="nepali real estate in Australia for rent">
    <meta name="keywords" content="real estate, renting">
    <meta name="keywords" content="properties buy and sell near me">
    <meta name="keywords" content="buy property">
    <meta name="keywords" content="buy land, sell property">
    <meta name="keywords" content="house and land">
    <meta name="keywords" content="buy house and land">
    <meta name="keywords" content="sell land">
    <meta name="keywords" content="rent houses">
    <meta name="keywords" content="appartments for rent">
    <meta name="keywords" content="house for rent in Sydney">
    <meta name="keywords" content="house for rent in liverpool">
    <meta name="keywords" content="houses on sale">
    <meta name="keywords" content="honest real estate">
    <meta name="keywords" content="reliable real estate">
    <meta name="keywords" content="fastest way to sell home">
    <meta name="keywords" content="first home buyer help">
    <meta name="keywords" content="property management near me">
    <meta name="keywords" content="real estate seminars">
    <meta name="keywords" content="brand new houses">
    <meta name="keywords" content="rental properties in Sydney">
    <meta name="keywords" content="rental properties in south west sydney">
    <meta name="keywords" content="rental properties in liverpool">
    <meta name="keywords" content="rental properties in ingleburn">
    <meta name="keywords" content="rental property in edmondson park">
    <meta name="keywords" content="properties in lease near me">
    <meta name="keywords" content="Multi Dynamic">
    <meta name="keywords" content="Realestate">
    <meta name="keywords" content="real estate in south sydney">
    <meta name="keywords" content="real estate om sydney">
    <meta name="keywords" content="rent a home">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143430108-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-143430108-5');
    </script>

<div class="top-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-panel-contents">
                    <div class="phone-number-container">
                        <a href="tel:0296186209"><i class="icon fa fa-phone" aria-hidden="true"></i>
                            <span class="phone-number"> Phone No: 02 9618 6209</span>
                        </a>
                    </div>
                    <div class="social-links-container">
                        <ul>
                            <li class="facebook-link social-link-icon"><a href="https://www.facebook.com/Multidynamicauburn/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li class="instragram-link social-link-icon"><a href="https://www.instagram.com/multi.dynamic"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li class="linkedin-link social-link-icon"><a href="https://www.linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>    
    </div>

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
                <a href="{{ url(config('app.corporate_url')) }}" class="navbar-brand">
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
                                <li>
                                        <a href="{{ route('properties.rent', 'rental') }}">{{ "Rental" }}</a>
                                    </li>


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
                                    <li><a href="{!! route('showApplicationForm') !!}" target="_blank">Application Form</a></li>
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
                                <a href="#" class="foot-block-nav" data-toggle="modal" data-target=".bs-example-modal-lg">Book Appraisal</a>

                            </li>
<!---
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.facebook.com/multidynamic" target="_blank"><i class="fa fa-facebook facebook"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.instagram.com/multi.dynamic/" target="_blank"><i class="fa fa-instagram instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://linkedin.com/" target="_blank"><i class="fa fa-linkedin linkedin"></i></a>
                            </li>

                            -->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</header>