@extends('layouts.default')

@section('title', '我的社区')

@section('body')
    <div class="row users-show">
        <div class="col-md-3">
            {{--设置菜单--}}
            @include('users.partials._settingNav')
        </div>
        <div class="col-md-9 news-all">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        我的社区
                    </h3>
                </div>
                <div class="panel-body remove-padding-horizontal">
                    <ul class="list-group row">
                        @if($articles->count())
                            @foreach($articles as $article)
                                <li class="list-group-item ">
                                    <a href="{{ route('web.users.articleDel', $article->id) }}" class="count_area pull-right btn btn-danger"
                                       style="width: auto;color:#fff;">
                                        删除
                                    </a>
                                    <div>
                                        <a href="{{ route('web.community.show', $article->id) }}" class="new-title">
                                        <span class="label label-default hidden-xs"
                                              style="position: relative;top: -1px;font-size:12px;font-weight: normal;background-color: #e5e5e5;color: #999;padding: .2em .6em .3em;    box-sizing: border-box;">在线兼职</span>
                                            {{ $article->title }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div class="empty-block">没有任何数据~~</div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection