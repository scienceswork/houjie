@extends('layouts.default')

@section('title', '聊天广场')

@section('body')

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
                    <h3 class="panel-title">
                        广场说说
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list feed-list">
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 话说有没有撸代码听摇滚的,推荐两首 <三峰>,<怎么办>布衣乐队
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-08 22:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            12
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            15
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 今天出太阳了，好暖和.
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-08 22:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            12
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            15
                                        </a>
                                    </span>
                                </div>
                                <div class="ups">
                                    <a href="/user/33194">540974247</a> ,
                                    <a href="/user/40703">易语晓乐</a> ,
                                    <a href="/user/30389">amrozhou</a> 觉得很赞
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 又到了下午方便面时间。 顺便推荐一首歌吧《first of the year》
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-08 22:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            12
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            15
                                        </a>
                                    </span>
                                </div>
                                <div class="ups">
                                    <a href="/user/40703">易语晓乐</a> 觉得很赞
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 最近有人去园博园看灯会了吗？怎么样？
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-08 22:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            1
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            1
                                        </a>
                                    </span>
                                </div>
                                <div class="ups">
                                    <a href="/user/40703">易语晓乐</a> 觉得很赞
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" rel="author">
                                            <img class="media-object feed-avatar" src="http://www.yiichina.com/uploads/avatar/000/00/06/58_avatar_small.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-content">
                                            <a href="#" rel="author">strive</a>
                                            : 同问
                                        </div>
                                        <div class="media-action">
                                            <span>1天前</span>
                                            <span class="pull-right feed-tool">
                                                <a class="reply" href="javascript:void(0);">
                                                    <i class="glyphicon glyphicon-share-alt"></i> 回复
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 人生中有两道菜是必须吃的，一道是吃苦，一道是吃亏。
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-08 22:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            12
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            15
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer text-right">
                    <ul class="pagination">
                        <li class="disabled"><span>«</span></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="https://laravel-china.org/topics?page=2">2</a></li>
                        <li><a href="https://laravel-china.org/topics?page=3">3</a></li>
                        <li><a href="https://laravel-china.org/topics?page=4">4</a></li>
                        <li><a href="https://laravel-china.org/topics?page=5">5</a></li>
                        <li><a href="https://laravel-china.org/topics?page=6">6</a></li>
                        <li><a href="https://laravel-china.org/topics?page=7">7</a></li>
                        <li><a href="https://laravel-china.org/topics?page=8">8</a></li>
                        <li class="disabled"><span>...</span></li>
                        <li><a href="https://laravel-china.org/topics?page=13">13</a></li>
                        <li><a href="https://laravel-china.org/topics?page=14">14</a></li>
                        <li><a href="https://laravel-china.org/topics?page=2" rel="next">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{--右侧热门、精品等--}}
        <div class="col-md-3">
            {{--精品说说10条--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        精品说说
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 我眉毛怎么样
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-08 22:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            12
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            15
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 谁用过windows10的linux子系统，爽不爽？
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-09 10:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            7
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            25
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 有没有办法更改用户名？
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-01-08 15:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            1
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            7
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            {{--热门说说--}}
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        热门说说
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 我眉毛怎么样
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-08 22:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            12
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            15
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 谁用过windows10的linux子系统，爽不爽？
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-02-09 10:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            7
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            25
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 有没有办法更改用户名？
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2017-01-08 15:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            1
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            7
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            {{--头像--}}
                            <div class="media-left">
                                <a href="{{ route('web.users.show', 1) }}">
                                    <img src="http://phphub5.app/uploads/avatars/1_1486722253.png?imageView2/1/w/380/h/380"
                                         alt="" class="media-object feed-avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <a href="{{ route('web.users.show', 1) }}">串猪神</a>
                                    : 人生中有两道菜是必须吃的，一道是吃苦，一道是吃亏。
                                </div>
                                <div class="media-action">
                                    <span class="timeago">2016-01-08 15:34:04</span>
                                    <span class="pull-right feed-tool">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-comment"></i>
                                            12
                                        </a>
                                        <a href="#" class="vote up">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                            100
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection