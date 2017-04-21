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
gulp.task('template-files', ['clean-template-files'], function () {
  return gulp.src([
      './app/**/*.php',
      './app/*.css'
  ])
    .pipe( gulp.dest('./dist') );
});

gulp.task('clean-template-files', function () {
  return gulp.src([
    './dist/*.php',
    './dist/*.css',
    './dist/woocommerce/**/*'
  ], { read: false} )
    .pipe( clean() );
});

// JS //
gulp.task('js', ['clean-js'], function () {
  return gulp.src([
      './app/js/**/*.js'
  ])
    .pipe( gulp.dest('./dist/js') );
});

gulp.task('clean-js', function () {
  return gulp.src([
    './dist/js/**/*.js'
  ], { read: false} )
    .pipe( clean() );
});

// Default tasks //
gulp.task('watch', function() {
    gulp.watch( './app/sass/**/*.sass', ['sass'] );
    gulp.watch( './app/*.php', ['template-files'] );
    gulp.watch( './app/woocommerce/**/*', ['template-files'] );
    gulp.watch( './app/*.css', ['template-files'] );
    gulp.watch( './app/js/**/*.js', ['js'] );
});

gulp.task('default', ['template-files', 'sass', 'js']);
