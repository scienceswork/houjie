;(function () {
    // 开启tooltip提示
    $('[data-toggle="tooltip"]').tooltip();
    // 设置时间语言为中文
    // moment.lang('zh-cn');
    // 设置时间格式
    $('.timeago').each(function () {
        var time_str = $(this).text();
        if (moment(time_str, "YYYY-MM-DD HH:mm:ss", true).isValid()) {
            $(this).text(moment(time_str).fromNow());
        }
        // $(this).addClass('popover-with-html');
        $(this).attr('data-original-title', time_str);
    });
    // 点击提问
    $('#question').on('click', function () {
        layer.open({
            title: '在线调试'
            , content: '可以填写任意的layer代码'
        });
    });
    // 点击注销
    $('#logout').on('click', function () {
        layer.confirm('你确认要退出吗?', {
            icon: 3, title: '退出账户'
        }, function (index) {
            $('#logout-form').submit();
            layer.close(index);
        });
    });
    // 小彩蛋
    console.log('一位新人，要经历怎样的成长，才能站在技术之巅？\n' +
        '人生中有两道菜是必须吃的，一道是吃苦，一道是吃亏。\n' +
        '%c后街胡同&串猪神', "color:red");
    // 关闭所有表单的HTML5验证
    $('form').attr('novalidate', '');
    // 修改密码表单验证
    $('#user-edit-form').bootstrapValidator({
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: '原密码不能为空'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: '密码长度必须在%s位至%s位之间'
                    }
                }
            },
            new_password: {
                validators: {
                    notEmpty: {
                        message: '新密码不能为空'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: '密码的长度在%s位至%s位之间'
                    }
                }
            },
            new_password_confirmation: {
                validators: {
                    notEmpty: {
                        message: '确认密码不能为空'
                    },
                    identical: {
                        field: 'new_password',
                        message: '两次输入的密码不一致'
                    }
                }
            }
        }
    });
    // 酷站提交表单验证
    $('#cool-create-form').bootstrapValidator({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: '酷站名称不能为空'
                    },
                    stringLength: {
                        min: 2,
                        message: '酷站名称长度至少为%s位'
                    }
                }
            },
            url: {
                validators: {
                    notEmpty: {
                        message: '酷站URL不能为空'
                    },
                    uri: {
                        message: '请填写正确的URL网址'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: '酷站描述不能为空'
                    },
                    stringLength: {
                        min: 5,
                        message: '酷站描述最少需要%s个字符'
                    }
                }
            },
            img_url: {
                validators: {
                    notEmpty: {
                        message: '请上传酷站展示图',
                    },
                    file: {
                        extension: 'jpg,jpeg,png',
                        type: 'image/jpeg,image/jpeg,image/png',
                        message: '请上传支持的图片格式:jpg,jpeg,png'
                    }
                }
            }
        }
    });
    // 创建在线表单验证
    $('#create-teacher-form').bootstrapValidator({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: '教师在线不能为空'
                    },
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: '手机号码不能为空',
                    },
                    regexp: {
                        regexp: /^1[3|5|8]{1}[0-9]{9}$/,
                        message: '请输入正确的手机号码',
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: '电子邮件不能为空',
                    },
                    emailAddress: {
                        message: '请填写正确的邮件地址如：123@hj-ht.com',
                    }
                }
            },
            avatar: {
                validators: {
                    notEmpty: {
                        message: '请上传教师在线封面图',
                    },
                    file: {
                        extension: 'jpg,jpeg,png',
                        type: 'image/jpeg,image/jpeg,image/png',
                        message: '请上传支持的图片格式:jpg,jpeg,png'
                    }
                }
            },
            prove: {
                validators: {
                    notEmpty: {
                        message: '请上传资质证明封面图，如：教师资格证等',
                    },
                    file: {
                        extension: 'jpg,jpeg,png',
                        type: 'image/jpeg,image/jpeg,image/png',
                        message: '请上传支持的图片格式:jpg,jpeg,png'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: '教师在线描述不能为空',
                    },
                    stringLength: {
                        min: 3,
                        max: 255,
                        message: '教师在线描述的长度在3~255之间',
                    }
                }
            },
            reason: {
                validators: {
                    notEmpty: {
                        message: '申请理由不能为空',
                    },
                    stringLength: {
                        min: 3,
                        message: '申请理由最少需要3个字符',
                    }
                }
            }
        }
    });
    // 修改默认文件输入框样式
    $("#input-path").change(function () {
        $("#docPath").val($(":file").val());
    });
    $("#teacher-avatar-input-path").change(function () {
        $("#teacher-avatar-docPath").val($("#teacher-avatar-input-path").val());
    });
    $("#teacher-prove-input-path").change(function () {
        $("#teacher-prove-docPath").val($("#teacher-prove-input-path").val());
    });
    // 点击签到
    $('#sign').on('click', function () {
        $.ajax({
            url: '/sign',
            success: function (data, textStatus, jqXHR) {
                if (textStatus == 'success') {
                    layer.msg(data.message);
                }
            },
            error: function (xhr, textStatus, error) {
                if (error == 'Unauthorized') {
                    layer.msg('还未登录，登陆后才可签到');
                    location.href = '/auth/login';
                }
            }
        });
    });
    // 表白墙
    $('.express-container').each(function () {
        $(this).hover(function () {
            // 防止动画积累
            $(this).find('.express-info').stop(true).animate({
                opacity: 'show'
            });
        }, function () {
            // 防止动画积累
            $(this).find('.express-info').stop(true).animate({
                opacity: 'hide'
            });
        });
    });
})();