var gulp = require('gulp');
var concat = require('gulp-concat');//npm install gulp-concat --save-dev //https://www.npmjs.com/package/gulp-concat/
var uglify = require("gulp-uglifyes");//npm install gulp-uglifyes --save-dev //https://www.npmjs.com/package/gulp-uglifyes
var removeCode = require('gulp-remove-code');//npm install gulp-remove-code --save-dev https://www.npmjs.com/package/gulp-remove-code
var babel = require('gulp-babel'); //npm install --save-dev gulp-babel @babel/core @babel/preset-env //https://www.npmjs.com/package/gulp-babel

var configuration = require('./configuration-wb.js');




var fileJs_wb_DefaultFinal = 'wb-theme.js';
var fileJs_wb_AdminFinal = 'wb-admin.js';

var fileJs_wb_ = [
    configuration.development + 'js/shared/**/*.*',
    configuration.development + 'js/wb-theme/**/*.*',
    configuration.development + 'js/wb-main.js'
];

var fileJs_wb_admin_ = [
    configuration.development + 'js/wb-admin/**/*.*',
    configuration.development + 'js/wb-main-admin.js'
];

// var fileJs_wb_Final = [
//     configuration.homologation + configuration.assets + 'js/' + fileJs_wb_DefaultFinal
// ];

// var fileJs_wb_admin_Final = [
//     configuration.homologation + configuration.assets + 'js/' + fileJs_wb_AdminFinal
// ];






// gulp.task('wb_js_babel', function () {
//     return gulp.src(fileJs_wb_Final)
//         .pipe(babel({
//             presets: ['@babel/env']
//         }))
//         .pipe(gulp.dest(configuration.homologation + configuration.assets + 'js/'));
// });

gulp.task('wb_js_default_concat', function () {
    return gulp.src(fileJs_wb_)
        .pipe(concat(fileJs_wb_DefaultFinal))
        .pipe(gulp.dest(configuration.homologation + configuration.assets + 'js/'));
});


gulp.task('wb_js_default', gulp.series(
    'wb_js_default_concat',
    'wb_beep'
));






gulp.task('wb_js_admin_default_concat', function () {
    return gulp.src(fileJs_wb_admin_)
        .pipe(concat(fileJs_wb_AdminFinal))
        .pipe(gulp.dest(configuration.homologation + configuration.assets + 'js/'));
});

gulp.task('wb_js_admin_default', gulp.series(
    'wb_js_admin_default_concat',
    'wb_beep'
));






gulp.task('wb_js_remove_code', function () {
    return gulp.src(configuration.homologation + configuration.assets + 'js/*.js')
        .pipe(removeCode({ production: true }))
        .pipe(removeCode({ noDevFeatures: false, commentStart: '/*', commentEnd: '*/' }))
        .pipe(gulp.dest(configuration.production + configuration.assets + 'js/'));
});


gulp.task('wb_js_minify', function () {
    return gulp.src(configuration.production + configuration.assets + 'js/*.*')
        .pipe(uglify())
        .pipe(gulp.dest(configuration.production + configuration.assets + 'js/'));
});




module.exports = {
    fileJs_wb_: fileJs_wb_,
    fileJs_wb_admin_: fileJs_wb_admin_,
};