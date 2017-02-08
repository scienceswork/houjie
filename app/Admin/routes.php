<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {
    // 仪表盘
    $router->get('/', 'HomeController@index');
    // 用户管理
    $router->resource('users', 'UserController');
});
