@extends('layouts.default')

@section('title', '社区')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">社区</li>
            </ul>
        </div>
        <div class="col-md-9 news-all">
            <div class="panel panel-default">
                <div class="panel-body remove-padding-horizontal">
                    @if($articles->count())
                        <ul class="list-group row">
                            @foreach($articles as $article)
                                <li class="list-group-item ">
                                    <a href="{{ route('web.community.show', $article->id) }}"
                                       class="count_area pull-right">
                                        <span>{{ $article->rep_count }}</span>
                                        <span class="count_seperator">/</span>
                                        <span>{{ $article->view_count }}</span>
                                        <span class="count_seperator">|</span>
                                        <span title="" class="timeago">{{ $article->created_at }}</span>
                                    </a>
                                    <div>
                                        <a href="{{ route('web.community.show', $article->id) }}" class="new-title">
                                            {{ $article->title }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>还暂时没有帖子哦~</p>
                    @endif
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('web.community.create') }}" class="btn btn-primary btn-block"
               style="margin-bottom: 20px;">
                发&nbsp;帖
            </a>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    热门话题
                </div>
                <div class="panel-body hot-news">
                    @if($hotArticles->count())
                        @foreach($hotArticles as $hotArticle)
                            <p>
                                <a href="{{ route('web.community.show', $hotArticle->id) }}">{{ $hotArticle->title }}</a>
                            </p>
                        @endforeach
                    @else
                        <p>还暂时没有帖子哦~</p>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    友情社区
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@endsection