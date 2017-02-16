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
                <div class="panel-heading panel-white">
                    <ul class="list-inline news-nav">
                        <li data-toggle="tooltip" data-placement="top" data-original-title="最后回复排序" title="">
                            <a href="#" class="active">活跃</a>
                        </li>
                        <li>
                            <a href="#">精华</a>
                        </li>
                        <li>
                            <a href="#">最近</a>
                        </li>
                        <li>
                            <a href="#">零回复</a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body remove-padding-horizontal">
                    @if($news)
                        <ul class="list-group row">
                            @foreach($news as $new)
                                <li class="list-group-item ">
                                    <a href="{{ route('web.news.show', $new->id) }}" class="count_area pull-right">
                                        <span>18</span>
                                        <span class="count_seperator">/</span>
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
                <div class="panel-footer text-right" style="background-color:#fcfcfc;">
                    {{--分页--}}
                    {{ $news->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        所有分类
                    </h3>
                </div>
                <div class="panel-body">
                    {{--获得所有分类--}}
                    @if($categories)
                        @foreach($categories as $category)
                            <p>
                                <a href="{{ route('web.news.category', $category->slug) }}">{{ $category->title }}</a>
                            </p>
                        @endforeach
                    @else
                        管理员太懒了，还没有创建分类~
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        热门资讯
                    </h3>
                </div>
                <div class="panel-body">
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