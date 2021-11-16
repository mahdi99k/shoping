<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>@yield('title')</title>
{{--    <link rel="stylesheet" href="/admin/css/style.css">--}}
    <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}">
    <link rel="stylesheet" href="/admin/css/responsive_991.css" media="(max-width:991px)">
    <link rel="stylesheet" href="/admin/css/responsive_768.css" media="(max-width:768px)">
    <link rel="stylesheet" href="/admin/css/font.css">

    @yield('links')
</head>
<body>
