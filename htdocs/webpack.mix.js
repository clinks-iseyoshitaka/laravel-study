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

mix.js('resources/assets/front/js/app.js', 'public/assets/front/js')
    .sass('resources/assets/front/sass/app.scss', 'public/assets/front/css')
    .js('resources/assets/admin/js/app.js', 'public/assets/admin/js')
    .sass('resources/assets/admin/sass/app.scss', 'public/assets/admin/css');

if (mix.inProduction()) {
    mix.version();
}
