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

mix.js('resources/js/app.js', 'public/assets/js')
    .sass('public/assets/sass/app.scss', 'public/assets/css');

mix.styles([
    'public/assets/css/app.css'
], 'public/assets/css/app.min.css');

mix.scripts([
    'public/assets/js/app.js'
], 'public/assets/js/app.min.js');
