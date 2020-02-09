let mix = require('laravel-mix');

mix.styles([
    'public/front/assets/css/style.css',
], 'public/dist/style.css')

mix.scripts([
    'public/front/assets/js/shamsvue.js',
    'public/front/assets/js/main.js',
], 'public/dist/shams.js')