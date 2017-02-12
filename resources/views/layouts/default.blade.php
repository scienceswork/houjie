<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')后街胡同 - 高品质的高校校园社区@show - 后街胡同
    </title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>
    @section('stylesheet')
        {{--基础css文件--}}
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/validator.css') }}">
    @show
</head>
<body>
<div class="wrap">
    @include('layouts.partials._header')
    <div class="container container-main">
        @yield('body')
    </div>
    @include('layouts.partials._footer')
</div>
@section('javascript')
    {{--基础js文件--}}
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@show
</body>
</html>