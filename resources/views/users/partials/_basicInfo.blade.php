<div class="box">
    <div class="padding-sm user-basic-info">
        <div>
            {{--个人信息--}}
            <div class="media">
                <div class="media-left">
                    <div class="image">
                        <a href="{{ route('web.users.show', $user->id) }}">
                            <img src="{{ avatar_min($user->avatar) }}" alt=""
                                 class="media-object avatar img-thumbnail avatar-112">
                        </a>
                    </div>
                </div>
                <div class="media-body">
                    <h3 class="media-heading">
                        {{ $user->name }}
                    </h3>
                    <div class="item">
                        {{ $user->real_name }}
                    </div>
                    <div class="item">
                        第 {{ $user->id }} 位会员
                    </div>
                    <div class="item number">
                        注册于 <span class="timeago" data-toggle="tooltip" data-placement="top"
                                  data-original-title>{{ $user->created_at }}</span>
                    </div>
                </div>
            </div>
            {{--<hr>--}}
            {{--粉丝--}}
            {{--<div class="follow-info row text-center">--}}
            {{--<div class="col-xs-4">--}}
            {{--<a href="#" class="counter">180</a>--}}
            {{--<a href="#" class="text">关注者</a>--}}
            {{--</div>--}}
            {{--<div class="col-xs-4">--}}
            {{--<a href="#" class="counter">25</a>--}}
            {{--<a href="#" class="text">粉丝</a>--}}
            {{--</div>--}}
            {{--<div class="col-xs-4">--}}
            {{--<a href="#" class="counter">1</a>--}}
            {{--<a href="#" class="text">文章</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--检测是否登录--}}
            @if(Auth::check() && Auth::id() == $user->id)
                <hr>
                <a href="{{ route('web.users.edit', $user->id) }}" class="btn btn-primary btn-block">
                    <i class="glyphicon glyphicon-edit"></i>
                    编辑个人资料
                </a>
            @endif

        </div>
    </div>
</div>
<div class="box text-center">
    <div class="padding-sm user-basic-nav">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('web.users.article', $user->id) }}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    &nbsp;Ta 发布的文章
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('web.users.feed', $user->id) }}">
                    <i class="glyphicon glyphicon-book"></i>
                    &nbsp;Ta 发布的话题
                </a>
            </li>
            {{--<li class="list-group-item">--}}
                {{--<a href="#">--}}
                    {{--<i class="glyphicon glyphicon-comment"></i>--}}
                    {{--&nbsp;Ta 发表的说说--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="list-group-item">--}}
                {{--<a href="#">--}}
                    {{--<i class="glyphicon glyphicon-stats"></i>--}}
                    {{--&nbsp;Ta 关注的用户--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="list-group-item">
                <a href="{{ route('web.users.vote', $user->id) }}">
                    <i class="glyphicon glyphicon-hourglass"></i>
                    &nbsp;Ta 赞过的话题
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('web.users.cool', $user->id) }}">
                    <i class="glyphicon glyphicon-globe"></i>
                    &nbsp;Ta 发布的酷站
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="box text-center">
    <p>扫一扫关注<a href="http://www.hj-ht.com">后街胡同</a></p>
    <img style="height: 180px; width=180px;" src="{{ asset('erweima.jpg') }}">
</div>