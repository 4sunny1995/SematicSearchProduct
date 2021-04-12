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
mix.js('resources/js/vuejs/dashboard/c-dashboard.js', 'public/js/vuejs/dashboard');
mix.js('resources/js/vuejs/dashboard/s-dashboard.js', 'public/js/vuejs/dashboard');
mix.js('resources/js/vuejs/email/c-email.js', 'public/js/vuejs/email');
mix.js('resources/js/vuejs/email/s-email.js', 'public/js/vuejs/email');

//Shop Site
mix.js('resources/js/vuejs/mainpage/c-mainpage.js', 'public/js/vuejs/mainpage');
mix.js('resources/js/vuejs/mainpage/s-mainpage.js', 'public/js/vuejs/mainpage');
mix.js('resources/js/vuejs/mainpage/s-like.js', 'public/js/vuejs/mainpage');
mix.js('resources/js/vuejs/leftmenu/c-leftmenu.js', 'public/js/vuejs/leftmenu');
mix.js('resources/js/vuejs/leftmenu/s-leftmenu.js', 'public/js/vuejs/leftmenu');
mix.js('resources/js/vuejs/credit/c-credit.js', 'public/js/vuejs/credit');
mix.js('resources/js/vuejs/credit/s-credit.js', 'public/js/vuejs/credit');
mix.js('resources/js/vuejs/reward/c-reward.js', 'public/js/vuejs/reward');
mix.js('resources/js/vuejs/reward/s-reward.js', 'public/js/vuejs/reward');
mix.js('resources/js/vuejs/coupon/c-coupon.js', 'public/js/vuejs/coupon');
mix.js('resources/js/vuejs/coupon/s-coupon.js', 'public/js/vuejs/coupon');
mix.js('resources/js/vuejs/coupon-history/c-coupon-history.js', 'public/js/vuejs/coupon-history');
mix.js('resources/js/vuejs/coupon-history/s-coupon-history.js', 'public/js/vuejs/coupon-history');
mix.js('resources/js/vuejs/reward-history/c-reward-history.js', 'public/js/vuejs/reward-history');
mix.js('resources/js/vuejs/reward-history/s-reward-history.js', 'public/js/vuejs/reward-history');
mix.js('resources/js/vuejs/credit-history/c-credit-history.js', 'public/js/vuejs/credit-history');
mix.js('resources/js/vuejs/credit-history/s-credit-history.js', 'public/js/vuejs/credit-history');
 mix.js('resources/js/vuejs/category/c-category.js', 'public/js/vuejs/category');
 mix.js('resources/js/vuejs/category/s-category.js', 'public/js/vuejs/category');

//User
mix.js('resources/js/vuejs/user/c-user.js', 'public/js/vuejs/user');
mix.js('resources/js/vuejs/user/s-user.js', 'public/js/vuejs/user');
 //Post
 mix.js('resources/js/vuejs/post/c-post.js', 'public/js/vuejs/post');
 mix.js('resources/js/vuejs/post/s-post.js', 'public/js/vuejs/post');

 //Product
mix.js('resources/js/vuejs/product/c-product.js', 'public/js/vuejs/product');
mix.js('resources/js/vuejs/product/s-product.js', 'public/js/vuejs/product');
mix.js('resources/js/vuejs/productdetail/c-productdetail.js', 'public/js/vuejs/productdetail');
mix.js('resources/js/vuejs/productdetail/s-productdetail.js', 'public/js/vuejs/productdetail');

//crawler history
mix.js('resources/js/vuejs/crawler-histories/c-crawler-histories.js', 'public/js/vuejs/crawler-histories');
mix.js('resources/js/vuejs/crawler-histories/s-crawler-histories.js', 'public/js/vuejs/crawler-histories');


