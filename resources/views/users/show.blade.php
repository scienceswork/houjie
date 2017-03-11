@extends('layouts.default')

@section('title')
    {{ $user->name }} - 个人信息展示
@endsection

@section('body')
    <div class="row">
        <div class="col-md-3">
            {{--个人基础信息--}}
            @include('users.partials._basicInfo')
        </div>
        <div class="col-md-9">
            <div class="box text-center">
                {{ $user->introduction or '这位童鞋很懒，木有签名的说～' }}
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white text-center">
                    社区文章
                </div>
                <div class="panel-body" style="padding: 0 15px;">
                    @if($articles->count())
                        <ul class="list-group row">
                            @foreach($articles as $article)
                                <li class="list-group-item ">
                                    <div style="padding-top: 0;">
                                        <a href="{{ route('web.community.show', $article->id) }}" class="new-title">
                                            {{ $article->title }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="empty-block">没有任何数据~~</div>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white text-center">
                    最新话题
                </div>
                <div class="panel-body" style="padding: 0 15px;">
                    @if($feeds->count())
                        <ul class="list-group row">
                            @foreach($feeds as $feed)
                                <li class="list-group-item">
                                    <div style="padding-top: 0;">
                                        {{ $feed->content }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="empty-block">没有任何数据~~</div>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white text-center">
                    最新评论
                </div>
                <div class="panel-body" style="padding: 0 15px;">
                    @if($replies->count())
                        <ul class="list-group row">
                            @foreach($replies as $reply)
                                <li class="list-group-item">
                                    <div style="padding-top: 0;">
                                        <a href="{{ route('web.community.show', $reply->article_id) }}" class="new-title">
                                            {{ $reply->content }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="empty-block">没有任何数据~~</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection