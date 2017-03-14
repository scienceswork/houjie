@extends('layouts.default')

@section('title', '鸿雁传情')

@section('stylesheets')

@endsection

@section('javascript')
    @parent
    {{--通过七牛cdn引入瀑布流布局js文件--}}
    <script src="{{ asset('masonry-docs.min.js') }}"></script>
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
                '<form action="{{ route("web.express.create") }}" class="form-horizontal" id="express-form" method="post">' +
                '{{ csrf_field() }}' +
                '<div class="form-group">' +
                '<label for="receiver" class="col-md-3 control-label">收件人:</label>' +
                '<div class="col-md-8">' +
                '<input name="receiver" type="text" class="form-control" placeholder="请填写收件人">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="sender" class="col-md-3 control-label">发件人:</label>' +
                '<div class="col-md-8">' +
                '<input name="sender" type="text" class="form-control" placeholder="请填写发件人">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="content" class="col-md-3 control-label">情书:</label>' +
                '<div class="col-md-8">' +
                '<textarea name="content" style="height: 150px;" name="" class="form-control" placeholder="请填写情书">' +
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
                '<label for="password" class="col-md-3 control-label">专属密码:</label>' +
                '<div class="col-md-8">' +
                '<input name="password" type="text" class="form-control" placeholder="自定义全网专属密码">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="is_show" class="col-md-3 control-label">匿名展示:</label>' +
                '<div class="col-md-8">' +
                '<label class="radio-inline">' +
                '<input name="is_show" type="radio" value="1" checked>是&nbsp;&nbsp;' +
                '</label>' +
                '<label class="radio-inline">' +
                '<input name="is_show" type="radio" value="0">否' +
                '</label>' +
                '<div class="help-block">是否在表白墙展示，仅仅显示表白内容和时间</div>' +
                '</div>' +
                '</div>' +
                '<input type="submit" id="submit-express" style="display:none;" value="发布情书">' +
                '</form>' +
                '</div>' +
                '</div>';
            // 鸿雁传情
            $('#express').on('click', function () {
                layer.open({
                    type: 1,
                    title: false, // 不显示标题栏
                    closeBtn: false, // 不显示关闭按钮
//                    area: '520px;',
                    id: 'LAY_layuipro',//设定一个id，防止重复弹出
                    resize: false,
                    btn: ['立即表白', '还没想好'],
                    moveType: 1, //拖拽模式，0或者1
                    content: express_form,
                    yes: function () {
                        // 使用模拟点击提交按钮来修复验证器无法提交表单的bug
                        $('#submit-express').trigger('click');
                    },
                    success: function (layero) {
                        // 在弹层加载完毕后才使用验证表单
                        $('#express-form').bootstrapValidator({
                            fields: {
                                receiver: {
                                    validators: {
                                        notEmpty: {
                                            message: '小伙伴，留下表白的对象吧',
                                        }
                                    }
                                },
                                sender: {
                                    validators: {
                                        notEmpty: {
                                            message: '小伙伴，留下足迹吧，万一Ta也喜欢你呢',
                                        }
                                    }
                                },
                                content: {
                                    validators: {
                                        notEmpty: {
                                            message: 'OMG，情书留空怎么表白',
                                        }
                                    }
                                },
                                password: {
                                    validators: {
                                        notEmpty: {
                                            message: '定义一个专属于你和TA的专属密码吧'
                                        },
                                        remote: {
                                            url: '{{ route("web.express.validate") }}',
                                            message: '晚来一步，该专属密码已经被人使用啦',
                                            delay: 500, // 设置每2秒才向服务器发起请求，减轻服务器压力
                                            type: 'POST',
                                            data: function (validator) {
                                                return {
                                                    password: $('[name=password]').val(),
                                                    _token: '{{ csrf_token() }}'
                                                };
                                            }
                                        }
                                    }
                                },
                                is_show: {
                                    validators: {
                                        notEmpty: {
                                            message: '请选择是否在表白墙展示',
                                        }
                                    }
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.partials._errors')
        </div>
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">鸿雁传情</li>
            </ul>
        </div>
        <div class="col-md-9">
            @if($expressions->count())
                <div class="row masonry">
                    @foreach($expressions as $expression)
                        <div class="col-md-3 item">
                            <div class="express-container">
                                <p>{{ $expression->content }}</p>
                                <p class="express-info">{{ $expression->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p style="margin-bottom: 0;">暂时还没有小伙伴公开展示小情书~</p>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            {{--基础信息--}}
            @include('express.partials._baseInfo')
        </div>
    </div>
@endsection