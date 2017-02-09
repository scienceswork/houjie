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
    'resources/assets/lib/jquery/dist/jquery.min.js'
];

// 使用elixir合并js和css，并且对其进行压缩
elixir(function (mix) {
    mix.scripts(basejs, 'public/assets/js/scripts.js', './');
});

// elixir((mix) => {
//     // mix.sass('app.scss')
//     //    .webpack('app.js');
//     // mix.sass('test.scss');
// });
