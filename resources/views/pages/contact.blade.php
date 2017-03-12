@extends('layouts.default')

@section('title', '联系我们')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">联系我们</li>
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
                        联系我们
                    </h3>
                </div>
                <div class="panel-body site-content">
                    <ul>
                        {{--<li>--}}
                            {{--<strong>电话：</strong>0769-33554401--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<strong>传真：</strong>0769-33554401--}}
                        {{--</li>--}}
                        <li>
                            <strong>邮箱：</strong>261864844@qq.com
                        </li>
                        {{--<li>--}}
                            {{--<strong>服务热线：</strong>400-998-5212--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<strong>QQ交流群：</strong>2227533225--}}
                        {{--</li>--}}
                        <li>
                            <strong>地址：</strong>深圳市福田区华强北街道赛格科技园4栋西9楼A座A19
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection