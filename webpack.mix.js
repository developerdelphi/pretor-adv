const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/views/vendor/pretor/assets/peace/css/peace-theme-radar.css', //Peace theme
    'node_modules/icheck-bootstrap/icheck-bootstrap.min.css', //icheck format from bootstrap
], 'public/css/all.css');

mix.scripts([
    'resources/views/vendor/pretor/assets/peace/js/peace.js', //peace loading page
    'node_modules/inputmask/dist/bindings/jquery.inputmask.min.js', //inputmask jsD
    //'node_modules/inputmask/dist/bindings/inputmask.js',//inputmask jsD
    'resources/js/includes/search.js',
], 'public/js/all.js');

mix.scripts('resources/assets/semantic/dist/semantic.min.js', 'public/js/semantic.js')
    .styles('resources/assets/semantic/dist/semantic.min.css', 'public/css/semantic.css');
mix.copy('resources/assets/semantic/dist/themes/default/assets/fonts/icons.woff', 'public/css/themes/default/assets/fonts/icons.woff')
    .copy('resources/assets/semantic/dist/themes/default/assets/fonts/icons.woff2', 'public/css/themes/default/assets/fonts/icons.woff2')
    .copy('resources/assets/semantic/dist/themes/default/assets/fonts/icons.ttf', 'public/css/themes/default/assets/fonts/icons.ttf');
