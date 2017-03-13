@extends('layouts.default')

@section('title', '社区帖子')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.community.index') }}">社区</a></li>
                <li class="active">{{ $article->title }}</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    {{ $article->title }}
                </div>
                <div class="panel-body">
                    <p class="text-center">
                        楼主：<a href="{{ route('web.users.show', $article->user->id) }}">{{ $article->user->name }}</a>&nbsp;&nbsp;
                        时间：<span class="timeago">{{ $article->created_at }}</span>&nbsp;&nbsp;
                        点击：<span>{{ $article->view_count }}</span>&nbsp;&nbsp;
                        回复：<span>{{ $article->rep_count }}</span>
                    </p>
                    <div class="news-content">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
            {{--评论--}}
            <div class="box">
                <p>
                    <i class="glyphicon glyphicon-edit"></i>
                    发表评论
                </p>
                <form action="{{ route('web.community.replyStore', $article->id) }}" class="form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="content" style="height: 100px;" class="form-control"
                                  placeholder="请文明用语~"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="提交评论">
                    </div>
                </form>

            </div>
            {{--判断是否有评论--}}
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
                                    <span class="pull-right">第{{ $key+1 }}楼</span>
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
                <div class="panel-heading panel-white text-center">
                    作者：{{ $article->user->name }}
                </div>
                <div class="panel-body text-center">
                    <a href="{{ route('web.users.show', $article->user->id) }}">
                        <img src="{{ avatar_min($article->user->avatar) }}"
                             alt="{{ $article->user->name }}"
                             style="width: 80px; height: 80px; margin: 5px;"
                             class="avatar">
                    </a>
                    <p>
                        {{ $article->user->introduction }}
                    </p>
                    <hr>
                    <div class="follow-info row text-center">
                        <div class="col-xs-4">
                            <a href="#" class="counter">180<br>关注者</a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="counter">25<br>粉丝</a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="counter">1<br>文章</a>
                        </div>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-primary text-center btn-block">关注TA</a>
                </div>
            </div>
        </div>
    </div>
@endsection