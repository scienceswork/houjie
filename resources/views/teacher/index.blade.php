@extends('layouts.default')

@section('title', '教师在线')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">教师在线</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body teacher-item">
                    @if($teachers->count())
                        <div class="row">
                            @foreach($teachers as $teacher)
                                <div class="col-md-6">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('web.teacher.show', $teacher->id) }}">
                                                <img class="teacher-avatar"
                                                     src="{{ thumb($teacher->avatar) }}"
                                                     alt="{{ $teacher->name }}吧">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="teacher-name">
                                                <p>
                                                    @if($teacher->is_recommend)
                                                        <span class="badge">推荐</span>
                                                    @endif
                                                    <a href="{{ route('web.teacher.show', $teacher->id) }}">
                                                        {{ $teacher->name }}吧
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="teacher-description">
                                                <p>
                                                    {{ $teacher->description }}
                                                </p>
                                            </div>
                                            <div class="teacher-num">
                                                <p>
                                                    {{--<i class="glyphicon glyphicon-user"></i> {{ $teacher->member_count }}--}}
                                                    &nbsp;&nbsp;
                                                    <i class="glyphicon glyphicon-comment"></i> {{ $teacher->articles_count }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>暂时还没有教师发布了教师在线哦~</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @if(Auth::check())
                {{--已经登录的账户且没有申请教师在线的用户会显示按钮--}}
                <a href="{{ route('web.teacher.create') }}" class="btn btn-primary btn-block"
                   style="margin-bottom: 20px;">
                    创建在线
                </a>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        教师在线
                    </h3>
                </div>
                <div class="panel-body">
                    <p class="text-indent">
                        教师在线应用主要针对高校教师，能让高校教师提供一个类似百度贴吧的应用，学生关注在线后，可以在在线里面发帖咨询高校教师，高校教师可以选择创建在线，创建一个专属于你的教师论坛，方便学生咨询或者发布任务。
                    </p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        热门教师在线
                    </h3>
                </div>
                <div class="panel-body">
                    @if($hot_teachers->count())
                        <ul class="teacher-ul">
                            @foreach($hot_teachers as $hot_teacher)
                                <li>
                                    <a href="{{ route('web.teacher.show', $hot_teacher->id) }}">
                                        <strong>{{ $hot_teacher->name }}</strong>
                                        @if($hot_teacher->is_recommend)
                                            <span class="badge">推荐</span>
                                        @endif
                                        <span class="pull-right">
                                            <i class="glyphicon glyphicon-comment"></i> {{ $teacher->articles_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p style="margin-bottom: 0; ">暂时还没有教师发布了教师在线哦~</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection