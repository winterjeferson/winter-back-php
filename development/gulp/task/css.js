var gulp = require('gulp');
var sass = require('gulp-sass');//npm install gulp-sass --save-dev // https://www.npmjs.com/package/gulp-sass/
var concat = require('gulp-concat');//npm install gulp-concat --save-dev //https://www.npmjs.com/package/gulp-concat/
var csso = require('gulp-csso');//npm install gulp-csso --save-dev //https://www.npmjs.com/package/gulp-csso/

var configuration = require('./configuration.js');
var project = require('./project.js');
var util = require('./util.js');


var fileCssAdmin = [
    configuration.development + 'css/admin/*.scss'
];

var fileCssTheme = [
    configuration.development + 'css/theme/*.scss'
];

var cssAdminConcat = fileCssAdmin;
var cssThemeConcat = fileCssTheme;
var fileAdmin = 'admin';
var fileTheme = 'theme';










gulp.task('css_admin_concat', function () {
    return gulp
        .src(cssAdminConcat)
        .pipe(concat(fileAdmin + '.scss'))
        .pipe(gulp.dest(configuration.development + 'css/'));
});

gulp.task('css_admin_sass', function () {
    return gulp
        .src(configuration.development + 'css/' + fileAdmin + '.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(configuration.homologation + 'css/'));
});

gulp.task('build_css_admin', gulp.series(
    'css_admin_concat',
    'css_admin_sass',
    'beep'
));






gulp.task('css_theme_concat', function () {
    return gulp
        .src(cssThemeConcat)
        .pipe(concat(fileTheme + '.scss'))
        .pipe(gulp.dest(configuration.development + 'css/'));
});

gulp.task('css_theme_sass', function () {
    return gulp
        .src(configuration.development + 'css/' + fileTheme + '.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(configuration.homologation + 'css/'));
});

gulp.task('build_css_theme', gulp.series(
    'css_theme_concat',
    'css_theme_sass',
    'beep'
));




gulp.task('css_minify', function () {
    return gulp
        .src(configuration.homologation + 'css/*.*')
        .pipe(csso())
        .pipe(gulp.dest(configuration.production + 'css/'));
});




module.exports = {
    cssAdminConcat: cssAdminConcat,
    cssThemeConcat: cssThemeConcat
};