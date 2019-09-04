<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','微博')-{{ config('app.name', '微博') }}</title>
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href="http://ued.com/assets/css/all.min.css">
</head>
<body>
@include('layouts._header')
 <div class="container" id="app">
    @include('shared._message')
    @yield('content')
    @include('layouts._footer')
</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('script')
</body>
</html>