<a href="{{ route('web.teacher.createTopic', $teacher->id) }}" class="btn btn-primary btn-block"
   style="margin-bottom: 20px;">
    发 帖
</a>
<div class="box media">
    <div class="media-left">
        <img style="border: 1px solid #eee;" src="{{ avatar_min($teacher->avatar) }}" alt="">
    </div>
    <div class="media-body">
        <h3 class="media-heading teacher-name">{{ $teacher->name }}吧</h3>
        {{--<a href="#" class="btn btn-success btn-sm">关注</a>--}}
        <p style="margin: 19px 0 0 0;color: #999;font-size: 13px;">
            <i class="glyphicon glyphicon-user"></i> {{ $teacher->member_count }}&nbsp;&nbsp;
            <i class="glyphicon glyphicon-comment"></i> {{ $teacher->articles_count }}
        </p>
    </div>
</div>
{{--热门帖子10条--}}
<div class="panel panel-default">
    <div class="panel-heading panel-white">
        热门帖子
    </div>
    <div class="panel-body">
        @if($hot_topics->count())
            <ul class="teacher-hot">
                @foreach($hot_topics as $hot_topic)
                    <li class="">
                        <a href="{{ route('web.teacher.topicShow', $hot_topic->id) }}">{{ $hot_topic->name }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>暂时还没有帖子哦~</p>
        @endif
    </div>
</div>
{{--在线热议榜10条--}}
<div class="panel panel-default">
    <div class="panel-heading panel-white">
        在线热议榜
    </div>
    <div class="panel-body">
        @if($hots->count())
            <ul class="teacher-hot">
                @foreach($hots as $hot)
                    <li class="">
                        <a href="{{ route('web.teacher.topicShow', $hot->id) }}">{{ $hot->name }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>暂时还没有帖子哦~</p>
        @endif
    </div>
</div>