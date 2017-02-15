@extends('layouts.default')

@section('title', $news->title)

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.news.index') }}">发现</a></li>
                <li><a href="{{ route('web.news.category', $news->category->slug) }}">{{ $news->category->title }}</a></li>
                <li class="active">{{ $news->title }}</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                {{--新闻内容--}}
                <div class="panel-body">
                    <h1 class="text-center news-title">{{ $news->title }}</h1>
                    <p class="text-center news-info">
                        作者: 无敌的串猪神&nbsp;
                        发布于: <span class="timeago" data-toggle="tooltip" data-placement="top"
                                   data-original-title>{{ $news->created_at }}</span>&nbsp;
                        浏览: {{ $news->view_count }}次&nbsp;
                        评论: {{ $news->reply_count }}条
                    </p>
                    <hr class="news-line">
                    <div class="news-content">
                        {!! $news->content !!}
                    </div>
                </div>
                {{--新闻页脚声明--}}
                <div class="panel-footer">
                    <p class="page-declare">
                        发布日期：<span class="timeago" data-toggle="tooltip" data-placement="top"
                                   data-original-title>{{ $news->created_at }}</span>&nbsp;
                        所属分类：<a href="#">{{ $news->category->title }}</a>
                    </p>
                    <p class="page-declare">
                        标签：
                        <a href="#" class="label label-primary">auth</a>
                        <a href="#" class="label label-primary">Laravel</a>
                        <a href="#" class="label label-primary">异常处理</a>
                        <a href="#" class="label label-primary">认证</a>
                    </p>
                </div>
            </div>
            <div class="box">
                {{--文章声明--}}
                <p class="page-declare">
                    <b>版权声明：</b>
                    本站原创文章，于<span class="timeago" data-toggle="tooltip" data-placement="top"
                                  data-original-title>{{ $news->created_at }}</span>发布
                </p>
                {{--转载说明--}}
                <p class="page-declare">
                    <b>转载声明：</b>
                    <span class="page-info">文章内容由作者原创或整理，未经允许，不得转载！</span>
                </p>
            </div>
            {{--上下篇--}}
            <div class="box">
                <div class="row">
                    <div class="col-md-6" style="border-right: 1px solid #999;">
                        @if($pre_news)
                            <a href="{{ route('web.news.show', $pre_news->id) }}" class="news-button">
                                <i class="glyphicon glyphicon-chevron-left"></i>
                                上一篇<br>
                                {{ $pre_news->title }}
                            </a>
                        @else
                            <span class="news-button">
                                没有了<br>
                                已是第一篇文章了
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        @if($next_news)
                            <a href="{{ route('web.news.show', $next_news->id) }}" class="news-button">
                                下一篇
                                <i class="glyphicon glyphicon-chevron-right"></i><br>
                                {{ $next_news->title }}
                            </a>
                        @else
                            <span class="news-button">
                                没有了<br>
                                已是最新文章了
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div style="height: 400px;"></div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        热门浏览
                    </h3>
                </div>
                <div class="panel-body">
                    @foreach($views as $view)
                        <p><a href="{{ route('web.news.show', $view->id) }}">{{ $view->title }}</a></p>
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        最新报道
                    </h3>
                </div>
                <div class="panel-body">
                    @foreach($lasts as $last)
                        <p><a href="{{ route('web.news.show', $last->id) }}">{{ $last->title }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection