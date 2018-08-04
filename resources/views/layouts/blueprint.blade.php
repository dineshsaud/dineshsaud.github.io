<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link rel="icon" href="{!! asset('images/img_3.jpg') !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="Shortcut Icon" href="favicon.ico">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset('css/mixed.css')}}">
    <link href="css/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
  </head>

  <body>
    @include('layouts.navbar')
    <!--
    <div class="row"> -->
      @yield('content')
      @include('layouts.footer')
      <script src="{{asset('js/mixed.js')}}"></script>
      @yield("script")
    </body>
    
  </html>