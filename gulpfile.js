var elixir = require('laravel-elixir');
var bowerDir = 'vendor/bower_components/';
var gulp = require('gulp');

elixir(function(mix) {
 mix.copy(bowerDir + 'bootstrap/fonts', 'public/fonts')
     /*Font-Awesome*/
     .copy(bowerDir + 'font-awesome/fonts', 'public/fonts')

     /* Copy sweetalert assets */
     .copy(bowerDir + 'sweetalert/dist/sweetalert.css', 'public/css/sweetalert.css')
     .copy(bowerDir + 'sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')

     /*WOW.js*/
     .copy(bowerDir + 'wow/dist/wow.min.js', 'public/js/wow.min.js')

     /*isotope.js*/
     .copy(bowerDir + 'isotope/dist/isotope.pkgd.min.js', 'public/js/isotope.pkgd.min.js')

     .copy(bowerDir + 'jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
     .copy(bowerDir + 'bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')

     .less('bootstrap.less')

     .less('font-awesome.less');
});

gulp.task('icons', function() {
    return gulp.src(config.bowerDir + '/fontawesome/fonts/**.*')
        .pipe(gulp.dest('./public/fonts'));
});