var gulp = require('gulp');
var concat = require('gulp-concat');//npm install gulp-concat --save-dev //https://www.npmjs.com/package/gulp-concat/
var uglify = require("gulp-uglifyes");//npm install gulp-uglifyes --save-dev //https://www.npmjs.com/package/gulp-uglifyes
const removeCode = require('gulp-remove-code');//npm install gulp-remove-code --save-dev https://www.npmjs.com/package/gulp-remove-code
const babel = require('gulp-babel'); //npm install --save-dev gulp-babel @babel/core @babel/preset-env //https://www.npmjs.com/package/gulp-babel
var configuration = require('./configuration.js');




var fileJsDefaultFinal = 'admin.js';
// var fileJsPluginFinal = 'plugin.js';

var fileJs = [
    configuration.development + 'js/plugin/**/*.*',
    configuration.development + 'js/build/**/*.*',
    configuration.development + 'js/main.js'
];

var fileJsFinal = [
    configuration.homologation + 'js/' + fileJsDefaultFinal,
    // configuration.homologation + 'js/' + fileJsPluginFinal
];

// var fileJsPlugin = [
//     configuration.development + 'js/library/**/*.*',
//     // configuration.development + 'js/plugin/**/*.*'
// ];






gulp.task('js_babel', function () {
    return gulp.src(fileJsFinal)
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest(configuration.homologation + 'js/'));
});

gulp.task('js_default_concat', function () {
    return gulp.src(fileJs)
        .pipe(concat(fileJsDefaultFinal))
        .pipe(gulp.dest(configuration.homologation + 'js/'));
});

gulp.task('js_remove_code', function () {
    return gulp.src(configuration.homologation + 'js/*.js')
        .pipe(removeCode({ production: true }))
        .pipe(removeCode({ noDevFeatures: false, commentStart: '/*', commentEnd: '*/' }))
        .pipe(gulp.dest(configuration.production + 'js/'));
});

gulp.task('build_js_default', gulp.series(
    'js_default_concat',
    'beep'
));



// gulp.task('js_plugin_concat', function () {
//     return gulp.src(fileJsPlugin)
//         .pipe(concat(fileJsPluginFinal))
//         .pipe(gulp.dest(configuration.homologation + 'js/'));
// });

// gulp.task('build_js_plugin', gulp.series(
//     'js_plugin_concat',
//     'beep'
// ));



gulp.task('js_minify', function () {
    return gulp.src(configuration.homologation + 'js/*.*')
        .pipe(uglify())
        .pipe(gulp.dest(configuration.production + 'js/'));
});




module.exports = {
    fileJs: fileJs,
    // fileJsPlugin: fileJsPlugin
};