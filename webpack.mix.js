const mix = require('laravel-mix');

// Mix configuration admin
mix.copy('resources/css/adminlte.min.css', 'public/css/adminlte.min.css')
    .copy('resources/css/adminlte.min.css.map', 'public/css/adminlte.min.css.map')
    .copy('resources/css/ijaboCropTool.min.css', 'public/css/ijaboCropTool.min.css')
    .copy('resources/css/colReorder.dataTables.min.css', 'public/css/colReorder.dataTables.min.css')
    .copy('resources/css/jquery.dataTables.min.css', 'public/css/jquery.dataTables.min.css');

mix.copy('resources/js/adminlte.min.js', 'public/js/adminlte.min.js')
    .copy('resources/js/adminlte.min.js.map', 'public/js/adminlte.min.js.map')
    .copy('resources/js/ijaboCropTool.min.js', 'public/js/ijaboCropTool.min.js')
    .copy('resources/js/jquery.dataTables.min.js', 'public/js/jquery.dataTables.min.js')
    .copy('resources/js/dataTables.colReorder.min.js', 'public/js/dataTables.colReorder.min.js');
    
mix.js('resources/js/app.js', 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sourceMaps();

mix.css('resources/css/app.css', 'public/css/app.css');

// Mix configuration app
mix.copy('resources/css/style.css', 'public/css/style.css')
    .copy('resources/css/line-awesome.min.css', 'public/css/line-awesome.min.css')

// Fim

mix.version();