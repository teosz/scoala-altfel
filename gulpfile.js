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
    mix.sass(['../../../bower_components/**/*.scss', 'app.scss'], 'public/assets/css/app.css');
    mix.sass('login.scss', 'public/assets/css/login.css');
    mix.styles('../../../bower_components/**/*.css', 'public/assets/css/styles.css');
    mix.copy('bower_components/light-bootstrap-dashboard/assets/js', 'public/assets/js');
    mix.copy('bower_components/light-bootstrap-dashboard/assets/img', 'public/assets/img');
    mix.copy('resources/assets/img', 'public/assets/img');
    mix.copy('resources/assets/fonts', 'public/assets/fonts');
    mix.copy('bower_components/light-bootstrap-dashboard/assets/fonts', 'public/assets/fonts');

});
