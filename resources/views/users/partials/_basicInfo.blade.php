<div class="box">
    <div class="padding-sm user-basic-info">
        <div>
            {{--个人信息--}}
            <div class="media">
                <div class="media-left">
                    <div class="image">
                        <img src="{{ avatar_min($user->avatar) }}" alt=""
                             class="media-object avatar img-thumbnail avatar-112">
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
            <hr>
            {{--粉丝--}}
            <div class="follow-info row text-center">
                <div class="col-xs-4">
                    <a href="#" class="counter">180</a>
                    <a href="#" class="text">关注者</a>
                </div>
                <div class="col-xs-4">
                    <a href="#" class="counter">25</a>
                    <a href="#" class="text">粉丝</a>
                </div>
                <div class="col-xs-4">
                    <a href="#" class="counter">1</a>
                    <a href="#" class="text">文章</a>
                </div>
            </div>
            {{--检测是否登录--}}
            @if(Auth::check())
                <hr>
                <a href="#" class="btn btn-primary btn-block">
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
                <a href="#">
                    <i class="glyphicon glyphicon-th-list"></i>
                    &nbsp;Ta 发布的文章
                </a>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <i class="glyphicon glyphicon-book"></i>
                    &nbsp;Ta 发布的话题
                </a>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <i class="glyphicon glyphicon-comment"></i>
                    &nbsp;Ta 发表的说说
                </a>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <i class="glyphicon glyphicon-stats"></i>
                    &nbsp;Ta 关注的用户
                </a>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <i class="glyphicon glyphicon-hourglass"></i>
                    &nbsp;Ta 赞过的话题
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="box text-center">
    <p>二维码扫一扫下载<a href="#">客户端</a></p>
    <img style="height: 180px; width=180px;" " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAIAAAAiOjnJAAAACXBIWXMAAA7EAAAOxAGVKw4bAAADlklEQVR4nO3dwWrjMBRA0Wno/39ymH0YQcToVlJ6zrJ1bZNevHjIytefSzyfz6njH4/HUedZdf7R8ae54y65jrBICIuEsEgIi4SwSAiLxPfoF6vmNLNm5zSr5jq75kmrPufT/l+eWCSERUJYJIRFQlgkhEVCWCSGc6yRW+Y39XxrZPZ+dq33mjW9jm3JVeGFsEgIi4SwSAiLhLBICIvE9BzrNKfN1W65bs0Ti4SwSAiLhLBICIuEsEgIi8T1c6x6DlS/b1ivx9rFE4uEsEgIi4SwSAiLhLBICIvE9BzrtPlKPWeaPc9p+7Nv2zdry1X5eMIiISwSwiIhLBLCIiEsEsM51i3fi7dKPa86bR+v2ll3w8cQFglhkRAWCWGREBYJYZH4Om191e0+9T3BWZ5YJIRFQlgkhEVCWCSERUJYJL52Xfj29+9Ou89d68aGx//zp/CfhEVCWCSERUJYJIRFQlgkptdjrdpfapX6fur1VbvWb+X710/fEbxBWCSERUJYJIRFQlgkhEViOMfaNb8ZOW3+NHvdkXo/+pH6Pj2xSAiLhLBICIuEsEgIi4SwSCxbj7VrHjNSv/d32nuRI9vmW1NngTcJi4SwSAiLhLBICIuEsEhM749Vz6tumZON3LJv1ux5RqzH4kcJi4SwSAiLhLBICIuEsEjkc6xd+0itmifdsj5sZNfczhOLhLBICIuEsEgIi4SwSAiLxHCOddr3933qeqxd69tW8V4hP0pYJIRFQlgkhEVCWCSERWJ6jnXa3Ghk1z7vI/X6sF3r1UY8sUgIi4SwSAiLhLBICIuEsEgsm2PdMl8Zuf39wVn1/+uOT4HrCIuEsEgIi4SwSAiLhLBITH9f4WlO25dr9jwjp93/7Pk9sUgIi4SwSAiLhLBICIuEsEh8375+aJVb1o3tmqvNuqMqriMsEsIiISwSwiIhLBLCIrFsn/dVTtvXqnbaerJlc7Kpo+FNwiIhLBLCIiEsEsIiISwS37N/UO9XPmvX/um1fL1UPT9bchZ4ISwSwiIhLBLCIiEsEsIiMT3H+lS371+1a13X8PglV4UXwiIhLBLCIiEsEsIiISwSv26Oddr8adU6sNO+X9ITi4SwSAiLhLBICIuEsEgIi8T0HOu37VO16jy79qmvjx/Ot6bODm8SFglhkRAWCWGREBYJYZEY7vN+ml3rjVY5bT/3VecfHr/kqvBCWCSERUJYJIRFQlgkhEXiL795V7owsgM2AAAAAElFTkSuQmCC">
</div>