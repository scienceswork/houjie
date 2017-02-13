@extends('layouts.default')

@section('title')
    {{ $user->name }} - 个人信息展示
@endsection

@section('body')
    <div class="row">
        <div class="col-md-3">
            {{--个人基础信息--}}
            @include('users.partials._basicInfo')
        </div>
        <div class="col-md-9">
            <div class="box text-center">
                这位童鞋很懒，木有签名的说～
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    专栏文章
                </div>
                <div class="panel-body">
                    <div class="empty-block">没有任何数据~~</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    最新话题
                </div>
                <div class="panel-body">
                    <div class="empty-block">没有任何数据~~</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    最新评论
                </div>
                <div class="panel-body">
                    <div class="empty-block">没有任何数据~~</div>
                </div>
            </div>
        </div>
    </div>
@endsection