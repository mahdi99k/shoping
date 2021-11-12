<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="client/image/favicon.png" rel="icon"/>
    <title>مارکت شاپ - قالب HTML فروشگاهی</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="client/js/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="client/js/bootstrap/css/bootstrap-rtl.min.css"/>
    <link rel="stylesheet" type="text/css" href="client/css/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="client/css/stylesheet.css"/>
    <link rel="canonical" href="http://www.onescript.ir"/>
    <link rel="stylesheet" type="text/css" href="client/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="client/css/owl.transitions.css"/>
    <link rel="stylesheet" type="text/css" href="client/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="client/css/stylesheet-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="client/css/responsive-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="client/css/stylesheet-skin2.css"/>

    <!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">

    <div id="header">

        <!-- Top Bar Start-->
        @include('client.partials.childHeader._navbarTop')
        <!-- Top Bar End-->

        <!-- Header Row Start-->
        @include('client.partials.childHeader._headerRow')
        <!-- Header Row End-->

        <!-- Main آقایانu Start-->
        @include('client.partials.childHeader._navbar' , ['categories' => $categories , 'brands' => $brands])
        <!-- Main آقایانu End-->

    </div>

</div>
