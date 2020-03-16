var gulp = require('gulp');
var css = require('./css.js');
var js = require('./js.js');
var other = require('./other.js');
var php = require('./php.js');
var template = require('./template.js');



gulp.task('default', function () {


    gulp.watch(css.cssAdminConcat, gulp.series('build_css_admin'))
        .on('change', function (evt) {
            console.log(evt);
        });


    gulp.watch(css.cssThemeConcat, gulp.series('build_css_theme'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(js.fileJs, gulp.series('build_js_default', 'js_babel'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(other.fileOther, gulp.series('build_other'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(php.filePHP, gulp.series('build_php'))
        .on('change', function (evt) {
            console.log(evt);
        });



    gulp.watch(template.fileTemplateWatch, gulp.series('build_template'))
        .on('change', function (evt) {
            console.log(evt);
        });
});