@extends('layouts.default')

@section('title', '登录')

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
                                <li class="active">登录</li>
                            </ul>
                        </div>
                    </div>
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
                    后街胡同是一个专注于分享的社区。
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        账号登录
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('auth.login.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">邮箱</label>
                            <input class="form-control" name="email" type="email" placeholder="请填写电子邮箱">
                            @if($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">密码</label>
                            <input class="form-control" name="password" type="password" placeholder="请填写账户密码">
                            @if($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                                    记住登录状态
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                登录
                            </button>

                            <a class="btn btn-link" href="{{ route('auth.password.reset') }}">
                                忘记密码
                            </a>
                        </div>
                        <hr>
                        <div class="form-group no-margin">
                            <div class="alert alert-info no-margin">
                                使用其他方式登录：
                                <a href="#">微信登录</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
