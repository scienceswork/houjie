@extends('layouts.default')

@section('title', '聊天广场')

@section('body')
    {{--隐藏表单--}}
    <form action="{{ route('web.feed.reply') }}" method="post" class="reply-form hidden" style="margin-top: 10px;">
        {{ csrf_field() }}
        <input type="hidden" id="feed_id" class="feed_id" name="feed_id">
        <div class="form-group">
            <textarea name="content" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-primary" value="回复">
        </div>
    </form>
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">广场</li>
            </ul>
        </div>
        {{--左侧说说--}}
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    广场说说
                </div>
                <div class="panel-body">
                    @if($feeds->count())
                        <ul class="media-list feed-list">
                            @foreach($feeds as $feed)
                                <li class="media" data-key="{{ $feed->id }}">
                                    {{--头像--}}
                                    <div class="media-left">
                                        <a href="{{ route('web.users.show', 1) }}">
                                            <img src="{{ avatar_min($feed->user->avatar) }}"
                                                 alt="{{ $feed->user->name }}" class="media-object feed-avatar">
                                        </a>
                                    </div>
                                    {{--说说内容--}}
                                    <div class="media-body">
                                        <div class="media-content">
                                            <a href="{{ route('web.users.show', $feed->user->id) }}"
                                               rel="author">{{ $feed->user->name }}</a>
                                            : {{ $feed->content }}
                                        </div>
                                        <div class="media-action">
                                            <span class="timeago" data-toggle="tooltip" data-placement="right"
                                                  data-original-title>{{ $feed->created_at }}</span>
                                            <span class="pull-right feed-tool">
                                                <a href="javascript:;" class="reply">
                                                    <i class="glyphicon glyphicon-share-alt"></i>
                                                    回复
                                                </a>
                                                {{--判断是否已经点赞过了--}}
                                                <a href="#" class="vote up" data-toggle="tooltip" data-placement="top"
                                                   data-original-title="顶" data-id="{{ $feed->id }}">
                                                    <i class="glyphicon glyphicon-thumbs-up"></i>
                                                    {{ $feed->vote_up_count }}
                                                </a>
                                            </span>
                                        </div>
                                        @if(count($feed->votes))
                                            <div class="ups">
                                                @foreach($feed->votes as $key => $vote)
                                                    @if(count($feed->votes) !== $key+1)
                                                        <a href="{{ route('web.users.show', $vote->user_id) }}">{{ $vote->name }}</a>
                                                        ,
                                                    @else
                                                        <a href="{{ route('web.users.show', $vote->user_id) }}">{{ $vote->name }}</a>
                                                    @endif
                                                @endforeach
                                                觉得很赞
                                            </div>
                                        @endif
                                        {{--判断是否有回复--}}
                                        @if(count($feed->replies))
                                            <div class="hint">共 <em>{{ $feed->rep_count }}</em> 条回复</div>
                                            @foreach($feed->replies as $reply)
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="{{ route('web.users.show', $reply->user_id) }}"
                                                           rel="author">
                                                            <img class="media-object feed-avatar"
                                                                 src="{{ avatar_min($reply->avatar) }}"
                                                                 alt="{{ $reply->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="media-content">
                                                            <a href="{{ route('web.users.show', $reply->user_id) }}"
                                                               rel="author">{{ $reply->name }}</a>
                                                            : {{ $reply->content }}
                                                        </div>
                                                        <div class="media-action">
                                                            <span class="timeago">{{ $reply->created_at }}</span>
                                                            <span class="pull-right feed-tool">
                                                <a class="reply" href="javascript:void(0);">
                                                    <i class="glyphicon glyphicon-share-alt"></i> 回复
                                                </a>
                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>暂时没有小伙伴发表说说哦</p>
                    @endif
                </div>
                @if($feeds->hasPages())
                    <div class="panel-footer text-right">
                        {{ $feeds->links() }}
                    </div>
                @endif
            </div>
        </div>
        {{--右侧发表、热门、精品等--}}
        <div class="col-md-3">
            {{--发布说说--}}
            @include('feed.partials._form')
            {{--精品说说10条--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    精品说说
                </div>
                <div class="panel-body">
                    @if($vote_feeds->count())
                        <ul class="media-list">
                            @foreach($vote_feeds as $vote_feed)
                                <li class="media">
                                    {{--头像--}}
                                    <div class="media-left">
                                        <a href="{{ route('web.users.show', $vote_feed->user->id) }}">
                                            <img src="{{ avatar_min($vote_feed->user->avatar) }}"
                                                 alt="{{ $vote_feed->user->name }}" class="media-object feed-avatar">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-content">
                                            <a href="{{ route('web.users.show', 1) }}">{{ $vote_feed->user->name }}</a>
                                            : {{ $vote_feed->content }}
                                        </div>
                                        <div class="media-action">
                                            <span class="timeago">{{ $vote_feed->created_at }}</span>
                                            <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            {{ $vote_feed->rep_count }}
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            {{ $vote_feed->vote_up_count }}
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p style="margin-bottom: 0;">暂时没有小伙伴发表说说哦~</p>
                    @endif
                </div>
            </div>
            {{--热门说说--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    热门说说
                </div>
                <div class="panel-body">
                    @if($hot_feeds->count())
                        <ul class="media-list">
                            @foreach($hot_feeds as $hot_feed)
                                <li class="media">
                                    {{--头像--}}
                                    <div class="media-left">
                                        <a href="{{ route('web.users.show', $hot_feed->user->id) }}">
                                            <img src="{{ avatar_min($hot_feed->user->avatar) }}"
                                                 alt="{{ $hot_feed->user->name }}" class="media-object feed-avatar">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-content">
                                            <a href="{{ route('web.users.show', $hot_feed->user->id) }}">{{ $hot_feed->user->name }}</a>
                                            : {{ $hot_feed->content }}
                                        </div>
                                        <div class="media-action">
                                            <span class="timeago">{{ $hot_feed->created_at }}</span>
                                            <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            {{ $hot_feed->rep_count }}
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            {{ $hot_feed->vote_up_count }}
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>暂时没有小伙伴发表说说哦~</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection