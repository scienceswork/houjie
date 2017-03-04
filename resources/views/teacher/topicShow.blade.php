@extends('layouts.default')

@section('title', '帖子')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.teacher.index') }}">教师在线</a></li>
                <li><a href="{{ route('web.teacher.show', $teacher->id) }}">{{ $teacher->name }}</a></li>
                <li class="active">{{ $topic->name }}</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title" style="font-weight: normal;">
                        {{ $topic->name }}
                    </h3>
                </div>
                <div class="panel-body">
                    <p class="text-center">
                        楼主：<a href="{{ route('web.users.show', $topic->user->id) }}">{{ $topic->user->name }}</a>&nbsp;&nbsp;
                        时间：<span class="timeago">{{ $topic->created_at }}</span>&nbsp;&nbsp;
                        点击：<span>180</span>&nbsp;&nbsp;
                        回复：<span>{{ $topic->rep_count }}</span>
                    </p>
                    {!! $topic->content !!}
                </div>
            </div>
            <div class="box">
                <p>
                    <i class="glyphicon glyphicon-edit"></i>
                    发表评论
                </p>
                <form action="{{ route('web.teacher.topicReplyStore', $topic->id) }}" class="form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="reply" style="height: 100px;" class="form-control"
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
                                {{ $reply->reply }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-3">
            {{--教师在线基础信息--}}
            @include('teacher.partials._teacherInfo')
        </div>
    </div>
@endsection