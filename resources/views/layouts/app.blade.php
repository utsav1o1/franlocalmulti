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

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{!! asset('css/inner.css') . '?v=' . $assetsVersion !!}" />
        <link rel="stylesheet" href="{!! asset('css/innerpage.css') . '?v=' . $assetsVersion !!}" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" type="image/ico" href="https://multidynamic.com.au/assets/images/logo/favicon.png" />

        @yield('header_css')

        <script>
            var rootUrl = "{!! url('') !!}";
        </script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108755403-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-108755403-1');
        </script>
    </head>

    <body>

        @yield('bodystart')
        <!--Start of Header-->
        @include('layouts.header')
        <!--Start of Body Part-->
        @yield('dynamicdata')

        <!--Start of Footer-->
        @include('layouts.footer')

        <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        @yield('footer_js')

        <script>
            $( function() {
            $( "#location" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "{{ route('api.locations') }}"+'/'+request.term,
                        data: {location:request.term},
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response( $.map( data.locations, function( location ) {
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
        $(document).ready(function() {
            $.fn.delayedHide=function(o){var e=this;return window.setTimeout(function(){e.hide()},o||2500),e}

            $("#subscriber_email_address").val(null);
            $('#btn_subscribe').click(function(){
                document.getElementById('subscriberNotice').innerHTML = "";
                $("#subscriberNotice").show();
                var email = document.getElementById('subscriber_email_address').value;
                var filter = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
                if (filter.test(email)) {
                    document.getElementById('subscriberNotice').innerHTML = '';
                    $object = $(this);
                    $.ajax({
                        type: "POST",
                        url: rootUrl+"/subscriber",
                        data:{email_address:email, _token:'{{ csrf_token() }}' },
                        success: function(response){
                            $("#subscriber_email_address").val("");
                            document.getElementById('subscriberNotice').innerHTML = response.message;
                            $("#subscriberNotice").delayedHide();
                            return true;
                        },
                        error: function(e){
                            document.getElementById('subscriberNotice').innerHTML = "Server Error.";
                            document.getElementById('subscriberNotice').style.color = '#F4645F';
                            $("#subscriberNotice").delayedHide();
                            return false;
                        },
                    });
                } else {
                    document.getElementById('subscriberNotice').innerHTML = 'Enter valid email address.';
                    document.getElementById('subscriberNotice').style.color = '#F4645F';
                    $("#subscriberNotice").delayedHide();
                    return false;
                }
            });
        });
        </script>
        <script src="{!! asset('js/slick.min.js') . '?v=' . $assetsVersion !!}"></script>
        <script src="{!! asset('js/jquery.matchHeight-min.js') . '?v=' . $assetsVersion !!}"></script>
        <script src="{!! asset('js/custom.js') . '?v=' . $assetsVersion !!}"></script>

    </body>

</html>