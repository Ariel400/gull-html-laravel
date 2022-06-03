const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve(
                __dirname,
                'resources/assets/js'
            )
        }
    }
})

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
    .sass('resources/scss/style.scss', 'public/css')
    .version();
