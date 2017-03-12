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
                    <form action="{{ route('web.users.update', $user->id) }}" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">头像：</label>
                            <div class="col-md-6">
                                <img src="{{ avatar_min($user->avatar) }}" alt="{{ $user->name }}" class="avatar-preview-img">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">用户昵称：</label>
                            <div class="col-md-6">
                                <input name="name" class="form-control" type="text" value="{{ $user->name }}">
                            </div>
                            <div class="col-sm-4 help-block">
                                如：串猪神
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-md-2 control-label">真实姓名：</label>
                            <div class="col-md-6">
                                <input name="real_name" type="text" class="form-control" value="{{ $user->real_name }}">
                            </div>
                            <div class="col-md-4 help-block">
                                如：王大锤
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex" class="col-md-2 control-label">性 别：</label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="1" @if($user->sex == 1) checked @endif> 男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="2" @if($user->sex == 2) checked @endif> 女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">邮 箱：</label>
                            <div class="col-md-6">
                                <input name="email" type="email" class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="col-md-4 help-block">
                                邮箱暂时不支持更改，请联系管理员
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-2 control-label">手 机：</label>
                            <div class="col-md-6">
                                <input name="phone" type="text" class="form-control" value="{{ $user->phone }}">
                            </div>
                            <div class="col-md-4 help-block">
                                如：13800138000
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="school" class="col-md-2 control-label">学 校：</label>
                            <div class="col-md-6">
                                <input name="school" type="text" class="form-control" value="{{ $user->school }}">
                            </div>
                            <div class="col-md-4 help-block">
                                如：韩山师范学院
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="student_id" class="col-md-2 control-label">学 号：</label>
                            <div class="col-md-6">
                                <input name="student_id" type="text" class="form-control" value="{{ $user->student_id }}">
                            </div>
                            <div class="col-md-4 help-block">
                                如：2013119101
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="introduction" class="col-md-2 control-label">个人简介：</label>
                            <div class="col-md-6">
                                <textarea name="introduction" type="text" class="form-control user-textarea">{{ $user->introduction }}</textarea>
                            </div>
                            <div class="col-md-4 help-block">
                                如：人生中有两道菜是必吃的，一道是吃亏，一道是吃苦。
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