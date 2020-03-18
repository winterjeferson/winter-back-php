var gulp = require('gulp');
var sass = require('gulp-sass');//npm install gulp-sass --save-dev // https://www.npmjs.com/package/gulp-sass/
var concat = require('gulp-concat');//npm install gulp-concat --save-dev //https://www.npmjs.com/package/gulp-concat/
var csso = require('gulp-csso');//npm install gulp-csso --save-dev //https://www.npmjs.com/package/gulp-csso/

var wb_configuration = require('./wb_configuration.js');
var wb_project = require('./wb_project.js');
var wb_util = require('./wb_util.js');


var fileCssAdmin = [
    wb_configuration.development + 'css/sass/*.scss',
    wb_configuration.development + 'css/admin/*.scss'
];

var fileCssTheme = [
    wb_configuration.development + 'css/sass/*.scss',
    wb_configuration.development + 'css/theme/*.scss'
];

var cssAdminConcat = fileCssAdmin;
var cssThemeConcat = fileCssTheme;
var fileAdmin = 'wb_admin';
var fileTheme = 'wb_theme';










gulp.task('wb_css_admin_concat', function () {
    return gulp
        .src(cssAdminConcat)
        .pipe(concat(fileAdmin + '.scss'))
        .pipe(gulp.dest(wb_configuration.development + 'css/'));
});

gulp.task('wb_css_admin_sass', function () {
    return gulp
        .src(wb_configuration.development + 'css/' + fileAdmin + '.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(wb_configuration.homologation + 'css/'));
});

gulp.task('wb_css_admin', gulp.series(
    'wb_css_admin_concat',
    'wb_css_admin_sass',
    'wb_beep'
));






gulp.task('wb_css_theme_concat', function () {
    return gulp
        .src(cssThemeConcat)
        .pipe(concat(fileTheme + '.scss'))
        .pipe(gulp.dest(wb_configuration.development + 'css/'));
});

gulp.task('wb_css_theme_sass', function () {
    return gulp
        .src(wb_configuration.development + 'css/' + fileTheme + '.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(wb_configuration.homologation + 'css/'));
});

gulp.task('wb_css_theme', gulp.series(
    'wb_css_theme_concat',
    'wb_css_theme_sass',
    'wb_beep'
));




gulp.task('wb_css_minify', function () {
    return gulp
        .src(wb_configuration.homologation + 'css/*.*')
        .pipe(csso())
        .pipe(gulp.dest(wb_configuration.production + 'css/'));
});




module.exports = {
    cssAdminConcat: cssAdminConcat,
    cssThemeConcat: cssThemeConcat
};