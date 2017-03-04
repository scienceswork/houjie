@extends('layouts.default')

@section('title', $teacher->name . '吧')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.teacher.index') }}">教师在线</a></li>
                <li class="active">{{ $teacher->name }}吧</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white text-center">
                    {{ $teacher->description }}
                </div>
                <div class="panel-body remove-padding-horizontal">
                    {{--判断是否有帖子--}}
                    @if($topics->count())
                        <ul class="list-group row teacher-art">
                            @foreach($topics as $topic)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="rep_num">{{ $topic->rep_count }}</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <p class="art-title">
                                                    <a href="{{ route('web.teacher.topicShow', $topic->id) }}">{{ $topic->name }}</a>
                                                </p>
                                                <a href="#" style="position: absolute;top: 12px;right: 0;"
                                                   class="pull-right art-author">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                    {{ $topic->user->name }}
                                                </a>
                                            </div>
                                            {{--判断是否有用户回复--}}
                                            @if($topic->last_rep_user)
                                                <p class="art-rep">
                                                    {{ $topic->last_rep_content }}
                                                </p>
                                                <a href="#" style="position: absolute;top: 42px;right:0;"
                                                   class="pull-right art-author">
                                                    <i class="glyphicon glyphicon-comment"></i>
                                                    {{ $topic->lastReplyUser->name }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p style="margin: 10px 0;">该教师在线下还暂时没有帖子哦~</p>
                    @endif
                </div>
                {{--判断是否有分页的存在--}}
                @if($topics->lastPage() != 1)
                    <div class="panel-footer text-right">
                        {{ $topics->links() }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            {{--教师在线基础信息--}}
            @include('teacher.partials._teacherInfo')
        </div>
    </div>
@endsection