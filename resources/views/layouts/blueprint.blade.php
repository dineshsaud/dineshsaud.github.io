<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="Shortcut Icon" href="favicon.ico">
    <title>Blog Template for Bootstrap</title>
    <link rel="stylesheet" href="{{asset('css/mixed.css')}}">
    <link href="css/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  </head>
  <body>
    @include('layouts.navbar')
    <!--
    <div class="row"> -->
      @yield('content')
      @include('layouts.sidebar')
      @include('layouts.footer')
      
      <script src="{{asset('js/mixed.js')}}"></script>
      @yield("script")
    </body>
    
  </html>