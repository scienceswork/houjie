@extends('layouts.default')

@section('title', '登录')

@section('body')
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <div class="row">
                        <div class="col-md-12 panel-title">
                            <ul class="breadcrumb" style="font-size: 14px;">
                                <li><a href="{{ route('home') }}">首页</a></li>
                                <li class="active">登录</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('auth.login.store') }}" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">邮箱</label>
                            <div class="col-md-6">
                                <input class="form-control" name="email" type="email" placeholder="请填写电子邮箱">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">密码</label>
                            <div class="col-md-6">
                                <input class="form-control" name="password" type="password" placeholder="请填写账户密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox col-md-6 col-md-offset-2">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                                    自动登录
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    登录
                                </button>

                                <a class="btn btn-link" href="{{ route('auth.password.reset') }}">
                                    忘记密码
                                </a>
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
