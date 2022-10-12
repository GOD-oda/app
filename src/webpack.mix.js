const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/cool_word.js', 'public/js')
    .sass('resources/sass/cool_word.scss', 'public/css')
    .js('resources/js/json_to_code.js', 'public/js')
    .sass('resources/sass/json_to_code.scss', 'public/css')
    .options({
       processCssUrls: false
    });
