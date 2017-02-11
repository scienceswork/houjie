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
    // 点击签到
    $('#sign').on('click', function () {
        layer.msg('恭喜你签到成功，积分+1');
    });
    // 小彩蛋
    console.log('一位新人，要经历怎样的成长，才能站在技术之巅？\n' +
        '人生中有两道菜是必须吃的，一道是吃苦，一道是吃亏。\n' +
        '%c后街胡同&串猪神', "color:red");
})();