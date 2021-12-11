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


 mix
 .js('resources/js/app.js', 'public/js')
 /* we didnt use sass so no need for this block
 .sass('resources/sass/app.scss', 'public/css')
 .options({
   processCssUrls:false,
   postCss:[require('tailwindcss')],
 })
 */
 .postCss('resources/css/app.css', 'public/css', [
   require('postcss-import'),
   require('tailwindcss'),
   require('postcss-nested'),
   require('autoprefixer'),
 ])

 //.browserSync('http://127.0.0.1:8000')
 .browserSync({
   proxy: 'http://posterio.com:8080',
   watchOptions: {
     ignored: /node_modules/
   }
 });

if (mix.inProduction()) {
 mix
   .version();
}
