var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // mix.copy('bower_components/jquery/dist/jquery.min.js', 'resources/assets/js/jquery.min.js');
    // mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'resources/assets/js/bootstrap.min.js');
    // mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts');
    // mix.copy('bower_components/font-awesome/fonts', 'public/fonts');
    // mix.copy('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'resources/assets/js/bootstrap-datetimepicker.min.js');
    // mix.copy('bower_components/eonasdan-bootstrap-datetimepicker/src/sass', 'resources/assets/sass');
    // mix.copy('bower_components/moment/min/moment.min.js', 'resources/assets/js/moment.min.js');
    // mix.copy('bower_components/moment/locale/nl.js', 'resources/assets/js/moment-nl.js');
    // mix.copy('bower_components/datatables/media/js/jquery.dataTables.js', 'resources/assets/js/datatables');
    // mix.copy('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css', 'resources/assets/sass/datatables/dataTables.bootstrap.scss');
    // mix.copy('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js', 'resources/assets/js/datatables');

    mix.sass('app.scss');
    mix.sass('admin.scss');

    mix.scripts(['jquery.min.js','bootstrap.min.js']);
    mix.scripts(['moment.min.js','moment-nl.js','bootstrap-datetimepicker.min.js','datatables/jquery.dataTables.js','datatables/dataTables.bootstrap.js'],'public/js/admin.js');
    
    mix.browserSync({
        proxy: 'planb.int'
    });
});
