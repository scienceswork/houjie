@extends('layouts.default')

@section('title', $news->title)

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.news.index') }}">发现</a></li>
                <li><a href="{{ route('web.news.category', $news->category->slug) }}">{{ $news->category->title }}</a>
                </li>
                <li class="active">{{ $news->title }}</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                {{--新闻内容--}}
                <div class="panel-body" style="padding:20px;">
                    <h1 class="text-center news-title">{{ $news->title }}</h1>
                    <p class="text-center news-info">
                        作者: {{ $news->author }}
                        发布于: <span class="timeago" data-toggle="tooltip" data-placement="top"
                                   data-original-title>{{ $news->created_at }}</span>&nbsp;
                        浏览: {{ $news->view_count }}次&nbsp;
                        评论: {{ $news->reply_count }}条
                    </p>
                    <hr class="news-line">
                    <div class="news-content">
                        {!! $news->content !!}
                    </div>
                    @include('layouts.partials._share')
                </div>
                {{--新闻页脚声明--}}
                <div class="panel-footer">
                    <p class="page-declare">
                        发布日期：<span class="timeago" data-toggle="tooltip" data-placement="top"
                                   data-original-title>{{ $news->created_at }}</span>&nbsp;
                        所属分类：<a href="#">{{ $news->category->title }}</a>
                    </p>
                    {{--<p class="page-declare">--}}
                        {{--标签：--}}
                        {{--<a href="#" class="label label-primary">auth</a>--}}
                        {{--<a href="#" class="label label-primary">Laravel</a>--}}
                        {{--<a href="#" class="label label-primary">异常处理</a>--}}
                        {{--<a href="#" class="label label-primary">认证</a>--}}
                    {{--</p>--}}
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
            {{--评论表单--}}
            <div class="box">
                {{--引入错误信息提示--}}
                @include('layouts.partials._errors')
                <p>
                    <i class="glyphicon glyphicon-edit"></i>
                    发表评论
                </p>
                <form action="{{ route('web.news.reply', $news->id) }}" class="form" method="post" novalidate="">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="content" style="height: 100px;" class="form-control"
                                  placeholder="@if(Auth::check()) 请文明用语~ @else 登录后才能发表评论哦~ @endif"
                                  @if(!Auth::check()) disabled @endif></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="提交评论" @if(!Auth::check()) disabled @endif>
                    </div>
                </form>

            </div>
            {{--评论列表--}}
            @if($replies->count())
                @foreach($replies as $key => $reply)
                    <div class="box">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ avatar_min($reply->user->avatar) }}"
                                     style="width: 40px; height: 40px;padding:2px;border: 1px solid #999;">
                            </div>
                            <div class="media-body">
                                <p class="media-title" style="margin: 0;font-weight: bold;">
                                    {{ $reply->user->name }}
                                    <span class="pull-right">第{{ $replies->count() - $key }}楼</span>
                                </p>
                                <p>
                                    <span class="timeago">{{ $reply->created_at }}</span>
                                </p>
                            </div>
                            <p style="margin: 0;">
                                {{ $reply->content }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        热门资讯
                    </h3>
                </div>
                <div class="panel-body hot-news">
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
                <div class="panel-body hot-news">
                    @foreach($lasts as $last)
                        <p><a href="{{ route('web.news.show', $last->id) }}">{{ $last->title }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection