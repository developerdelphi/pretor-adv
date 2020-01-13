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

mix.styles([
  'resources/views/vendor/pretor/assets/peace/css/peace-theme-radar.css', //Peace theme
  'node_modules/icheck-bootstrap/icheck-bootstrap.min.css', //icheck format from bootstrap
], 'public/css/all.css');

mix.scripts([
  'resources/views/vendor/pretor/assets/peace/js/peace.js', //peace loading page
  'node_modules/inputmask/dist/bindings/jquery.inputmask.min.js',//inputmask jsD
  //'node_modules/inputmask/dist/bindings/inputmask.js',//inputmask jsD
], 'public/js/all.js');
