<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}- @yield('title')</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iconic-fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconic-fonts/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
     <!-- Date picker -->
     <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css')}}">
    <!-- jQuery UI -->
    <link href="{{ asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/slick.css')}}" rel="stylesheet">
      <link href="{{ asset('assets/css/select2.min.css')}}" rel="stylesheet">
    <!-- Mystic styles -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/logoIcon.png')}}">

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('assets/css/selectstyle.css')}}" rel="stylesheet" type="text/css">

</head>