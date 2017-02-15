@extends('layouts.default')

@section('title', $category->title)

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.news.index') }}">发现</a></li>
                <li class="active">{{ $category->title }}</li>
            </ul>
        </div>
        <div class="col-md-9"></div>
        <div class="col-md-3"></div>
    </div>
@endsection