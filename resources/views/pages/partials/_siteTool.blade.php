{{--右侧导航工具--}}
<ul class="list-group site-tool">
    <li class="list-group-item {{ navViewActive('web.pages.contact') }}">
        <a href="{{ route('web.pages.contact') }}">联系我们</a>
    </li>
    <li class="list-group-item {{ navViewActive('web.pages.protocol') }}">
        <a href="{{ route('web.pages.protocol') }}">用户协议</a>
    </li>
    {{--<li class="list-group-item {{ navViewActive('web.pages.privacy') }}">--}}
        {{--<a href="{{ route('web.pages.privacy') }}">用户隐私权</a>--}}
    {{--</li>--}}
    {{--<li class="list-group-item {{ navViewActive('web.pages.links') }}">--}}
        {{--<a href="{{ route('web.pages.links') }}">友情链接</a>--}}
    {{--</li>--}}
    <li class="list-group-item {{ navViewActive('web.pages.about') }}">
        <a href="{{ route('web.pages.about') }}">关于我们</a>
    </li>
    {{--<li class="list-group-item {{ navViewActive('web.pages.help') }}">--}}
        {{--<a href="{{ route('web.pages.help') }}">用户帮助</a>--}}
    {{--</li>--}}
</ul>