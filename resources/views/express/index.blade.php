@extends('layouts.default')

@section('title', '鸿雁传情')

@section('stylesheets')

@endsection

@section('javascript')
    @parent
    {{--通过七牛cdn引入瀑布流布局js文件--}}
    <script src="http://jq22.qiniudn.com/masonry-docs.min.js"></script>
    <script>
        $(function () {
            $('.masonry').masonry({
                itemSelector: '.item'
            });
            // 生成表单
            var express_form =
                '<div class="panel panel-default">' +
                '<div class="panel-heading panel-white">' +
                '<h3 class="panel-title">一纸情书助你表白</h3>' +
                '</div>' +
                '<div class="panel-body">' +
                '<form action="" class="form-horizontal">' +
                '<div class="form-group">' +
                '<label for="" class="col-md-3 control-label">收件人:</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" placeholder="请填写收件人">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="" class="col-md-3 control-label">发件人:</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" placeholder="请填写发件人">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="" class="col-md-3 control-label">情书:</label>' +
                '<div class="col-md-8">' +
                '<textarea style="height: 150px;" name="" class="form-control" placeholder="请填写情书">' +
                '缘是美丽的邂逅，爱是心跳的感觉，情是心灵的交会，恋是甜蜜的思念，走在爱与被爱的边缘，你见或者不见，爱你的心始终不改变！' +
                '</textarea>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="" class="col-md-3 control-label">日期:</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" disabled value="{{ date('Y-m-d') }}">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="" class="col-md-3 control-label">专属密码:</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" placeholder="自定义全网专属密码">' +
                '</div>' +
                '</div>' +
                '</form>' +
                '</div>' +
                '</div>';
            // 鸿雁传情
            $('#express').on('click', function () {
                layer.open({
                    type: 1,
                    title: false, // 不显示标题栏
                    closeBtn: false, // 不显示关闭按钮
                    area: '520px;',
                    id: 'LAY_layuipro',//设定一个id，防止重复弹出
                    resize: false,
                    btn: ['立即表白', '还没想好'],
                    moveType: 1, //拖拽模式，0或者1
                    content: express_form,
                    success: function (layero) {
//                    var btn = layero.find('.layui-layer-btn');
//                    btn.find('.layui-layer-btn0').attr({
//                        href: 'http://www.layui.com/'
//                        , target: '_blank'
//                    });
                    }
                });
            });
        });
    </script>
@endsection

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">鸿雁传情</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row masonry">
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi, debitis deleniti dolores ea, enim eos incidunt libero neque nesciunt omnis quidem reiciendis suscipit ullam vero? Nesciunt provident repudiandae vero.</p>
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>lorem</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>自从那次见了你之后，我的灵魂好像被你摄去了一般，你的影子，占据了我每一个记忆。你能理解我的痴心吗?</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>你是我独家的记忆，你是我诗篇的绝句，你是我想要的甜蜜，你是我享受的性格，你是我情人节唯一想要的奇观，你是我生命终点的可贵回想。</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet cupiditate dolores ea enim error facilis ipsa laudantium obcaecati similique! Adipisci beatae deleniti distinctio dolore eum incidunt ipsum vero voluptate.</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi, debitis deleniti dolores ea, enim eos incidunt libero neque nesciunt omnis quidem reiciendis suscipit ullam vero? Nesciunt provident repudiandae vero.</p>
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>lorem</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>自从那次见了你之后，我的灵魂好像被你摄去了一般，你的影子，占据了我每一个记忆。你能理解我的痴心吗?</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>你是我独家的记忆，你是我诗篇的绝句，你是我想要的甜蜜，你是我享受的性格，你是我情人节唯一想要的奇观，你是我生命终点的可贵回想。</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi, debitis deleniti dolores ea, enim eos incidunt libero neque nesciunt omnis quidem reiciendis suscipit ullam vero? Nesciunt provident repudiandae vero.</p>
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>自从那次见了你之后，我的灵魂好像被你摄去了一般，你的影子，占据了我每一个记忆。你能理解我的痴心吗?</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>你是我独家的记忆，你是我诗篇的绝句，你是我想要的甜蜜，你是我享受的性格，你是我情人节唯一想要的奇观，你是我生命终点的可贵回想。</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet cupiditate dolores ea enim error facilis ipsa laudantium obcaecati similique! Adipisci beatae deleniti distinctio dolore eum incidunt ipsum vero voluptate.</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi, debitis deleniti dolores ea, enim eos incidunt libero neque nesciunt omnis quidem reiciendis suscipit ullam vero? Nesciunt provident repudiandae vero.</p>
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi, debitis deleniti dolores ea, enim eos incidunt libero neque nesciunt omnis quidem reiciendis suscipit ullam vero? Nesciunt provident repudiandae vero.</p>
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>自从那次见了你之后，我的灵魂好像被你摄去了一般，你的影子，占据了我每一个记忆。你能理解我的痴心吗?</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>你是我独家的记忆，你是我诗篇的绝句，你是我想要的甜蜜，你是我享受的性格，你是我情人节唯一想要的奇观，你是我生命终点的可贵回想。</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>lorem</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>自从那次见了你之后，我的灵魂好像被你摄去了一般，你的影子，占据了我每一个记忆。你能理解我的痴心吗?</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>你是我独家的记忆，你是我诗篇的绝句，你是我想要的甜蜜，你是我享受的性格，你是我情人节唯一想要的奇观，你是我生命终点的可贵回想。</p>
                        {{--<p>被爱是享受的，付出爱时却很辛苦。但是如果让我选择是被爱还是付出爱，我还是会毫不犹豫的选择付出爱。因为，爱你，才是我真正的幸福。</p>--}}
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="express-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet cupiditate dolores ea enim error facilis ipsa laudantium obcaecati similique! Adipisci beatae deleniti distinctio dolore eum incidunt ipsum vero voluptate.</p>
                        {{--<span class="express-num">第100楼</span>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <a href="javascript:;" id="express" class="btn btn-primary btn-block" style="margin-bottom: 20px;">
                开始表白
            </a>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        鸿雁传情
                    </h3>
                </div>
                <div class="panel-body">
                    <p style="text-indent: 2em;">
                        鸿雁传情——为TA写下心中情，生成密码传给TA，TA搜一下密码就懂你。
                    </p>
                    <p style="text-indent: 2em;">
                        喜欢TA，又不知道怎么跟TA说，后街胡同最强表白应用——鸿雁传情帮你表白，写一封信给TA，生成自定义专属密码，可以匿名的哦，后街胡同帮你转达表白。
                    </p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        注意事项
                    </h3>
                </div>
                <div class="panel-body">
                    <p>如果您使用了</p>
                </div>
            </div>
        </div>
    </div>
@endsection