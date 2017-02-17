{{--右侧导航工具--}}
<ul class="list-group site-tool">
    <li class="list-group-item {{ navViewActive('web.contact') }}">
        <a href="{{ route('web.contact') }}">联系我们</a>
    </li>
    <li class="list-group-item">
        <a href="#">用户协议</a>
    </li>
    <li class="list-group-item">
        <a href="#">用户隐私权</a>
    </li>
    <li class="list-group-item">
        <a href="#">友情链接</a>
    </li>
    <li class="list-group-item {{ navViewActive('web.about') }}">
        <a href="{{ route('web.about') }}">关于我们</a>
    </li>
    <li class="list-group-item">
        <a href="#">用户帮助</a>
    </li>
</ul>