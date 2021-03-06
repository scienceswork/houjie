@extends('layouts.default')

@section('stylesheet')
    @parent
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1 class="ht-panel-title">
                                <span class="active">活跃</span>、
                                <span class="professional">专业</span>、
                                <span class="know">最懂你</span>
                                的高校生活资讯平台
                            </h1>
                            <h2 class="ht-panel-second-title">
                                后街胡同是粤东地区最为活跃的大学生生活资讯社交平台。
                            </h2>
                            <p>
                                后街胡同 自带了 丰富的功能，包括 情书，教师在线，新闻，用户发帖，酷站展示，广场聊天，签到等，可大大丰富大学生的高校生活，便捷地找到你想要的资讯。
                            </p>
                            {{--<div class="row">--}}
                                {{--<div class="col-md-5">--}}
                                    {{--<a href="#" class="btn btn-danger">使用教程</a>--}}
                                    {{--<a href="/protocol" class="btn btn-success">用户协议</a>--}}
                                    {{--<a href="#" class="btn btn-primary">商务合作</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<p>--}}
                                        {{--<span class="pull-right">--}}
                                            {{--v1.0.1版发布于2017年03月10日--}}
                                        {{--</span>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-white">
                            <i class="glyphicon glyphicon-share"></i>
                            最新动态
                            <a href="{{ route('web.news.index') }}" class="pull-right">
                                更多»
                            </a>
                        </div>
                        <div class="panel-body hot-news">
                            <div class="row">
                                @if($new_news->count())
                                    <div class="col-md-6" style="border-right: 1px solid #eee;">
                                        @foreach($new_news as $key => $new)
                                            @if($key % 2 == 0)
                                                <p>
                                                    <a href="{{ route('web.news.show', $new->id) }}">{{ $new->title }}</a>
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($new_news as $key => $new)
                                            @if($key % 2 != 0)
                                                <p>
                                                    <a href="{{ route('web.news.show', $new->id) }}">{{ $new->title }}</a>
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <p style="margin: 0 15px;">暂时没有新闻发布哦~</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-white">
                            <i class="glyphicon glyphicon-erase"></i>
                            热门帖子
                            <a href="{{ route('web.community.index') }}" class="pull-right">
                                更多»
                            </a>
                        </div>
                        <div class="panel-body hot-news">
                            <div class="row">
                                @if($communities->count())
                                    <div class="col-md-6" style="border-right: 1px solid #eee;">
                                        @foreach($communities as $key => $community)
                                            @if($key % 2 == 0)
                                                <p>
                                                    <a href="{{ route('web.community.show', $community->id) }}">{{ $community->title }}</a>
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($communities as $key => $community)
                                            @if($key % 2 != 0)
                                                <p>
                                                    <a href="{{ route('web.community.show', $community->id) }}">{{ $community->title }}</a>
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <p style="margin: 0 15px;">暂时没有帖子发布哦~</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-white">
                            <i class="glyphicon glyphicon-leaf"></i>
                            最新在线
                        </div>
                        <div class="panel-body hot-news">
                            @if($topics->count())
                                @foreach($topics as $topic)
                                    <p>
                                        <a href="{{ route('web.teacher.topicShow', $topic->id) }}">{{ $topic->name }}</a>
                                    </p>
                                @endforeach
                            @else
                                <p style="margin-bottom: 0;">暂时还没有教师在线帖子哦~</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-white">
                            <i class="glyphicon glyphicon-fire"></i>
                            十大热门新闻
                        </div>
                        <div class="panel-body hot-news">
                            @if($news->count())
                                @foreach($news as $new)
                                    <p>
                                        <a href="{{ route('web.news.show', $new->id) }}">{{ $new->title }}</a>
                                    </p>
                                @endforeach
                            @else
                                <p style="margin-bottom: 0;">管理员太懒了，还没有新闻哦~</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            {{--签到--}}
            {{--<div class="btn-group btn-group-full">--}}
                {{--<a href="#" class="btn btn-success" id="sign">--}}
                    {{--<i class="glyphicon glyphicon-calendar" style="font-size: 30px;float: left;margin-top: 3px;"></i>--}}
                    {{--点此处签到<br>--}}
                    {{--签到有好礼--}}
                {{--</a>--}}
                {{--<a href="#" class="btn btn-primary">--}}
                    {{--{{ date('Y年m月d日') }}<br>--}}
                    {{--已有180人签到--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--聊天广场--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    聊天广场
                    <span class="pull-right">
                        <a class="btn btn-xs" href="{{ route('web.feed.index') }}">更多»</a>
                    </span>
                </div>
                <div class="panel-body">
                    {{--发布说说--}}
                    @include('feed.partials._form')
                    {{--聊天列表--}}
                    <div class="feed">
                        <div class="nano">
                            <ul class="nano-content media-list">
                                @if($feeds->count())
                                    @foreach($feeds as $feed)
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="{{ route('web.users.show', $feed->user_id) }}">
                                                    <img class="media-object"
                                                         src="{{ avatar_min($feed->user->avatar) }}"
                                                         alt="{{ $feed->user->name }}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-content">
                                                    <a href="{{ route('web.users.show', $feed->user_id) }}">{{ $feed->user->name }}</a>: {{ $feed->content }}
                                                </div>
                                                <div class="media-action">
                                                <span class="timeago" data-toggle="tooltip" data-placement="top"
                                                      data-original-title>{{ $feed->created_at }}</span>
                                                    {{--<span class="pull-right">--}}
                                                {{--<i class="glyphicon glyphicon-comment"></i> {{ $feed->rep_count }}--}}
                                                        {{--&nbsp;--}}
                                                {{--<i class="glyphicon glyphicon-thumbs-up"></i> {{ $feed->vote_up_count }}--}}
                                            {{--</span>--}}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <p>暂时没有小伙伴发起说说哦~</p>
                                @endif
                            </ul>
                            <div class="nano-pane">
                                <div class="nano-slider" style="height: 21px; transform: translate(0px, 0px);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--最新注册用户--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    最新用户
                </div>
                <div class="panel-body">
                    @if($users->count())
                        @foreach($users as $user)
                            <a data-toggle="tooltip" data-placement="top" data-original-title="{{ $user->name }}"
                               href="{{ route('web.users.show', $user->id) }}"
                               style="width: 50px;height:50px;display: inline-block;">
                                <img style="width: 100%; height: 100%;padding:2px;"
                                     src="{{ avatar_min($user->avatar) }}" alt="{{ $user->name }}">
                            </a>
                        @endforeach
                    @else
                        <p>暂时没有用户注册哦~</p>
                    @endif
                </div>
            </div>
            {{--友情社区--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    友情社区
                </div>
                <div class="panel-body">
                    @if($links->count())
                        <ul class="list-group">
                            @foreach($links as $link)
                                <li class="list-group-item">
                                    <a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>管理员太孤独了，暂时没有友情链接哦~</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
