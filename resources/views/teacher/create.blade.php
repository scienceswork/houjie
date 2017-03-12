@extends('layouts.default')

@section('title', '创建在线')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.teacher.index') }}">教师在线</a></li>
                <li class="active">创建在线</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        创建在线
                    </h3>
                </div>
                <div class="panel-body">
                    {{--引入错误信息提示--}}
                    @include('layouts.partials._errors')
                    <form id="create-teacher-form" action="{{ route('web.teacher.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{--教师在线名称--}}
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">在线名称：</label>
                            <div class="col-md-6">
                                <input name="name" type="text" class="form-control" placeholder="请输入要创建的在线名称">
                            </div>
                            <div class="col-md-4 help-block">
                                如：佘老师（显示为"佘老师吧"）
                            </div>
                        </div>
                        {{--手机号码--}}
                        <div class="form-group">
                            <label for="phone" class="col-md-2 control-label">手机号码：</label>
                            <div class="col-md-6">
                                <input name="phone" class="form-control" type="text" placeholder="输入您的手机号码">
                            </div>
                            <div class="col-md-4 help-block">
                                如：13800138000
                            </div>
                        </div>
                        {{--电子邮件--}}
                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">电子邮件：</label>
                            <div class="col-md-6">
                                <input name="email" class="form-control" type="text" placeholder="输入您的电子邮件">
                            </div>
                            <div class="col-md-4 help-block">
                                如：service@hj-ht.com
                            </div>
                        </div>
                        {{--教师在线头像--}}
                        <div class="form-group">
                            <label for="avatar" class="col-md-2 control-label">在线封面：</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="teacher-avatar-docPath" type="text" class="form-control" placeholder="请上传教师在线封面图，小于等于5M" disabled>
                                    <span type="file" class="btn btn-primary input-group-addon input-file">
                                        浏览图片
                                        <input name="avatar" type="file" id="teacher-avatar-input-path" class="form-control input-path" >
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 help-block">
                                支持：*.jpg, *.jpeg. *.png
                            </div>
                        </div>
                        {{--资质证明文件--}}
                        <div class="form-group">
                            <label for="prove" class="col-md-2 control-label">资质证明：</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="teacher-prove-docPath" type="text" class="form-control" placeholder="请上传能证明教师的照片，小于等于5M" disabled>
                                    <span type="file" class="btn btn-primary input-group-addon input-file">
                                        浏览图片
                                        <input name="prove" type="file" id="teacher-prove-input-path" class="form-control input-path" >
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 help-block">
                                如：教师资格证
                            </div>
                        </div>
                        {{--教师在线描述--}}
                        <div class="form-group">
                            <label for="description" class="col-md-2 control-label">教师在线描述：</label>
                            <div class="col-md-6">
                                <textarea name="description" class="form-control" placeholder="请用一句话来描述教师在线功能"></textarea>
                            </div>
                            <div class="col-md-4 help-block">
                                如：提供大数据交流平台
                            </div>
                        </div>
                        {{--申请理由--}}
                        <div class="form-group">
                            <label for="reason" class="col-md-2 control-label">申请理由：</label>
                            <div class="col-md-6">
                                <textarea name="reason" class="form-control" style="height: 150px;" placeholder="请简单填写申请理由，认真填写将加快审核通过率"></textarea>
                            </div>
                            <div class="col-md-4 help-block">
                                如：创建教师线下学生交流平台
                            </div>
                        </div>
                        {{--提交按钮--}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="submit" class="btn btn-primary" value="提交申请">
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
                        注意事项
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="teacher-create-ul">
                        <li>教师在线仅对高校教师开放</li>
                        <li>有义务维护教师在线版块</li>
                        <li>您需要提交您的真实信息</li>
                        <li>每位教师只能拥有一个在线版块</li>
                        <li>教师在线解释权归后街胡同所管</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection