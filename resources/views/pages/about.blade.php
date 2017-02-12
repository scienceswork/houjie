@extends('layouts.default')

@section('title', '关于我们')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">关于我们</li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    关于我们
                </div>
            </div>
        </div>
    </div>
@endsection