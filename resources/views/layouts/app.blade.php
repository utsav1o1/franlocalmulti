<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="google-site-verification" content="0cPsDa3kfX0qls1LAJZnUJoKaq72rJ9STJN8NEL2KPo" />

        <?php

        $assetsVersion = 17;

    ?>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{!! env('APP_NAME') !!} Ingleburn</title>
        <meta name="description" content="@yield('meta_description')" />
        <meta name="keywords" content="@yield('meta_keywords')" />
        <meta name="copyright" content="© {!! date('Y-m-d') .' '. env('APP_NAME') !!}" />
        <meta name="author" content="Multidynamic Ingleburn" />
        <meta name="email" content="sales@multidynamic.com.au" />
        <meta name="Distribution" content="Global" />
        <meta name="Rating" content="General" />
        <meta name="Robots" content="INDEX,FOLLOW" />
        <meta name="Revisit-after" content="7 Days" />

        @yield('extra_meta')

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{!! asset('css/inner.css') . '?v=' . $assetsVersion !!}" />
        <link rel="stylesheet" href="{!! asset('css/innerpage.css') . '?v=' . $assetsVersion !!}" />
        <link rel="stylesheet" href="{!! asset('css/slick-theme.min.css') . '?v=' . $assetsVersion !!}" />
        <link rel="stylesheet" href="{!! asset('css/slick.min.css') . '?v=' . $assetsVersion !!}" />
        <link rel="stylesheet" href="{!! asset('css/custom.min.css') . '?v=' . $assetsVersion !!}" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" type="image/ico" href="https://multidynamic.com.au/assets/images/logo/favicon.png" />


        @yield('header_css')
        <script>

            !function(f,b,e,v,n,t,s)

            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?

                n.callMethod.apply(n,arguments):n.queue.push(arguments)};

                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

                n.queue=[];t=b.createElement(e);t.async=!0;

                t.src=v;s=b.getElementsByTagName(e)[0];

                s.parentNode.insertBefore(t,s)}(window, document,'script',

                'https://connect.facebook.net/en_US/fbevents.js');

            fbq('init', '308774951203628');

            fbq('track', 'PageView');

        </script>

        <noscript><img height="1" width="1" style="display:none"

                       src="https://www.facebook.com/tr?id=308774951203628&ev=PageView&noscript=1"

            /></noscript>
{{--        <script>--}}
{{--            ! function (f, b, e, v, n, t, s) {--}}
{{--                if (f.fbq) return;--}}
{{--                n = f.fbq = function () {--}}
{{--                    n.callMethod ?--}}
{{--                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)--}}
{{--                };--}}
{{--                if (!f._fbq) f._fbq = n;--}}
{{--                n.push = n;--}}
{{--                n.loaded = !0;--}}
{{--                n.version = '2.0';--}}
{{--                n.queue = [];--}}
{{--                t = b.createElement(e);--}}
{{--                t.async = !0;--}}
{{--                t.src = v;--}}
{{--                s = b.getElementsByTagName(e)[0];--}}
{{--                s.parentNode.insertBefore(t, s)--}}
{{--            }(window, document, 'script',--}}
{{--                'https://connect.facebook.net/en_US/fbevents.js');--}}
{{--            fbq('init', '945761719624928');--}}
{{--            fbq('track', 'PageView');--}}

{{--        </script>--}}

