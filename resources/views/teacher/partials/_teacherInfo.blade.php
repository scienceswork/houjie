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
        <a href="#" class="btn btn-success btn-sm">关注</a>
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
        <ul class="teacher-hot">
            <li class="">
                <a href="#">我想说，当视为蝼蚁的人攻击你，你会防御吗？</a>
            </li>
            <li class="">
                <a href="#">请不要在这边里骂人</a>
            </li>
            <li class="">
                <a href="#">不看吧，不上不下的，接着看吧，</a>
            </li>
            <li class="">
                <a href="#">你们缺一个全能的女朋友</a>
            </li>
            <li class="">
                <a href="#">白手起家创业十多年的经验，希望我的思维和理念能帮助到有缘人</a>
            </li>
            <li class="">
                <a href="#">考文学的进来聊聊阿</a>
            </li>
            <li class="">
                <a href="#">看着学长学姐等成绩</a>
            </li>
            <li class="">
                <a href="#">【非全日制】求助一下非全真的每周末都得去上课吗?</a>
            </li>
            <li class="">
                <a href="#">真羡慕你们工科，两百多分就有学上</a>
            </li>
            <li class="">
                <a href="#">一个考数学148分的过来人的考研感受</a>
            </li>
        </ul>
    </div>
</div>
{{--在线热议榜10条--}}
<div class="panel panel-default">
    <div class="panel-heading panel-white">
        在线热议榜
    </div>
    <div class="panel-body">
        <ul class="teacher-hot">
            <li class="">
                <a href="#">真羡慕你们工科，两百多分就有学上</a>
            </li>
            <li class="">
                <a href="#">我想说，当视为蝼蚁的人攻击你，你会防御吗？</a>
            </li>
            <li class="">
                <a href="#">你们缺一个全能的女朋友</a>
            </li>
            <li class="">
                <a href="#">白手起家创业十多年的经验，希望我的思维和理念能帮助到有缘人</a>
            </li>
            <li class="">
                <a href="#">一个考数学148分的过来人的考研感受</a>
            </li>
            <li class="">
                <a href="#">请不要在这边里骂人</a>
            </li>
            <a href="#">考文学的进来聊聊阿</a>
            </li>
            <li class="">
                <a href="#">看着学长学姐等成绩</a>
            </li>
            <li class="">
                <a href="#">【非全日制】求助一下非全真的每周末都得去上课吗?</a>
            </li>
            <li class="">
                <a href="#">不看吧，不上不下的，接着看吧，</a>
            </li>
        </ul>
    </div>
</div>