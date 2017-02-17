@extends('layouts.default')

@section('title', $coolSite->name)

@section('body')

    <div class="row cool-container">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.cool.index') }}">酷站</a></li>
                <li class="active">{{ $coolSite->name }}</li>
            </ul>
        </div>
        {{--酷站展示--}}
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        {{ $coolSite->name }}
                    </h2>
                    <hr>
                    <p class="cool-info">
                        <i class="glyphicon glyphicon-user"></i>
                        {{ $coolSite->user->name }}&nbsp;&nbsp;&nbsp;&nbsp;
                        {{ $coolSite->created_at }}&nbsp;&nbsp;&nbsp;&nbsp;
                        {{ $coolSite->view }}次浏览&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="glyphicon glyphicon-paperclip"></i>
                        <a href="{{ $coolSite->url }}" target="_blank">{{ $coolSite->url }}</a>
                    </p>
                    <hr>
                    <div class="thumbnail">
                        <img src="{{ img($coolSite->img_url) }}" alt="{{ $coolSite->name }}">
                    </div>
                    <p style="text-indent: 2em;">
                        {{ $coolSite->description }}
                    </p>
                </div>
            </div>
        </div>
        {{--发布者信息--}}
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    发布者信息
                </div>
            </div>
            <a href="{{ route('web.cool.create') }}" class="btn btn-primary btn-block" style="margin-bottom: 20px;color:#fff;">
                发布酷站
            </a>
            {{--注意事项--}}
            @include('cool.partials._notice')
            {{--热门酷站10条--}}
            @include('cool.partials._hots')
        </div>
    </div>
@endsection