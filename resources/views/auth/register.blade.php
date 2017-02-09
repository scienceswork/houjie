@extends('layouts.default')

@section('title', '注册')

@section('body')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        账户注册
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('auth.register.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">用户昵称</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                   required autofocus placeholder="请输入用户昵称">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">电子邮箱</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                   required autofocus placeholder="请输入电子邮箱">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">账户密码</label>
                            <input type="password" class="form-control" id="password" name="password" required autofocus
                                   placeholder="请输入账户密码">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="control-label">确认密码</label>
                            <input type="password" class="form-control" name="password_confirmation" required autofocus
                                   placeholder="请输入确认密码">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                注册
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection