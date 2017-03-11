@extends('layouts.default')

@section('title', '邮箱验证')

@section('body')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 floating-box">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    验证邮箱
                </div>
                {{--{{route('users.send-verification-mail')}}--}}
                <div class="panel-body">
                    <form method="POST" id="email-verification-required-form" action="{{route('users.send-verification-mail')}}" accept-charset="UTF-8">
                        {!! csrf_field() !!}
                        <fieldset>
                            <div class="alert alert-warning">
                                邮箱未激活，请前往 {{ \Auth::user()->email }} 查收激活邮件，激活后才能完整地使用社区功能，如发帖和回帖。
                                <br /><br />
                                未收到邮件？请点击以下按钮重新发送验证邮件。
                            </div>
                            <a class="btn btn-primary btn-block" id="email-verification-required-submit" href="javascript:$('#email-verification-required-form').submit();">重新发送验证邮件</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection