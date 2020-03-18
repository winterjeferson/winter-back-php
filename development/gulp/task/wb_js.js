var gulp = require('gulp');
var concat = require('gulp-concat');//npm install gulp-concat --save-dev //https://www.npmjs.com/package/gulp-concat/
var uglify = require("gulp-uglifyes");//npm install gulp-uglifyes --save-dev //https://www.npmjs.com/package/gulp-uglifyes
var removeCode = require('gulp-remove-code');//npm install gulp-remove-code --save-dev https://www.npmjs.com/package/gulp-remove-code
var babel = require('gulp-babel'); //npm install --save-dev gulp-babel @babel/core @babel/preset-env //https://www.npmjs.com/package/gulp-babel

var wb_configuration = require('./wb_configuration.js');




var fileJsDefaultFinal = 'wb.js';

var fileJs = [
    wb_configuration.development + 'js/plugin/**/*.*',
    wb_configuration.development + 'js/build/**/*.*',
    wb_configuration.development + 'js/main.js'
];

var fileJsFinal = [
    wb_configuration.homologation + 'js/' + fileJsDefaultFinal
];






gulp.task('wb_js_babel', function () {
    return gulp.src(fileJsFinal)
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest(wb_configuration.homologation + 'js/'));
});

gulp.task('wb_js_default_concat', function () {
    return gulp.src(fileJs)
        .pipe(concat(fileJsDefaultFinal))
        .pipe(gulp.dest(wb_configuration.homologation + 'js/'));
});

gulp.task('wb_js_remove_code', function () {
    return gulp.src(wb_configuration.homologation + 'js/*.js')
        .pipe(removeCode({ production: true }))
        .pipe(removeCode({ noDevFeatures: false, commentStart: '/*', commentEnd: '*/' }))
        .pipe(gulp.dest(wb_configuration.production + 'js/'));
});

gulp.task('wb_js_default', gulp.series(
    'wb_js_default_concat',
    'wb_beep'
));




gulp.task('wb_js_minify', function () {
    return gulp.src(wb_configuration.homologation + 'js/*.*')
        .pipe(uglify())
        .pipe(gulp.dest(wb_configuration.production + 'js/'));
});




module.exports = {
    fileJs: fileJs
};