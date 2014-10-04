var gulp = require('gulp')
var stylus = require('gulp-stylus')
var nib = require('nib')
var please = require('gulp-pleeease')

gulp.task('css', function(){
  return gulp.src('./css/app.styl')
    .pipe(stylus({ use: nib() }))
    .pipe(please())
    .pipe(gulp.dest('./css'))
})

gulp.task('w', function(){
  gulp.watch('./**/*.styl', ['css'])
})

gulp.task('default', ['css']);
