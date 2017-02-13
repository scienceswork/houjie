<?php
// 根据路由判断是否激活
function navViewActive($anchor)
{
    return Route::currentRouteName() == $anchor ? 'active' : '123';
}

/**
 * 得到七牛cdn上100x100头像
 * @param $avatar 头像路径
 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
 */
function avatar_min($avatar)
{
    $avatar = $avatar ? $avatar : 'avatar/default.jpeg';
    return url(env('QINIU_WEB') . $avatar . '?imageView2/1/w/100/h/100/interlace/0/q/100');
}