{{--        <noscript><img height="1" width="1" style="display:none"--}}
{{--                src="https://www.facebook.com/tr?id=945761719624928&ev=PageView&noscript=1" /></noscript>--}}
        <script>
            var rootUrl = "{!! url('') !!}";

        </script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108755403-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-108755403-1');

        </script>

        <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0056/1606.js" async="async" ></script>
    </head>

    <body>

        @yield('bodystart')
        <!--Start of Header-->
        @include('layouts.header')
        <!--Start of Body Part-->
        {{-- @include('layouts.toaster') --}}
        @yield('dynamicdata')

        <!--Start of Footer-->
        @include('layouts.footer')


        <script src="{!! asset('js/all.js') . '?v=' . $assetsVersion !!}"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{!! asset('js/slick.min.js') . '?v=' . $assetsVersion !!}"></script>
        <script src="{!! asset('js/jquery.matchHeight-min.js') . '?v=' . $assetsVersion !!}"></script>
        <script src="{!! asset('js/custom.js') . '?v=' . $assetsVersion !!}"></script>
        <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

        @yield('footer_js')

        <script>
            $(function () {
                $("#location").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "{{ route('api.locations') }}" + '/' + request.term,
                            data: {
                                location: request.term
                            },
                            type: 'get',
                            dataType: "json",
                            success: function (data) {
                                response($.map(data.locations, function (location) {
                                    return {
                                        label: location.location_name,
                                        value: location.id
                                    }
                                }));
                            }
                        });
                    },
                    select: function (event, ui) {
                        $('#location').val(ui.item.label); // display the selected text
                        $('#location_id').val(ui.item.value); // save selected id to input
                        return false;
                    }
                });
            });
            $(document).ready(function () {
                $.fn.delayedHide = function (o) {
                    var e = this;
                    return window.setTimeout(function () {
                        e.hide()
                    }, o || 2500), e
                }

                $("#subscriber_email_address").val(null);
                $('#btn_subscribe').click(function () {
                    document.getElementById('subscriberNotice').innerHTML = "";
                    $("#subscriberNotice").show();
                    var email = document.getElementById('subscriber_email_address').value;
                    var filter =
                        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
                    if (filter.test(email)) {
                        document.getElementById('subscriberNotice').innerHTML = '';
                        $object = $(this);
                        $.ajax({
                            type: "POST",
                            url: rootUrl + "/subscriber",
                            data: {
                                email_address: email,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                $("#subscriber_email_address").val("");
                                document.getElementById('subscriberNotice').innerHTML =
                                    response.message;
                                $("#subscriberNotice").delayedHide();
                                return true;
                            },
                            error: function (e) {
                                document.getElementById('subscriberNotice').innerHTML =
                                    "Server Error.";
                                document.getElementById('subscriberNotice').style.color =
                                    '#F4645F';
                                $("#subscriberNotice").delayedHide();
                                return false;
                            },
                        });
                    } else {
                        document.getElementById('subscriberNotice').innerHTML =
                            'Enter valid email address.';
                        document.getElementById('subscriberNotice').style.color = '#F4645F';
                        $("#subscriberNotice").delayedHide();
                        return false;
                    }
                });

                // property evaluation form submit
                $('.sendPropertyEvaluation').on('click', function (e) {
                    e.preventDefault();
                    var url = "{{route('propertyevaluation')}}";
                    var result = new FormData($("#propertyEvaluationForm")[0]);
                    $.ajax({
                        url: url,
                        data: result,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        beforeSend: function () {
                            $('.sendPropertyEvaluation').prop('disabled', true);
                        },
                        success: function (data) {
                            $('.sendPropertyEvaluation').prop('disabled', false);
                            if (data.status == "success") {
                                window.location.href =
                                    "{{ url('/thank-you') }}"
                            } else {
                                alert('Something went wrong. please try later!')
                            }

                        },
                        error: function (errors) {
                            $('.sendPropertyEvaluation').prop('disabled', false);
                            $("#propertyEvaluationForm span.error").hide();
                            $("#propertyEvaluationForm span.error").text("");
                            $.each(errors.responseJSON.errors, function (i, v) {
                                // console.log('input field '+i+' error '+v[0])
                                $("#propertyEvaluationForm span" + "." + i)
                                    .text(v[0])
                                    .show();
                            });
                        }

                    });
                })
                // property appraisal form submit
                $('.sendPropertyAppraisal').on('click', function (e) {
                    e.preventDefault();
                    var url = "{{route('propertyappraisal')}}";
                    var result = new FormData($("#propertyAppraisalForm")[0]);
                    $.ajax({
                        url: url,
                        data: result,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        beforeSend: function () {
                            $('.sendPropertyAppraisal').prop('disabled', true);
                        },
                        success: function (data) {
                            $('.sendPropertyAppraisal').prop('disabled', false);
                            if (data.status == "success") {
                                window.location.href =
                                    "{{ url('/thank-you') }}"
                            } else {
                                alert('Something went wrong. please try later!')
                            }

                        },
                        error: function (errors) {
                            $('.sendPropertyAppraisal').prop('disabled', false);
                            $("#propertyAppraisalForm span.error").hide();
                            $("#propertyAppraisalForm span.error").text("");
                            $.each(errors.responseJSON.errors, function (i, v) {
                                // console.log('input field '+i+' error '+v[0])
                                $("#propertyAppraisalForm span" + "." + i)
                                    .text(v[0])
                                    .show();
                            });
                        }

                    });
                })
                // buying guide form submit
                $('.sendBuyingGuide').on('click', function (e) {
                    e.preventDefault();
                    var url = "{{route('buyingdownloadguide')}}";
                    var result = new FormData($("#buyingGuideForm")[0]);
                    $.ajax({
                        url: url,
                        data: result,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        beforeSend: function () {
                            $('.sendBuyingGuide').prop('disabled', true);
                        },
                        success: function (data) {
                            $('.sendBuyingGuide').prop('disabled', false);
                            if (data.status == "success") {
                                window.location.href =
                                    "{{ route('downloadguidesuccess') }}"
                            } else {
                                alert('Something went wrong. please try later!')
                            }

                        },
                        error: function (errors) {
                            $('.sendBuyingGuide').prop('disabled', false);
                            $("#buyingGuideForm span.error").hide();
                            $("#buyingGuideForm span.error").text("");
                            $.each(errors.responseJSON.errors, function (i, v) {
                                // console.log('input field '+i+' error '+v[0])
                                $("#buyingGuideForm span" + "." + i)
                                    .text(v[0])
                                    .show();
                            });
                        }

                    });
                })
                // selling fudie form submit
                $('.sendSellingGuide').on('click', function (e) {
                    e.preventDefault();
                    var url = "{{route('sellingdownloadguide')}}";
                    var result = new FormData($("#sellingGuideForm")[0]);
                    $.ajax({
                        url: url,
                        data: result,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        beforeSend: function () {
                            $('.sendSellingGuide').prop('disabled', true);
                        },
                        success: function (data) {
                            $('.sendSellingGuide').prop('disabled', false);
                            if (data.status == "success") {
                                window.location.href =
                                    "{{ route('downloadguidesuccess') }}"
                            } else {
                                alert('Something went wrong. please try later!')
                            }

                        },
                        error: function (errors) {
                            $('.sendSellingGuide').prop('disabled', false);
                            $("#sellingGuideForm span.error").hide();
                            $("#sellingGuideForm span.error").text("");
                            $.each(errors.responseJSON.errors, function (i, v) {
                                // console.log('input field '+i+' error '+v[0])
                                $("#sellingGuideForm span" + "." + i)
                                    .text(v[0])
                                    .show();
                            });
                        }

                    });
                })
                // book an apprasial form submit
                $('.sendBookAppraisal').on('click', function (e) {
                    e.preventDefault();
                    var url = "{{route('appraisal.send')}}";
                    var result = new FormData($("#appraisalForm")[0]);
                    $.ajax({
                        url: url,
                        data: result,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        beforeSend: function () {
                            $('.sendBookAppraisal').prop('disabled', true);
                        },
                        success: function (data) {
                           
                            $('.sendBookAppraisal').prop('disabled', false);
                            if (data.status == "success") {
                                window.location.href ="{{ route('thank-you') }}"
                            } else {
                                alert('Something went wrong. please try later!')
                            }

                        },
                        error: function (errors) {
                            $('.sendBookAppraisal').prop('disabled', false);
                            $("#appraisalForm span.error").hide();
                            $("#appraisalForm span.error").text("");
                            $.each(errors.responseJSON.errors, function (i, v) {
                                // console.log('input field '+i+' error '+v[0])
                                $("#appraisalForm span" + "." + i)
                                    .text(v[0])
                                    .show();
                            });
                        }

                    });
                })

                // on modal close reset validation form
                $('.modal').on('hidden.bs.modal', function () {
                    //reset the form, form validation and the editor
                    $('#sellingGuideForm')[0].reset();
                    $('#buyingGuideForm')[0].reset();
                    $('#appraisalForm')[0].reset();

                    $("#sellingGuideForm span.error").hide();
                    $("#sellingGuideForm span.error").text('');
                    $("#buyingGuideForm span.error").hide();
                    $("#buyingGuideForm span.error").text('');
                    $("#appraisalForm span.error").hide();
                    $("#appraisalForm span.error").text('');

                });

            });

        </script>



    </body>

</html>