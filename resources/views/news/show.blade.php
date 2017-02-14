@extends('layouts.default')

@section('title', $news->title)

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.news.index') }}">广场</a></li>
                <li class="active">{{ $news->title }}</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>{{ $news->title }}</h2>
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection