@extends('layouts.default')

@section('title', $user->name . '发布的文章')

@section('body')
    <div class="row">
        <div class="col-md-3">
            {{--个人基础信息--}}
            @include('users.partials._basicInfo')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white text-center">
                    {{ $user->name }}发布的所有文章
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
                @if($articles->hasPages())
                    <div class="panel-footer text-right" style="background-color:#fcfcfc;">
                        {{--分页--}}
                        {{ $articles->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection