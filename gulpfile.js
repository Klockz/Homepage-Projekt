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

var styleWatch  = 'app/scss/**';
var htmlWatch  = 'app/html/**';
var jsWatch  = 'app/js/**'/*,'!app/js/main.min.js'*/;
var mainjsWatch  = 'app/js/main.min.js';
var phpWatch = 'app/*.php';
                      
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

function fileinclude(done) {
  gulp.src(['app/html/pages/**/*.php'])
    .pipe(fileinclude({
      prefix: '<!--@@',
      suffix: '-->',
      basepath: './app/html/'
    }))
    .pipe(gulp.dest('app/'));
    done();
};

function scss(src) {
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
};

function scripts(done) {
  return browserify('./app/js/main.js', { debug: true })
      .bundle()
      .on("error", function(err) {
        notifyError(err, "JS")
      })
      .pipe(source('main.min.js'))
      .pipe(gulp.dest('app/js'));
      done();
};

function serve(done) {
  browserSync.init({
    proxy: 'Rensfyn:8080',
    open: false,
    ghostMode: false
  });
}

  function watchfiles() {
    gulp.watch(styleWatch, scss);
    gulp.watch(htmlWatch, fileinclude);
    gulp.watch(phpWatch, browserSync.reload);
    gulp.watch(jsWatch, scripts);
    gulp.watch(mainjsWatch, browserSync.reload);
  }

/*  gulp.watch("app/scss{,/**}", gulp.task('scss'));
  gulp.watch(["app/html{,/**}"], gulp.task('fileinclude'));
  gulp.watch(["app/*.php"]).on('change', browserSync.reload);
  gulp.watch(['app/js/{,/**}','!app/js/main.min.js'], ['scripts']);
  gulp.watch(['app/js/main.min.js']).on('change', browserSync.reload);
  done();
};*/

gulp.task('serve', serve);

gulp.task('scripts', scripts);

gulp.task('scss', scss);

gulp.task('fileinclude', fileinclude);

gulp.task('default', gulp.series(serve, fileinclude, scripts, scss, watchfiles));

/** DIST TASKS **/
function dist(callback) {
  gulp.series(cleandist, fileinclude, scssdist, copytodist, copyimages, copyjs);
}

function cleandist(done){
  del.sync(['dist/**/*', '!dist', '!dist/sftp-config.json']);
  done();
}

function copytodist(){
  return gulp.src(['app{,/**}', '!app/scss{,/**}', '!app/img{,/**}', '!app/js{,/**}', '!app/html{,/**}'], {base: "./app"})
    .pipe(gulp.dest('dist/'));
}

function copyimages () {
  return gulp.src(['app/img/**/*'], {base: "./app"})
    .pipe(imagemin())
    .pipe(gulp.dest('dist/'));
}

function copyjs () {
  return gulp.src([mainjsWatch, 'app/js/libs/**'], {base: "./app"})
    .pipe(gulp.dest('dist/'));
}

function scssdist() {
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
  }