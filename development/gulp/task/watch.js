var gulp = require('gulp');

var wb_css = require('./wb_css.js');
var wb_js = require('./wb_js.js');
var wb_other = require('./wb_other.js');
var wb_php = require('./wb_php.js');
var wb_template = require('./wb_template.js');



gulp.task('default', function () {


    gulp.watch(wb_css.cssAdminConcat, gulp.series('wb_css_admin'))
        .on('change', function (evt) {
            console.log(evt);
        });


    gulp.watch(wb_css.cssThemeConcat, gulp.series('wb_css_theme'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(wb_js.fileJs_wb_, gulp.series('wb_js_default', 'wb_js_babel'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(wb_other.fileOther, gulp.series('wb_other'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(wb_php.filePHP, gulp.series('wb_php'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(wb_template.fileTemplateWatch, gulp.series('wb_template'))
        .on('change', function (evt) {
            console.log(evt);
        });
});