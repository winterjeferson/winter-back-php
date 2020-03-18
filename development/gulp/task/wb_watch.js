var gulp = require('gulp');

var css = require('./wb_css.js');
var js = require('./wb_js.js');
var other = require('./wb_other.js');
var php = require('./wb_php.js');
var template = require('./wb_template.js');



gulp.task('default', function () {


    gulp.watch(css.cssAdminConcat, gulp.series('wb_css_admin'))
        .on('change', function (evt) {
            console.log(evt);
        });


    gulp.watch(css.cssThemeConcat, gulp.series('wb_css_theme'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(js.fileJs, gulp.series('wb_js_default', 'wb_js_babel'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(other.fileOther, gulp.series('wb_other'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(php.filePHP, gulp.series('wb_php'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(template.fileTemplateWatch, gulp.series('wb_template'))
        .on('change', function (evt) {
            console.log(evt);
        });
});