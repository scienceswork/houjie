@extends('layouts.default')

@section('title', '注册')

@section('body')
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    {{--面包屑导航--}}
                    <div class="row">
                        <div class="col-md-12 panel-title">
                            <ul class="breadcrumb" style="font-size: 14px;">
                                <li><a href="{{ route('home') }}">首页</a></li>
                                <li class="active">注册</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @include('layouts.partials._errors')
                    <form role="form" method="POST" action="{{ route('auth.register.store') }}" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">用户名：</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                       required autofocus placeholder="请输入用户名">
                            </div>
                            <div class="col-md-4 help-block">
                                如:串猪神, scienceswork
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">邮箱：</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="email" name="email"
                                       value="{{ old('email') }}"
                                       required autofocus placeholder="请输入登录邮箱">
                            </div>
                            <div class="col-md-4 help-block">
                                一个邮箱只能注册一次
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">密码：</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password" name="password" required autofocus
                                       placeholder="请输入账户密码">
                            </div>
                            <div class="col-md-4 help-block">
                                账户密码为6位以上
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label">密码：</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autofocus
                                       placeholder="请输入确认密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        后街胡同
                    </h3>
                </div>
                <div class="panel-body">
                    <p class="text-indent">
                        后街胡同——粤东地区最为活跃的大学生生活资讯社交平台。关注我们，校园资讯、新鲜趣闻、二手买卖、求职咨询、家教兼职、交友表白等应有尽有！
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection