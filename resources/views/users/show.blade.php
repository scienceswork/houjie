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
            右栏
        </div>
    </div>
@endsection