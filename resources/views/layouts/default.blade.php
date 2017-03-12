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
        <link rel="stylesheet" href="{{ asset('assets/nanoscroller/bin/css/nanoscroller.css') }}">
    @show
    {{--百度统计代码--}}
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?54eb2b84ce5036267a2278fadfe9ca46";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
<div class="wrap">
    @include('layouts.partials._header')
    <div class="container container-main">
        @include('flash.message')
        {{--判断邮箱是否激活，未激活不可使用平台--}}
        @if(Auth::check() && !Auth::user()->verified)
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                该邮箱未激活，请前往 {{ Auth::user()->email }} 查收激活邮件，激活后才能完整地使用后街胡同功能。如果未收到邮件，请前往 <a href="javascript:$('#email-verification-required-form').submit();">重发邮件</a> 。
            </div>
            <form method="POST" id="email-verification-required-form" action="{{route('users.send-verification-mail')}}"
                  accept-charset="UTF-8">
                {!! csrf_field() !!}
            </form>
        @endif
        @yield('body')
    </div>
    @include('layouts.partials._footer')
</div>
@section('javascript')
    {{--基础js文件--}}
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{--代码高亮--}}
    {{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>--}}
    {{--<script>--}}
    {{--$(document).ready(function() {--}}
    {{--$('pre code').each(function(i, block) {--}}
    {{--hljs.highlightBlock(block);--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@show
</body>
</html>