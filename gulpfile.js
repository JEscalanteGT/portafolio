var gulp = require('gulp'),
    rename = require('gulp-rename'),
    minifyHTML = require('gulp-minify-html'),
    stylus = require('gulp-stylus'),
    nib = require('nib'),
    util = require('gulp-util');

gulp.task('html', function () {
  var htmlSrc = './resources/assets/templates/*.html',
  htmlDst = './resources/views';

  gulp.src(htmlSrc)
  .pipe(minifyHTML())
  .pipe(rename(function(path){
    path.extname = '.blade.php';
  }))
  .pipe(gulp.dest(htmlDst));
});

gulp.task('stylus', function () {
  var filename = (util.env.filename ? util.env.filename : 'index');
  var cssSrc = './resources/assets/stylus/main-'+ filename +'.styl',
  cssDst = './public/css';

  gulp.src(cssSrc)
  .pipe(stylus({
    use: nib(),
    compress: true
  }))
  .pipe(gulp.dest(cssDst));
});

gulp.task('toLaravel', ['html','stylus'], function (){
  gulp.watch("./resources/assets/templates/*.html", ['html']);
  gulp.watch("./resources/assets/stylus/*.styl", ['stylus']);
});
