'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var clean = require('gulp-clean');
var concatCss = require('gulp-concat-css');
var concat = require('gulp-concat');

// CSS //
gulp.task('css', ['combine-css'], function () {
  return gulp.src('./app/css/**/*', { read: false} )
    .pipe( clean() );
});

gulp.task('combine-css', ['vendor-css'], function () {
  return gulp.src('./app/css/**/*.css')
    .pipe( concatCss("bundle.css") )
    .pipe(gulp.dest('./dist/css'));
});

gulp.task('vendor-css', ['sass'], function () {
  return gulp.src([
    './bower_components/bootstrap/dist/css/bootstrap.css'
  ])
    .pipe( gulp.dest('./app/css') );
});

gulp.task('sass', ['clean-css-dist'], function () {
  return gulp.src('./app/sass/main.sass')
    .pipe( sass().on('error', sass.logError) )
    .pipe( gulp.dest('./app/css') );
});

gulp.task('clean-css-dist', function () {
  return gulp.src('./dist/css/**/*', { read: false} )
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
gulp.task('js', ['concat-js'], function () {
  return gulp.src([
    './app/js/tmp/'
  ], { read: false} )
    .pipe( clean() );
});

gulp.task('concat-js', ['theme-js'], function() {
  return gulp.src('./app/js/tmp/*.js')
    .pipe(concat('bundle.js'))
    .pipe(gulp.dest('./dist/js'));
});

gulp.task('theme-js', ['vendor-js'], function () {
  return gulp.src([
      './app/js/*.js'
  ])
    .pipe( gulp.dest('./app/js/tmp') );
});

gulp.task('vendor-js', ['clean-js'], function () {
  return gulp.src([
      
  ])
    .pipe( gulp.dest('./app/js/tmp') );
});

gulp.task('clean-js', function () {
  return gulp.src([
    './dist/js/**/*'
  ], { read: false} )
    .pipe( clean() );
});

// Default tasks //
gulp.task('watch', function() {
    gulp.watch( './app/sass/**/*.sass', ['css'] );
    gulp.watch( './app/*.php', ['template-files'] );
    gulp.watch( './app/woocommerce/**/*', ['template-files'] );
    gulp.watch( './app/js/**/*.js', ['js'] );
});

gulp.task('default', ['template-files', 'css', 'js']);
