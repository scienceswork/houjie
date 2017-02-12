@extends('layouts.default')

@section('title', '酷站展示')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">酷站</li>
            </ul>
        </div>
        {{--酷站，瀑布流--}}
        <div class="col-md-9">

        </div>
        <div class="col-md-3">
            <a class="btn btn-primary btn-block" style="margin-bottom: 20px;">
                发布酷站
            </a>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        注意事项
                    </h3>
                </div>
                <div class="panel-body">
                    这里是注意事项
                </div>
            </div>
            {{--热门酷站10条--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        热门酷站
                    </h3>
                </div>
                <div class="panel-body">
                    这里是热门酷站
                </div>
            </div>
            {{--贡献小伙伴--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        贡献小伙伴
                    </h3>
                </div>
                <div class="panel-body">
                    这里是贡献小伙伴
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection