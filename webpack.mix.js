const mix = require('laravel-mix');

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

mix

    .styles([
        __dirname + '/Modules/Theme/Resources/css/bootstrap.css',
        __dirname + '/Modules/Theme/Resources/css/style.css',
        __dirname + '/Modules/Theme/Resources/css/global.css',
        __dirname + '/Modules/Theme/Resources/css/header.css',
        __dirname + '/Modules/Theme/Resources/css/footer.css',
        __dirname + '/Modules/Theme/Resources/css/icofont.css',
        __dirname + '/Modules/Theme/Resources/css/font-awesome.css',
        __dirname + '/Modules/Theme/Resources/css/fonts.css',
        __dirname + '/Modules/Theme/Resources/css/flaticon.css',
        __dirname + '/Modules/Theme/Resources/css/animate.css',
        __dirname + '/Modules/Theme/Resources/css/owl.css',
        __dirname + '/Modules/Theme/Resources/css/sidebar.css',
        __dirname + '/Modules/Theme/Resources/css/preloader.css',
        __dirname + '/Modules/Theme/Resources/css/custom-animate.css',
        __dirname + '/Modules/Theme/Resources/css/responsive.css',
        __dirname + '/Modules/Theme/Resources/css/photoswipe-dynamic-caption-plugin.css',
        __dirname + '/Modules/Theme/Resources/css/photoswipe.css',
        __dirname + '/Modules/Gallery/Resources/assets/css/gallery.css',
    ], 'public/css/styles.min.css')

    .scripts([
        __dirname + '/Modules/Theme/Resources/js/jquery.js',
        __dirname + '/Modules/Theme/Resources/js/popper.min.js',
        __dirname + '/Modules/Theme/Resources/js/bootstrap.min.js',
        __dirname + '/Modules/Theme/Resources/js/magnific-popup.min.js',
        __dirname + '/Modules/Theme/Resources/js/jquery.mCustomScrollbar.concat.min.js',
        __dirname + '/Modules/Theme/Resources/js/appear.js',
        __dirname + '/Modules/Theme/Resources/js/parallax.min.js',
        __dirname + '/Modules/Theme/Resources/js/tilt.jquery.min.js',
        __dirname + '/Modules/Theme/Resources/js/jquery.paroller.min.js',
        __dirname + '/Modules/Theme/Resources/js/owl.js',
        __dirname + '/Modules/Theme/Resources/js/wow.js',
        __dirname + '/Modules/Theme/Resources/js/swiper.min.js',
        __dirname + '/Modules/Theme/Resources/js/touchspin.js',
        __dirname + '/Modules/Theme/Resources/js/odometer.js',
        __dirname + '/Modules/Theme/Resources/js/mixitup.js',
        __dirname + '/Modules/Theme/Resources/js/jquery.marquee.min.js',
        __dirname + '/Modules/Theme/Resources/js/nav-tool.js',
        __dirname + '/Modules/Theme/Resources/js/sweetalert.js',
        __dirname + '/Modules/Theme/Resources/js/jquery-ui.js',
        __dirname + '/Modules/Theme/Resources/js/photoswipe.umd.min.js',
        __dirname + '/Modules/Theme/Resources/js/photoswipe-lightbox.umd.min.js',
        __dirname + '/Modules/Theme/Resources/js/photoswipe-dynamic-caption-plugin.umd.min.js',
        __dirname + '/Modules/Theme/Resources/js/script.js',
        __dirname + '/Modules/Gallery/Resources/assets/js/gallery.js',
    ], 'public/js/scripts.min.js')


    .styles([
        __dirname + '/Modules/Standard/Resources/assets/standard.css',
    ], 'public/css/modules.min.css')

    .scripts([
        __dirname + '/Modules/Standard/Resources/assets/standard.js',
    ], 'public/js/modules.min.js')

if (mix.inProduction()) {
    mix.version();
}
