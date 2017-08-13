'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var clean = require('gulp-clean');
var concatCss = require('gulp-concat-css');
var concat = require('gulp-concat');

// Theme screeshot //
gulp.task('theme-screenshot', function () {
  return gulp.src('./app/screenshot/screenshot.png')
    .pipe( gulp.dest('./dist') );
});

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
    './bower_components/bootstrap/dist/css/bootstrap.css',
    './bower_components/components-font-awesome/css/font-awesome.css'
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
gulp.task('template-files', ['images'], function () {
  return gulp.src([
      './app/**/*.php',
      './app/*.css'
  ])
    .pipe( gulp.dest('./dist') );
});

gulp.task('images', ['clean-template-files'], function() {
  return gulp.src([
    './app/img/**/*'
  ])
  .pipe(gulp.dest('./dist/img'));
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

gulp.task('vendor-fonts', function () {
  return gulp.src([
    './bower_components/bootstrap/dist/fonts/**.*',
    './bower_components/components-font-awesome/fonts/**.*'
  ])
    .pipe( gulp.dest('./dist/fonts') );
});

// Default tasks //
gulp.task('watch', function() {
    gulp.watch( './app/sass/**/*.sass', ['css'] );
    gulp.watch( './app/*.php', ['template-files'] );
    gulp.watch( './app/img/**/*', ['template-files'] );
    gulp.watch( './app/inc/template-partials/*.php', ['template-files'] );
    gulp.watch( './app/woocommerce/**/*', ['template-files'] );
    gulp.watch( './app/js/**/*.js', ['js'] );
});

gulp.task('default', ['template-files', 'vendor-fonts', 'css', 'js', 'theme-screenshot']);
