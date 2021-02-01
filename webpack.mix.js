const mix = require("laravel-mix");

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
/*Notas sass se compila a css
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/

mix.js(
        [
            'resources/js/global/app.js',
            'resources/js/backend/app.js',
            'resources/js/global/init.js'
        ],
        'public/js/backend'
    )
    .sass('resources/sass/backend/app.scss', 'public/css/backend')
    .js(
        [
            'resources/js/global/app.js',
            'resources/js/frontend/app.js',
            'resources/js/global/init.js'
        ],
        'public/js/frontend'
    )
    .sass('resources/sass/frontend/app.scss', 'public/css/frontend');