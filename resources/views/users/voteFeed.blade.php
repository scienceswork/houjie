@extends('layouts.default')

@section('title', $user->name . '发布的话题')

@section('body')
    <div class="row">
        <div class="col-md-3">
            {{--个人基础信息--}}
            @include('users.partials._basicInfo')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white text-center">
                    {{ $user->name }}发布的所有话题
                </div>
                <div class="panel-body" style="padding: 0 15px;">
                    @if($votes->count())
                        <ul class="list-group row">
                            @foreach($votes as $vote)
                                <li class="list-group-item ">
                                    <div style="padding-top: 0;">
                                            {{ $vote->feed->content }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="empty-block">没有任何数据~~</div>
                    @endif
                </div>
                @if($votes->hasPages())
                    <div class="panel-footer text-right" style="background-color:#fcfcfc;">
                        {{--分页--}}
                        {{ $votes->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection