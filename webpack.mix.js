const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const imageminPng = require('imagemin-pngquant')
require('laravel-mix-purgecss');

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

mix.js('resources/js/app.js', 'public/js')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .sass('resources/sass/App/argon.scss', 'public/css/app.css')
    .sass('resources/sass/Custom/custom.scss', 'public/css/custom.css')
    .options({
        processCssUrls: false
    }).purgeCss();

if(mix.inProduction()){
    mix.webpackConfig({
        plugins: [
            new CopyWebpackPlugin({
                patterns: [
                    {from: 'resources/images', to: "images"},
                ],
            }),

            new ImageminPlugin({
                test: /\.(jpe?g|png|gif|svg)$/i,
                plugins: [
                    imageminMozjpeg({
                        quality: 50,
                    }),
                    imageminPng()
                ]
            }),
        ]
    });
}

