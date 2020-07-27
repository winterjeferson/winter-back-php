var gulp = require('gulp');
var wb_application = require('./wb-application.js');
var wb_css = require('./wb-css.js');
var wb_js = require('./wb-js.js');
var wb_other = require('./wb-other.js');
var wb_image = require('./wb-image.js');



gulp.task('default', function () {

    gulp.watch(wb_application.fileApplicationWatch, gulp.series('wb_application'))
        .on('change', function (evt) {
            console.log(evt);
        });

    gulp.watch(wb_css.cssAdminConcat, gulp.series('wb_css_admin'))
        .on('change', function (evt) {
            console.log(evt);
        });


    gulp.watch(wb_css.cssThemeConcat, gulp.series('wb_css_theme'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(wb_js.fileJs_wb_, gulp.series('wb_js_default'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(wb_js.fileJs_wb_admin_, gulp.series('wb_js_admin_default'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(wb_other.fileOther, gulp.series('wb_other'))
        .on('change', function (evt) {
            console.log(evt);
        });


    gulp.watch(wb_image.fileImg, gulp.series('wb_image'))
        .on('change', function (evt) {
            console.log(evt);
        });

});