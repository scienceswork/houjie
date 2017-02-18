@extends('layouts.default')

@section('title', 'TA申请的酷站')

@section('body')
    <div class="row">
        <div class="col-md-3">
            {{--个人基础信息--}}
            @include('users.partials._basicInfo')
        </div>
        <div class="col-md-9">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('web.users.show', $user->id) }}">用户中心</a>
                </li>
                <li class="active">
                    Ta 发布的酷站
                </li>
            </ul>
            <div class="panel panel-default">
                {{--<div class="panel-heading panel-white">--}}
                    {{--<h3 class="panel-title">--}}
                        {{--TA申请的酷站--}}
                    {{--</h3>--}}
                {{--</div>--}}
                <div class="panel-body">
                    @if(!$coolSites->isEmpty())
                        @foreach($coolSites as $coolSite)
                            <p>{{ $coolSite->name }}</p>
                        @endforeach
                    @else
                        <p class="text-indent">
                            TA还没有发布酷站哦~
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection