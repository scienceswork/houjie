@extends('layouts.default')

@section('title', '用户帮助')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">用户帮助</li>
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
                        用户帮助
                    </h3>
                </div>
                <div class="panel-body">
                    这里是用户帮助
                </div>
            </div>
        </div>
    </div>
@endsection