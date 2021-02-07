const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/vuejs/broader/c-broader.js', 'public/js/vuejs/broader');
mix.js('resources/js/vuejs/broader/s-broader.js', 'public/js/vuejs/broader');
mix.js('resources/js/vuejs/narrower/c-narrower.js', 'public/js/vuejs/narrower');
mix.js('resources/js/vuejs/narrower/s-narrower.js', 'public/js/vuejs/narrower');
mix.js('resources/js/vuejs/history/c-history.js', 'public/js/vuejs/history');
mix.js('resources/js/vuejs/history/s-history.js', 'public/js/vuejs/history');
mix.js('resources/js/vuejs/spider/c-spider.js', 'public/js/vuejs/spider');
mix.js('resources/js/vuejs/spider/s-spider.js', 'public/js/vuejs/spider');



