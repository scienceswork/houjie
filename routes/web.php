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

Route::get('/', function () {
    return view('welcome');
})->name('home');

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
Route::get('users/{id}/edit', 'UsersController@edit')->name('web.users.edit');
Route::post('users/{id}', 'UsersController@update')->name('web.users.update');
Route::get('users/{id}/edit_password', 'UsersController@editPassword')->name('web.users.edit_password');
Route::post('users/{id}/update_password', 'UsersController@updatePassword')->name('web.users.update_password');
Route::get('users/{id}/edit_email_notify', 'UsersController@editEmailNotify')->name('web.users.edit_email_notify');
Route::get('users/{id}/edit_avatar', 'UsersController@editAvatar')->name('web.users.edit_avatar');
Route::post('users/{id}/update_avatar', 'UsersController@updateAvatar')->name('web.users.update_avatar');
Route::get('users/cool/{id}', 'UsersController@userCoolSite')->name('web.users.coolSite');

// 聊天广场
Route::get('feed', 'FeedController@index')->name('web.feeds');

// 酷站展示
Route::get('cool', 'CoolSiteController@index')->name('web.cool.index');
Route::post('cool', 'CoolSiteController@store')->name('web.cool.store');
Route::get('cool/create', 'CoolSiteController@create')->name('web.cool.create');
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
Route::get('news/{slug}', 'NewsController@category')->name('web.news.category');

// 签到
Route::get('sign', 'SignController@sign')->name('web.sign.sign');

// 传情
Route::get('love', 'ExpressController@index')->name('web.express.index');

// 支付功能
Route::Group(['namespace' => 'Money'], function () {
    Route::get('pay', 'AlipayController@index')->name('web.alipay.pay');
});