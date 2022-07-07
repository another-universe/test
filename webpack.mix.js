const mix = require('laravel-mix');

mix.js('resources/js/init/index.js', 'public/assets/js/init.js');

mix.sass('resources/scss/styles.scss', 'public/assets/css/styles.css');

mix.vue({ version: 3 });
mix.extract();
mix.version();
mix.sourceMaps(false, 'source-map');
