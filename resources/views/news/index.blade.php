@extends('layouts.default')

@section('title', '发现')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">发现</li>
            </ul>
        </div>
    </div>
@endsection