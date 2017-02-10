@extends('layouts.default')

@section('title', '修改头像')

@section('body')
    <div class="row">
        <div class="col-md-3">
            @include('users.partials._settingNav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        修改头像
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="#" method="post">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection