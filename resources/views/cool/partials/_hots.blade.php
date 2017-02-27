{{--热门酷站--}}
<div class="panel panel-default">
    <div class="panel-heading panel-white">
        <h3 class="panel-title">
            热门酷站
        </h3>
    </div>
    <div class="panel-body">
        {{--判断是否有酷站--}}
        @if($hots)
            <ul class="cool-hots">
                @foreach($hots as $hot)
                    <li>
                        <a href="{{ route('web.cool.show', $hot->id) }}">{{ $hot->name }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-indent">
                暂时还没有小伙伴上传酷站，可以点击
                <a href="{{ route('web.cool.create') }}">上传酷站</a>
                哦~
            </p>
        @endif
    </div>
</div>