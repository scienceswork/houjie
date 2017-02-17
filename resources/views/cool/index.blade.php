@extends('layouts.default')

@section('title', '酷站展示')

@section('javascript')
    @parent
    {{--通过七牛cdn引入瀑布流布局js文件--}}
    <script src="http://jq22.qiniudn.com/masonry-docs.min.js"></script>
    <script src="http://apps.bdimg.com/libs/imagesloaded/3.0.4/imagesloaded.pkgd.js"></script>
    <script>
        $(function () {
            $('.masonry').masonry({
                itemSelector: '.item'
            });
        });
    </script>
@endsection

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
            <div class="row masonry cool-list">
                @foreach($coolSites as $coolSite)
                    <div class="col-md-3 item">
                        <div class="thumbnail">
                            <a href="{{ route('web.cool.show', $coolSite->id) }}">
                                <img src="{{ thumb($coolSite->img_url) }}" alt="">
                            </a>
                            <h2>
                                <a href="{{ route('web.cool.show', $coolSite->id) }}">{{ $coolSite->name }}</a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('web.cool.create') }}" class="btn btn-primary btn-block" style="margin-bottom: 20px;">
                发布酷站
            </a>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        注意事项
                    </h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>基于Yii Framework架构</li>
                    </ul>
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