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
Route::get('users/{id}', 'UserController@show')->name('web.users.show');
Route::get('users/{id}/edit', 'UserController@edit')->name('web.users.edit');
Route::get('users/{id}/edit_password', 'UserController@editPassword')->name('web.users.edit_password');
Route::get('users/{id}/edit_email_notify', 'UserController@editEmailNotify')->name('web.users.edit_email_notify');
Route::get('users/{id}/edit_avatar', 'UserController@editAvatar')->name('web.users.edit_avatar');

// 聊天广场
Route::get('feed', 'FeedController@index')->name('web.feeds');