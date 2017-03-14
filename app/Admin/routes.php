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
    // 酷站管理
    $router->resource('cool_sites', 'CoolSiteController');
    // 新闻分类管理
    $router->resource('category', 'CategoryController');
    // 新闻管理
    $router->resource('news', 'NewsController');
    // 情书管理
    $router->resource('express', 'ExpressController');
    // 教师在线管理
    $router->resource('teacher', 'TeacherController');
    // 教师在线帖子管理
    $router->resource('topic', 'TopicController');
    // 教师在线评论管理
    $router->resource('replyTopic', 'ReplyTopicController');
    // 友情链接
    $router->resource('link', 'LinkController');
    // 社区文章管理
    $router->resource('article', 'ArticleController');
    // 社区评论管理
    $router->resource('comment_article', 'ReplyArticleController');
    // 社区分类管理
    $router->resource('category_community', 'CategoryCommunityController');
    // 广场说说
    $router->resource('feed', 'FeedController');
    // 说说评论管理
    $router->resource('comment_feed', 'CommentFeedController');
});
Admin::registerHelpersRoutes();
