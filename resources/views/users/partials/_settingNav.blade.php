<div class="box">
    <div class="padding-md">
        <div class="list-group text-center">
            <a href="{{ route('web.users.edit', Auth::user()->id) }}" class="list-group-item {{ navViewActive('web.users.edit') }}">
                <i class="glyphicon glyphicon-tasks"></i>
                &nbsp;个人信息
            </a>
            <a href="#" class="list-group-item">
                <i class="glyphicon glyphicon-picture"></i>
                &nbsp;修改头像
            </a>
            <a href="#" class="list-group-item">
                <i class="glyphicon glyphicon-credit-card"></i>
                &nbsp;我的订单
            </a>
            <a href="#" class="list-group-item">
                <i class="glyphicon glyphicon-calendar"></i>
                &nbsp;我的签到
            </a>
            <a href="{{ route('web.users.edit_email_notify', Auth::user()->id) }}" class="list-group-item {{ navViewActive('web.users.edit_email_notify') }}">
                <i class="glyphicon glyphicon-bell"></i>
                &nbsp;消息通知
            </a>
            <a href="#" class="list-group-item">
                <i class="glyphicon glyphicon-wrench"></i>
                &nbsp;账号绑定
            </a>
            <a href="{{ route('web.users.edit_password', Auth::user()->id) }}" class="list-group-item {{ navViewActive('web.users.edit_password') }}">
                <i class="glyphicon glyphicon-lock"></i>
                &nbsp;修改密码
            </a>
        </div>
    </div>
</div>