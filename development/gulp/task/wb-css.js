var gulp = require('gulp');
var sass = require('gulp-sass');//npm install gulp-sass --save-dev // https://www.npmjs.com/package/gulp-sass/
var concat = require('gulp-concat');//npm install gulp-concat --save-dev //https://www.npmjs.com/package/gulp-concat/
var csso = require('gulp-csso');//npm install gulp-csso --save-dev //https://www.npmjs.com/package/gulp-csso/
var configuration = require('./configuration.js');
var wb_project = require('./wb-project.js');
var wb_util = require('./wb-util.js');
var folderSass = 'wb-sass';
var pathSass = configuration.development + 'css/' + folderSass + '/*.scss';


var fileCssAdmin = [
    pathSass,
    configuration.development + 'css/wb-admin/*.scss'
];

var fileCssTheme = [
    pathSass,
    configuration.development + 'css/wb-theme/*.scss'
];
var cssAdminConcat = fileCssAdmin;
var cssThemeConcat = fileCssTheme;
var fileAdmin = 'wb-admin';
var fileTheme = 'wb-theme';










gulp.task('wb_css_admin_concat', function () {
    return gulp
        .src(cssAdminConcat)
        .pipe(concat(fileAdmin + '.scss'))
        .pipe(gulp.dest(configuration.homologation + folderSass + '/'));
});

gulp.task('wb_css_admin_sass', function () {
    return gulp
        .src(configuration.homologation + folderSass + '/' + fileAdmin + '.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(configuration.homologation + configuration.assets + 'css/'));
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
        .pipe(gulp.dest(configuration.homologation + folderSass + '/'));
});

gulp.task('wb_css_theme_sass', function () {
    return gulp
        .src(configuration.homologation + folderSass + '/' + fileTheme + '.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(configuration.homologation + configuration.assets + 'css/'));
});

gulp.task('wb_css_theme', gulp.series(
    'wb_css_theme_concat',
    'wb_css_theme_sass',
    'wb_beep'
));




gulp.task('wb_css_minify', function () {
    return gulp
        .src(configuration.homologation + configuration.assets + 'css/*.*')
        .pipe(csso())
        .pipe(gulp.dest(configuration.production + configuration.assets + 'css/'));
});




module.exports = {
    cssAdminConcat: cssAdminConcat,
    cssThemeConcat: cssThemeConcat
};