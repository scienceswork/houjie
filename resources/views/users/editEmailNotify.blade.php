@extends('layouts.default')

@section('title', '消息通知')

@section('body')
    <div class="row">
        <div class="col-md-3">
            {{--设置菜单--}}
            @include('users.partials._settingNav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Email通知设置
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="#" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">有新回复时接收邮件?</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection