<!--导航-->
<header class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!--头部导航-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">后街胡同</a>
        </div>
        <!--导航内容-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/">首页</a>
                </li>
                <li>
                    <a href="#">社区</a>
                </li>
                <li>
                    <a href="#">发现</a>
                </li>
                <li>
                    <a href="#">话题</a>
                </li>
                <li>
                    <a href="#">小店</a>
                </li>
                <li>
                    <a href="#">酷站</a>
                </li>
                <li>
                    <a href="#">消息</a>
                </li>
            </ul>
            <!-- 搜索框 -->
            <form class="navbar-form navbar-left" action="#">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="搜索你感兴趣的内容">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-xs">
                    <button type="button" class="btn btn-default navbar-btn">
                        提问
                    </button>
                </li>
            @if(Auth::check())
                <!-- 已登录 -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    个人主页
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                    我的签到
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-cog"></i>
                                    账户设置
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="glyphicon glyphicon-off"></i>
                                    退出登录
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--退出登录表单-->
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li>
                        <a href="{{ route('register') }}">注册</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">登录</a>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</header>