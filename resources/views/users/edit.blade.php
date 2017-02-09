@extends('layouts.default')

@section('title', '编辑资料')

@section('body')
    <div class="row users-show">
        <div class="col-md-3">
            {{--设置菜单--}}
            @include('users.partials._settingNav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑个人资料</h3>
                </div>
                <div class="panel-body">
                    <form action="#" class="form-horizontal">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-2 control-label">邮 箱：</label>
                            <div class="col-md-6">
                                <input name="" class="form-control" type="text" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-sm-4 help-block">
                                如需修改请联系管理员
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">原密码：</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="请输入原密码" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">密 码：</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="请输入新密码" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">确认密码：</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="请再次输入密码" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <input class="btn btn-primary" id="user-edit-submit" type="submit" value="确认修改">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection