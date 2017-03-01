@extends('layouts.default')

@section('title', '创建在线')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">创建在线</li>
            </ul>
        </div>
    </div>
@endsection