var gulp = require('gulp');
var concat = require('gulp-concat');//npm install gulp-concat --save-dev //https://www.npmjs.com/package/gulp-concat/
var uglify = require("gulp-uglifyes");//npm install gulp-uglifyes --save-dev //https://www.npmjs.com/package/gulp-uglifyes
var removeCode = require('gulp-remove-code');//npm install gulp-remove-code --save-dev https://www.npmjs.com/package/gulp-remove-code
var babel = require('gulp-babel'); //npm install --save-dev gulp-babel @babel/core @babel/preset-env //https://www.npmjs.com/package/gulp-babel

var configuration = require('./configuration.js');




var fileJs_wb_DefaultFinal = 'wb-theme.js';

var fileJs_wb_ = [
    configuration.development + 'js/shared/**/*.*',
    configuration.development + 'js/wb-theme/**/*.*',
    configuration.development + 'js/wb-main.js'
];

var fileJs_wb_Final = [
    configuration.homologation + 'js/' + fileJs_wb_DefaultFinal
];






gulp.task('wb_js_babel', function () {
    return gulp.src(fileJs_wb_Final)
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest(configuration.homologation + 'js/'));
});

gulp.task('wb_js_default_concat', function () {
    return gulp.src(fileJs_wb_)
        .pipe(concat(fileJs_wb_DefaultFinal))
        .pipe(gulp.dest(configuration.homologation + 'js/'));
});

gulp.task('wb_js_remove_code', function () {
    return gulp.src(configuration.homologation + 'js/*.js')
        .pipe(removeCode({ production: true }))
        .pipe(removeCode({ noDevFeatures: false, commentStart: '/*', commentEnd: '*/' }))
        .pipe(gulp.dest(configuration.production + 'js/'));
});

gulp.task('wb_js_default', gulp.series(
    'wb_js_default_concat',
    'wb_beep'
));




gulp.task('wb_js_minify', function () {
    return gulp.src(configuration.homologation + 'js/*.*')
        .pipe(uglify())
        .pipe(gulp.dest(configuration.production + 'js/'));
});




module.exports = {
    fileJs_wb_: fileJs_wb_
};