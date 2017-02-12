@extends('layouts.default')

@section('title', '发布酷站')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('web.cool.index') }}">酷站</a></li>
                <li class="active">发布酷站</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        发布酷站
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="#" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        {{--酷站名称--}}
                        <div class="form-group">
                            <label class="col-md-2 control-label">酷站名称：</label>
                            <div class="col-md-6">
                                <input name="" class="form-control" type="text" placeholder="输入酷站的名称">
                            </div>
                            <div class="col-md-4 help-block">
                                请填写酷站名称
                            </div>
                        </div>
                        {{--酷站URL--}}
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">酷站URL：</label>
                            <div class="col-md-6">
                                <input name="" type="text" class="form-control" placeholder="请输入酷站完整的URL">
                            </div>
                            <div class="col-md-4 help-block">
                                如：http://www.hj-ht.com
                            </div>
                        </div>
                        {{--酷站封面--}}
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">酷站封面：</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control">
                            </div>
                            <div class="col-md-4 help-block">
                                请上传酷站的展示图
                            </div>
                        </div>
                        {{--酷站描述--}}
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">酷站描述：</label>
                            <div class="col-md-6">
                                <textarea name="" id="" class="form-control cool-textarea" placeholder="请简单描述酷站，认真填写会大大提高审核通过概率"></textarea>
                            </div>
                            <div class="col-md-4 help-block">
                                简单描述一下酷站
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
                <div class="panel-heading panel-white text-center">
                    <h3 class="panel-title">{{ Auth::user()->name }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection