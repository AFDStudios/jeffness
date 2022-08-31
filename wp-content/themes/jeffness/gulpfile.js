/**
 * Gulpfile Config
 * @namespace gulp
 */

// Config Paths
var config = {
  corepath: ''
};

// Load plugins
var gulp = require('gulp'),
  lr = require('gulp-livereload'),
  sass = require('gulp-sass')(require('sass')),
  rename = require('gulp-rename'),
  autoprefixer = require('gulp-autoprefixer'),
  concat = require('gulp-concat'),
  jshint = require('gulp-jshint'),
  minify = require('gulp-minify'),
  notify = require('gulp-notify'),
  uglify = require('gulp-uglify'),
  plumber = require('gulp-plumber'),
  sourcemaps = require('gulp-sourcemaps');

gulp.task('sass-theme', function() {
  return gulp.src([
      config.corepath + 'assets/custom/styles/style.scss'
    ])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed'
    }))
    .pipe(autoprefixer({
      overrideBrowserslist: ['last 3 versions'],
      cascade: false
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.corepath + 'assets/dist/styles'))
    .pipe(lr())
    .pipe(notify('Script Task Complete'))
    .on('error', function(err) {
      console.error('Error!', err.message);
    })
});

// Styles
gulp.task('sass-modules', function() {
  return gulp.src([
      config.corepath + 'modules/**/*.scss'
    ], {base: "./"})
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed'
    }))
    .pipe(autoprefixer({
      overrideBrowserslist: ['last 3 versions'],
      cascade: false
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./'))
    .pipe(notify('Script Task Complete'))
    .pipe(lr())
    .on('error', function(err) {
      console.error('Error!', err.message);
    })
});

//scripts
gulp.task('scripts', function() {
  return gulp.src([
      config.corepath + 'assets/custom/scripts/main.js'
    ])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.corepath + 'assets/dist/scripts'))
    .pipe(notify('Main Script Task Complete'))
});

//Scripts
gulp.task('scripts-modules', function() {
  return gulp.src([
      config.corepath + 'modules/**/*.js', '!' + config.corepath + 'modules/**/*.min.js'
    ], {base: "./"})
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./'))
    .pipe(notify('Modules Script Task Complete'))
    .on('error', function(err) {
      console.error('Error!', err.message);
    })

});

function onError(err) {
  console.log(err);
  this.emit('end');
}

// Watch
gulp.task('watch', function() {
  lr({
    start: true
  });
  lr.listen();
  gulp.watch([config.corepath + 'modules/**/*.scss'], gulp.series('sass-modules'));
  gulp.watch([config.corepath + 'modules/**/*.js', '!' + config.corepath + 'modules/**/*.min.js'], gulp.series(['scripts-modules']));
  gulp.watch([config.corepath + 'assets/custom/styles/**/*.scss'], gulp.series('sass-theme'));
  gulp.watch([config.corepath + 'assets/custom/scripts/*.js'], gulp.series('scripts'));
});