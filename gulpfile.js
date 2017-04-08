'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var clean = require('gulp-clean');

// CSS //
gulp.task('sass', ['clean-css'], function () {
  return gulp.src('./app/sass/main.sass')
    .pipe( sass().on('error', sass.logError) )
    .pipe( gulp.dest('./dist/css') );
});

gulp.task('clean-css', function () {
  return gulp.src('./dist/css', { read: false} )
    .pipe( clean() );
});

// Template files //
gulp.task('copy-template-files', function () {
  return gulp.src([
      './app/**/*.php',
      './app/*.css'
  ])
    .pipe( gulp.dest('./dist') );
});

// Default tasks //
gulp.task('watch', function() {
    gulp.watch( './app/sass/**/*.sass', ['sass'] );
});

gulp.task('default', ['copy-template-files', 'sass']);
