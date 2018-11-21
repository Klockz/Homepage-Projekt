var gulp                = require('gulp'),
      browserSync  = require('browser-sync').create(),
      scss                = require('gulp-sass'),
      autoprefixer    = require('gulp-autoprefixer'),
      fileinclude       = require('gulp-file-include'),
      sourcemaps   = require('gulp-sourcemaps'),
      notify              = require('gulp-notify'),
      imagemin       = require('gulp-imagemin'),
      minifyCss       = require('gulp-minify-css'),
      del                  = require('del'),
      plumber          = require('gulp-plumber'),
      browserify      = require('browserify'),
      runSequence = require('run-sequence'),
      source           = require('vinyl-source-stream');
                      
var notifyError = function(err, lang) {
  console.log("------------------ error ------------------");
  console.log(err.toString());
  console.log("-------------------------------------------");
  notify.onError({
    title: lang + " error",
    message: "Check console",
    sound: "Basso"
  })(err);
};

gulp.task('fileinclude', function() {
  gulp.src(['app/html/pages/**/*.php'])
    .pipe(fileinclude({
      prefix: '<!--@@',
      suffix: '-->',
      basepath: './app/html/'
    }))
    .pipe(gulp.dest('app/'));
});

gulp.task('scss', function() {
  return gulp.src("app/scss/*.scss")
    .pipe(plumber(function(){
       this.emit('end');
    }))
    .pipe(sourcemaps.init())
    .pipe(scss({
      errLogToConsole: true
    }))
    .on("error", function(err) {
      notifyError(err, "SASS")
    })
    .pipe(sourcemaps.write()) 
    .pipe(gulp.dest("app/"))
    .pipe(browserSync.stream())
    .pipe(plumber.stop());
});

gulp.task('scripts', function() {
  return browserify('./app/js/main.js', { debug: true })
      .bundle()
      .on("error", function(err) {
        notifyError(err, "JS")
      })
      .pipe(source('main.min.js'))
      .pipe(gulp.dest('app/js'));
});

gulp.task('serve', gulp.series('fileinclude', 'scss', 'scripts'), function() {
  browserSync.init({
    proxy: 'localhost:8080',
    open: false,
    ghostMode: false
  });
  gulp.watch("app/scss{,/**}", ['scss']);
  gulp.watch(["app/html{,/**}"], ['fileinclude']);
  gulp.watch(["app/*.php"]).on('change', browserSync.reload);
  gulp.watch(['app/js/{,/**}','!app/js/main.min.js'], ['scripts']);
  gulp.watch(['app/js/main.min.js']).on('change', browserSync.reload);
});

gulp.task('default', gulp.series('serve'));

/** DIST TASKS **/
gulp.task('dist', function(callback) {
  runSequence('clean-dist', 'fileinclude', 'scss-dist', 'copy-to-dist', 'copy-images', 'copy-js');
});

gulp.task('clean-dist', function(){
  del.sync(['dist/**/*', '!dist', '!dist/sftp-config.json']);
});
gulp.task('copy-to-dist', function(){
  return gulp.src(['app{,/**}', '!app/scss{,/**}', '!app/img{,/**}', '!app/js{,/**}', '!app/html{,/**}'], {base: "./app"})
    .pipe(gulp.dest('dist/'));
});
gulp.task('copy-images', function () {
  return gulp.src(['app/img/**/*'], {base: "./app"})
    .pipe(imagemin())
    .pipe(gulp.dest('dist/'));
});
gulp.task('copy-js', function () {
  return gulp.src(['app/js/main.min.js', 'app/js/libs/**'], {base: "./app"})
    .pipe(gulp.dest('dist/'));
});

gulp.task('scss-dist', function() {
  return gulp.src("app/scss/*.scss")
    .pipe(scss({
      errLogToConsole: false
    }))
    .on("error", function(err) {
      notifyError(err, "SASS")
    })
    .pipe(minifyCss({
      compatibility: 'ie8',
      keepSpecialComments: 0
    }))
    .pipe(gulp.dest("app/"))
    .pipe(browserSync.stream());
});