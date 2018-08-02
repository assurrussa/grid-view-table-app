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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('packages/assurrussa/grid-view-table/resources/assets/js/app.js', 'public/js/amigrid.js')
    .js('packages/assurrussa/grid-view-table/resources/assets/js/app-full.js', 'public/js/amigrid-full.js')
    .sass('packages/assurrussa/grid-view-table/resources/assets/sass/app.scss', 'public/css/amigrid.css');
