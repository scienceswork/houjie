const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */
// 基础js文件
var basejs = [
    'resources/assets/lib/jquery/dist/jquery.min.js',
    'resources/assets/lib/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/lib/moment/min/moment.min.js',
    'resources/assets/lib/moment/locale/zh-cn.js',
    'resources/assets/lib/layer/build/layer.js'
];

// 使用elixir合并js和css，并且对其进行压缩
elixir(function (mix) {
    mix
        .copy([
            'resources/assets/lib/bootstrap'
        ], 'public/assets/bootstrap')
        .copy([
            'resources/assets/lib/layer/build/skin/default/layer.css'
        ], 'public/assets/js/skin/default/layer.css')
        .sass([
            'base.scss'
        ], 'public/assets/css/app.css')
        .scripts(basejs.concat([
            'resources/assets/js/main.js'
        ]), 'public/assets/js/scripts.js', './');
});

// elixir((mix) => {
//     // mix.sass('app.scss')
//     //    .webpack('app.js');
//     // mix.sass('test.scss');
// });
