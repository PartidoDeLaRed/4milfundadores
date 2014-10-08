var gulp = require('gulp')
var stylus = require('gulp-stylus')
var nib = require('nib')
var please = require('gulp-pleeease')
var browserify = require('gulp-browserify')
var rename = require('gulp-rename')
var uglify = require('gulp-uglify')

gulp.task('css', function(){
  return gulp.src('./css/app.styl')
    .pipe(stylus({ use: nib() }))
    .pipe(please())
    .pipe(gulp.dest('./css'))
})

gulp.task('js', function() {
  gulp.src('./js/app.js')
    .pipe(browserify({
      shim: {
        H5F: {
          path: './js/lib/H5F.js',
          exports: 'H5F'
        }
      }
    }))
    .pipe(uglify())
    .pipe(rename('app.min.js'))
    .pipe(gulp.dest('./js'))
})

gulp.task('w', function(){
  gulp.watch('./css/**/*.styl', ['css'])
  gulp.watch('./js/**/*.js', ['js'])
})

gulp.task('default', ['css', 'js'])
