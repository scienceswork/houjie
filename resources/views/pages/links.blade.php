@extends('layouts.default')

@section('title', '友情链接')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">友情链接</li>
            </ul>
        </div>
        <div class="col-md-3">
            {{--导入菜单--}}
            @include('pages.partials._siteTool')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        友情链接
                    </h3>
                </div>
                <div class="panel-body">
                    这里是友情链接
                </div>
            </div>
        </div>
    </div>
@endsection