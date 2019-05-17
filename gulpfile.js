const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');

const stylesSCSS = () => {
    // 1. Donde  estan los archivos sass
    // 2. Compilar el sass
    // 3. Donde se almacena de css

    return gulp
        .src('./resources/scss/**/*.scss')
        .pipe(
            sass({
                outputStyle: 'expanded'
            }).on('error', sass.logError)
        )
        .pipe(autoprefixer('last 2 versions'))
        .pipe(gulp.dest('./public/css'));
};

exports.stylesSCSS = stylesSCSS;
