;(function () {
    // 开启tooltip提示
    $('[data-toggle="tooltip"]').tooltip();
    // 设置时间语言为中文
    // moment.lang('zh-cn');
    // 设置时间格式
    $('.timeago').each(function () {
        var time_str = $(this).text();
        if(moment(time_str, "YYYY-MM-DD HH:mm:ss", true).isValid()) {
            $(this).text(moment(time_str).fromNow());
        }
        // $(this).addClass('popover-with-html');
        $(this).attr('data-original-title', time_str);
    });
})();