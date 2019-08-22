let mix = require('laravel-mix');

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

mix.styles([
    'bower_components/bootstrap/dist/css/bootstrap.min.css',
    'bower_components/font-awesome/css/font-awesome.min.css',
    'public/css/inner.css',
], 'public/css/all.css');


mix.scripts([
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/bootstrap/js/bootstrap.min.js'
], 'public/js/all.js');

mix.copyDirectory('bower_components/bootstrap/fonts', 'public/fonts');
mix.copyDirectory('bower_components/font-awesome/fonts', 'public/fonts');