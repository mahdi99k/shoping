<!DOCTYPE html>
<html dir="rtl">
<head>

    <head>
        ...
        <!-- IMPORTANT!!! remember CSRF token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src='https://www.google.com/recaptcha/api.js?explicit&hl=fa'></script> {{-- custom code persian recaptcha --}}
        ...
        <script type="text/javascript">
            function callbackThen(response){
                // read HTTP status
                console.log(response.status);

                // read Promise object
                response.json().then(function(data){
                    console.log(data);
                });
            }
            function callbackCatch(error){
                console.error('Error:', error)
            }
        </script>
        ...
        {!! htmlScriptTagJsApi([    //htmlScriptTagJsApiV3 | {!! !! } security low in | {{}} strong
            //'action' => 'homepage',
            'callback_then' => 'callbackThen',
            'callback_catch' => 'callbackCatch'
        ]) !!}

    </head>

    <style>
        .like {
            color: red;
        }
    </style>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="client/image/favicon.png" rel="icon"/>
    <title>@yield('titleWeb')</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap-rtl.min.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet.css"/>
    <link rel="canonical" href="http://www.onescript.ir"/>
    <link rel="stylesheet" type="text/css" href="/client/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/owl.transitions.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/responsive-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet-skin2.css"/>

@yield('links')

<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">

    <div id="header">

        <!-- Top Bar Start-->
    @include('client.layouts.childHeader._navbarTop')
    <!-- Top Bar End-->

        <!-- Header Row Start-->
    @include('client.layouts.childHeader._headerRow')
    <!-- Header Row End-->

        <!-- Main آقایانu Start-->
    @include('client.layouts.childHeader._navbar' , ['categories' => $categories , 'brands' => $brands])
    <!-- Main آقایانu End-->

    </div>

</div>
