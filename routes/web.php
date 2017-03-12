<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 首页
Route::get('/', 'HomeController@index')->name('home');

// 认证服务
Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('auth.login');
    Route::post('login', 'LoginController@login')->name('auth.login.store');
    Route::post('logout', 'LoginController@logout')->name('auth.logout');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('auth.password.reset.store');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('auth.password.reset.token');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('auth.register');
    Route::post('register', 'RegisterController@register')->name('auth.register.store');
});
//Auth::routes();

Route::get('/home', 'HomeController@index');

// 用户
Route::get('users/{id}', 'UsersController@show')->name('web.users.show');
Route::get('users/{id}/article', 'UsersController@article')->name('web.users.article');
Route::get('users/{id}/feed', 'UsersController@feed')->name('web.users.feed');
Route::get('users/{id}/vote_feed', 'UsersController@voteFeed')->name('web.users.vote');
Route::get('users/{id}/cool', 'UsersController@cool')->name('web.users.cool');
Route::get('users/{id}/edit', 'UsersController@edit')->name('web.users.edit');
Route::post('users/{id}', 'UsersController@update')->name('web.users.update');
Route::get('users/{id}/edit_password', 'UsersController@editPassword')->name('web.users.edit_password');
Route::post('users/{id}/update_password', 'UsersController@updatePassword')->name('web.users.update_password');
//Route::get('users/{id}/edit_email_notify', 'UsersController@editEmailNotify')->name('web.users.edit_email_notify');
Route::get('users/{id}/edit_avatar', 'UsersController@editAvatar')->name('web.users.edit_avatar');
Route::post('users/{id}/update_avatar', 'UsersController@updateAvatar')->name('web.users.update_avatar');

// 验证邮箱
//Route::get('verification/{token}', 'UsersController@getVerification');
Route::get('/email-verification-required', 'UsersController@emailVerificationRequired')->name('email-verification-required');
Route::post('/users/send-verification-mail', 'UsersController@sendVerificationMail')->name('users.send-verification-mail');

// 聊天广场
Route::get('feed', 'FeedController@index')->name('web.feed.index');
Route::post('feed', 'FeedController@store')->name('web.feed.store')->middleware('verified_email');;
Route::post('vote', 'FeedController@vote')->name('web.feed.vote')->middleware('verified_email');;
Route::post('reply', 'FeedController@reply')->name('web.feed.reply')->middleware('verified_email');;

// 酷站展示
Route::get('cool', 'CoolSiteController@index')->name('web.cool.index');
Route::post('cool', 'CoolSiteController@store')->name('web.cool.store');
Route::get('cool/create', 'CoolSiteController@create')->name('web.cool.create')->middleware('verified_email');;
Route::get('cool/{id}', 'CoolSiteController@show')->name('web.cool.show');

// 页面
Route::get('about', 'PagesController@getAbout')->name('web.pages.about');
Route::get('contact', 'PagesController@getContact')->name('web.pages.contact');
Route::get('help', 'PagesController@getHelp')->name('web.pages.help');
Route::get('protocol', 'PagesController@getProtocol')->name('web.pages.protocol');
Route::get('links', 'PagesController@getLinks')->name('web.pages.links');
Route::get('privacy', 'PagesController@getPrivacy')->name('web.pages.privacy');

// 发现
Route::get('news', 'NewsController@index')->name('web.news.index');
Route::get('news/{id}', 'NewsController@show')->name('web.news.show');
Route::post('news/{id}', 'NewsController@reply')->name('web.news.reply')->middleware('verified_email');;
Route::get('news/{slug}', 'NewsController@category')->name('web.news.category');

// 签到
Route::get('sign', 'SignController@sign')->name('web.sign.sign');

// 传情
Route::get('love', 'ExpressController@index')->name('web.express.index');
Route::post('love/validate', 'ExpressController@validatePassword')->name('web.express.validate');
Route::post('love/create', 'ExpressController@create')->name('web.express.create');
Route::get('love/search', 'ExpressController@search')->name('web.express.search');

// 支付功能
//Route::Group(['namespace' => 'Money'], function () {
//    Route::get('pay', 'AlipayController@index')->name('web.alipay.pay');
//});

// 教师在线
Route::group(['prefix' => 'teacher'], function () {
    Route::get('/', 'TeacherController@index')->name('web.teacher.index'); // 首页
    Route::get('{id}', 'TeacherController@show')->name('web.teacher.show'); // 教师在线分类
    Route::get('{id}/create', 'TeacherController@createTopic')->name('web.teacher.createTopic')->middleware('verified_email');; // 发帖
    Route::post('{id}/create', 'TeacherController@topicStore')->name('web.teacher.topicStore')->middleware('verified_email');; // 提交发帖
    Route::get('topic/{id}', 'TeacherController@topicShow')->name('web.teacher.topicShow'); // 查看帖子
    Route::post('topic/{id}', 'TeacherController@topicReplyStore')->name('web.teacher.topicReplyStore')->middleware('verified_email');; // 提交评论
    Route::get('create', 'TeacherController@create')->name('web.teacher.create')->middleware('verified_email');;
    Route::post('create', 'TeacherController@store')->name('web.teacher.store')->middleware('verified_email');;
});

// 社区
Route::group(['prefix' => 'community'], function () {
    Route::get('/', 'CommunityController@index')->name('web.community.index'); // 社区首页
    Route::get('{id}', 'CommunityController@show')->name('web.community.show'); // 帖子展示
    Route::post('{id}', 'CommunityController@replyStore')->name('web.community.replyStore'); // 提交评论
    Route::get('create', 'CommunityController@create')->name('web.community.create')->middleware('verified_email');; // 发帖
    Route::post('create', 'CommunityController@store')->name('web.community.store')->middleware('verified_email');; // 提交发帖
});