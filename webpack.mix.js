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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

   mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css','resources/assets/css/bootstrap.min.css');
   mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js','resources/assets/js/bootstrap.min.js');
   mix.copy('node_modules/jquery/dist/jquery.min.js','resources/assets/js/jquery.min.js');


   mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/custom.css',
    'resources/assets/custom/index/style.css'
   	],'public/css/mixed.css');



   mix.scripts([
   'resources/assets/js/jquery.min.js',
   'resources/assets/js/bootstrap.min.js',
   'resources/assets/custom/ajax.js',
   'resources/assets/js/custom.js'

   	],'public/js/mixed.js');
