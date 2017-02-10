<?php
// 根据路由判断是否激活
function navViewActive($anchor)
{
    return Route::currentRouteName() == $anchor ? 'active' : '123';
}