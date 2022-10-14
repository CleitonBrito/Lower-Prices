const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |

] | for your Laravel application. By default, we are compiling the Sas]
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').version();

mix.styles([
    'public/css/home.css',
    'public/css/geral.css'
    ], 'public/css/all.css').version();
