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
            3
        </div>
    </div>
@endsection
