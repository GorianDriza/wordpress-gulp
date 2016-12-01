# wordpress-gulp

-npm install gulp -g

Go inside folder

-npm init
-npm install gulp --save-dev
-npm install es6-promise --save-dev
-npm install gulp-sass gulp-autoprefixer --save-dev (create a folder called sass when you add scss files)
-npm install gulp-rtlcss gulp-rename --save-dev
-npm install gulp-plumber gulp-util --save-dev
-npm install gulp-concat --save-dev

-npm install --save-dev jshint gulp-jshint

At this point, you’ll want to create a .jshintrc configuration file in the theme root, which is a simple JSON file that specifies which JSHint options to turn on or off, for example:
{
  "undef": true,
  "unused": true,
  "browser": true
}



-npm install gulp-uglify --save-dev
-npm install gulp-imagemin --save-dev
-npm install browser-sync --save-dev

# gulpfile.js

require('es6-promise').polyfill();
var gulp          = require('gulp');
var sass          = require('gulp-sass');
var autoprefixer  = require('gulp-autoprefixer');
var rtlcss       = require('gulp-rtlcss');
var rename       = require('gulp-rename');
var plumber = require('gulp-plumber');
var gutil = require('gulp-util');
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

var onError = function (err) {
  console.log('An error occurred:', gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit('end');
};


gulp.task('sass', function() {
  return gulp.src('./sass/*.scss')
  .pipe(plumber({ errorHandler: onError }))
  .pipe(sass())
  .pipe(autoprefixer())
  .pipe(gulp.dest('./'))              // Output LTR stylesheets (style.css)

  .pipe(rtlcss())                     // Convert to RTL
  .pipe(rename({ basename: 'rtl' }))  // Rename to rtl.css
  .pipe(gulp.dest('./'));             // Output RTL stylesheets (rtl.css)
});

gulp.task('js', function() {
  return gulp.src(['./js/*.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(concat('app.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./js'))
});

gulp.task('images', function() {
  return gulp.src('./images/src/*')
    .pipe(plumber({errorHandler: onError}))
    .pipe(imagemin({optimizationLevel: 7, progressive: true}))
    .pipe(gulp.dest('./images/dist'));
});



gulp.task('watch', function() {
  browserSync.init({
    files: ['./**/*.php'],
    proxy: 'http://localhost/wordpress/',
  });
  gulp.watch('./sass/**/*.scss', ['sass', reload]);
  gulp.watch('./js/**/*.js', ['js', reload]);
  gulp.watch('images/src/*', ['images', reload]);
});



gulp.task('default', ['sass','js','images','watch']);