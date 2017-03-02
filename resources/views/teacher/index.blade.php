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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="teacher-avatar"
                                             src="http://www.scienceswork.com/wp-content/uploads/2016/10/chuanzhushen_avatar-96x96.jpg"
                                             alt="佘老师吧">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="teacher-name">
                                        <p>
                                            <span class="badge">推荐</span>
                                            <a href="#">佘老师吧</a>
                                        </p>
                                    </div>
                                    <div class="teacher-description">
                                        <p>
                                            学期过半，继续努力，天天向上
                                        </p>
                                    </div>
                                    <div class="teacher-num">
                                        <p>
                                            <i class="glyphicon glyphicon-user"></i> 3240 &nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-comment"></i> 10234
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="teacher-avatar"
                                             src="http://ol5yyvvdl.bkt.clouddn.com/avatars/7d5b6ead99cb3dfb775b2be6ff6315e2.jpeg?imageView2/1/w/100/h/100/interlace/0/q/100"
                                             alt="佘老师吧">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="teacher-name">
                                        <p>
                                            <span class="badge">推荐</span>
                                            <a href="#">串猪神吧</a>
                                        </p>
                                    </div>
                                    <div class="teacher-description">
                                        <p>
                                            人生有两道菜一定要吃，一道是吃亏，一道是吃苦
                                        </p>
                                    </div>
                                    <div class="teacher-num">
                                        <p>
                                            <i class="glyphicon glyphicon-user"></i> 524 &nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-comment"></i> 3402
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="teacher-avatar"
                                             src="http://ol5yyvvdl.bkt.clouddn.com/avatars/611b60323920812c0c4bd8d3086b942d.jpeg?imageView2/1/w/100/h/100/interlace/0/q/100"
                                             alt="佘老师吧">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="teacher-name">
                                        <p>
                                            <span class="badge">推荐</span>
                                            <a href="#">猫咪吧</a>
                                        </p>
                                    </div>
                                    <div class="teacher-description">
                                        <p>
                                            分享各种萌猫
                                        </p>
                                    </div>
                                    <div class="teacher-num">
                                        <p>
                                            <i class="glyphicon glyphicon-user"></i> 13940 &nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-comment"></i> 60534
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="teacher-avatar"
                                             src="https://tb1.bdstatic.com/tb/r/image/2017-02-27/61d0872e18992cbc2cae82f3cdc8b7a8.jpg"
                                             alt="佘老师吧">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="teacher-name">
                                        <p>
                                            {{--<span class="badge">推荐</span>--}}
                                            <a href="#">数据分析吧</a>
                                        </p>
                                    </div>
                                    <div class="teacher-description">
                                        <p>
                                            大数据的时代。
                                        </p>
                                    </div>
                                    <div class="teacher-num">
                                        <p>
                                            <i class="glyphicon glyphicon-user"></i> 1504 &nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-comment"></i> 980
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="teacher-avatar" src="https://tb1.bdstatic.com/tb/lolita0228.jpeg"
                                             alt="佘老师吧">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="teacher-name">
                                        <p>
                                            {{--<span class="badge">推荐</span>--}}
                                            <a href="#">lolita吧</a>
                                        </p>
                                    </div>
                                    <div class="teacher-description">
                                        <p>
                                            穿小裙子的萌妹子
                                        </p>
                                    </div>
                                    <div class="teacher-num">
                                        <p>
                                            <i class="glyphicon glyphicon-user"></i> 1234 &nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-comment"></i> 8365
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <ul class="teacher-ul">
                        <li>
                            <a href="#">
                                <strong>猫咪吧</strong>
                                <span class="badge">推荐</span>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-comment"></i> 60534
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>佘老师吧</strong>
                                <span class="badge">推荐</span>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-comment"></i> 10234
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>lolita吧</strong>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-comment"></i> 8365
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>串猪神吧</strong>
                                <span class="badge">推荐</span>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-comment"></i> 980
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>数据分析吧</strong>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-comment"></i> 980
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection