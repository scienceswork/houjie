@extends('layouts.default')

@section('body')
    {{--判断邮箱是否激活，未激活不可使用平台--}}
    @if(Auth::check() && !Auth::user()->verified)
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            该邮箱未激活，请前往 {{ Auth::user()->email }} 查收激活邮件，激活后才能完整地使用后街胡同功能。如果未收到邮件，请前往 <a href="#">重发邮件</a> 。
        </div>
    @endif
    <div class="row">
        <div class="col-md-9">
            9
        </div>
        <div class="col-md-3">
            {{--签到--}}
            <div class="btn-group btn-group-full">
                <a href="#" class="btn btn-success" id="sign">
                    <i class="glyphicon glyphicon-calendar" style="font-size: 30px;float: left;margin-top: 3px;"></i>
                    点此处签到<br>
                    签到有好礼
                </a>
                <a href="#" class="btn btn-primary">
                    {{ date('Y年m月d日') }}<br>
                    已有180人签到
                </a>
            </div>
            {{--聊天广场--}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        聊天广场
                    </h3>
                    <span class="pull-right">
                        <a class="btn btn-xs" href="#">更多»</a>
                    </span>
                </div>
                <div class="panel-body">
                    <form action="#">
                        {{ csrf_field() }}
                        <div class="form-group input-group">
                            <textarea name="feed" class="form-control" placeholder="说点什么吧..."></textarea>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success">发布</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
