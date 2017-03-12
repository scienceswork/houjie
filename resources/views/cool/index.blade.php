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
                @if($coolSites->count())
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
                @else
                    <p>还没有小伙伴发布酷站哦~</p>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('web.cool.create') }}" class="btn btn-primary btn-block" style="margin-bottom: 20px;">
                发布酷站
            </a>
            {{--注意事项--}}
            @include('cool.partials._notice')
            {{--热门酷站10条--}}
            @include('cool.partials._hots')
            {{--贡献小伙伴--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        贡献小伙伴
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="avatar-list">
                        @foreach($coolUsers as $coolUser)
                            <li data-toggle="tooltip" data-placement="top"
                                data-original-title="{{ $coolUser->user->name }}">
                                <a href="{{ route('web.users.show', $coolUser->user->id) }}">
                                    <img src="{{ avatar_min($coolUser->user->avatar) }}" alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection