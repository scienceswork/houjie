@extends('layouts.default')

@section('title', '发帖')

@section('javascript')
    @parent
    {!! UEditor::js() !!}
    <script type="text/javascript">
        var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor
        /* 自定义路由 */
        /*
         var serverUrl=UE.getOrigin()+'/ueditor/test'; //你的自定义上传路由
         var ue = UE.getEditor('ueditor',{'serverUrl':serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值
         */

        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            {{--面包屑导航--}}
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">首页</a></li>
                    <li><a href="{{ route('web.community.index') }}">社区</a></li>
                    <li class="active">发帖</li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="alert alert-warning">
                    我们希望 后街胡同 能够成为拥有浓厚健康氛围的校园社区，而实现这个目标，需要我们所有人的共同努力：友善，公平，尊重知识和事实。请严格遵守 - <a href="https://laravel-china.org/topics/3022">社区发帖和管理规范</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('web.community.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input name="title" type="text" class="form-control" placeholder="请填写标题">
                            </div>
                            <div class="form-group">
                                <script type='text/plain'  id='ueditor' name='content' class='ueditor'></script>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="发布">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading panel-white text-center">
                        以下类型的信息会污染我们的社区
                    </div>
                    <div class="panel-body">
                        <ul class="list">
                            <li>请传播美好的事物，这里拒绝低俗、诋毁、谩骂等相关信息</li>
                            <li>请尽量分享校园相关的话题，谢绝发布社会, 政治等相关新闻</li>
                            <li>这里绝对不讨论任何有关盗版软件、音乐、电影如何获得的问题</li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading panel-white text-center">
                        在高质量优秀社区的我们
                    </div>
                    <div class="panel-body">
                        <ul class="list">
                            <li>分享生活见闻, 分享知识</li>
                            <li>接触新技术, 讨论技术解决方案</li>
                            <li>为自己的创业项目找合伙人, 遇见志同道合的人</li>
                            <li>自发线下聚会, 加强社交</li>
                            <li>发现更好工作机会</li>
                            <li>甚至是开始另一个美妙的爱情生活</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection