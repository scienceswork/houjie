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
        <div class="col-md-9 news-all">
            <div class="panel panel-default">
                <div class="panel-body remove-padding-horizontal">
                    @if($news)
                        <ul class="list-group row">
                            @foreach($news as $new)
                                <li class="list-group-item ">
                                    <a href="{{ route('web.news.show', $new->id) }}" class="count_area pull-right">
                                        <span>{{ $new->reply_count }}</span>
                                        <span class="count_seperator">/</span>
                                        <span>{{ $new->view_count }}</span>
                                        <span class="count_seperator">|</span>
                                        <span title="" class="timeago">{{ $new->created_at }}</span>
                                    </a>
                                    <div>
                                        <a href="{{ route('web.news.show', $new->id) }}" class="new-title">
                                            {{ $new->title }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p style="margin: 0;">管理员太懒啦，还暂时没有资讯~</p>
                    @endif
                </div>
                {{--判断是否有分页--}}
                @if($news->hasPages())
                    <div class="panel-footer text-right" style="background-color:#fcfcfc;">
                        {{--分页--}}
                        {{ $news->links() }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    所有分类
                </div>
                <div class="panel-body">
                    @include('news.partials._allCategory')
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    热门资讯
                </div>
                <div class="panel-body hot-news">
                    @foreach($hots as $hot)
                        <p>
                            <a href="{{ route('web.news.show', $hot->id) }}">{{ $hot->title }}</a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection