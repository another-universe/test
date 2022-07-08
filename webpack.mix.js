const mix = require('laravel-mix');

mix.js('resources/js/login-page/index.js', 'public/assets/js/login-page.js');

mix.js('resources/js/register-page/index.js', 'public/assets/js/register-page.js');

mix.js('resources/js/init/index.js', 'public/assets/js/init.js');

mix.sass('resources/scss/styles.scss', 'public/assets/css/styles.css');

mix.vue({ version: 3 });
mix.extract();
mix.version();
mix.sourceMaps(false, 'source-map');
