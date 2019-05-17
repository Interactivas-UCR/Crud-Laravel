const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');

//compile scss
function style () {
    // 1. Where is my scss file
    // 2. pass that file through sass compiler
    // 3. where do I save compile css file
    // 4. stream changes to all browser

    return gulp
        .src('./src/scss/**/*.scss')
        .pipe(
            sass({
                // outputStyle: 'compressed'
            }).on('error', sass.logError)
        )
        .pipe(autoprefixer('last 2 versions'))
        .pipe(gulp.dest('./dist/css'))
        .pipe(browserSync.stream());
}

function watch () {
    browserSync.init({
        server: {
            baseDir: './'
        }
    });

    gulp.watch('./src/scss/**/*.scss', style);
    gulp.watch('./*.html').on('change', browserSync.reload);
    gulp.watch('./scr/js/**/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.watch = watch;
