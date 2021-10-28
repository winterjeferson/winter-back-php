const gulp = require('gulp');
const taskApplication = require('./app.js');
const css = require('./css.js');
const js = require('./js.js');
const other = require('./other.js');
const image = require('./image.js');



gulp.task('watch', (callback) => {
    gulp.watch(taskApplication.fileAll, gulp.series('buildApp'))
        .on('change', (event) => {
            console.log(event);
        });

    gulp.watch(css.fileAll, gulp.series('buildCss'))
        .on('change', (event) => {
            console.log(event);
        });

    gulp.watch(js.fileAll, gulp.series('buildJs'))
        .on('change', (event) => {
            console.log(event);
        });

    gulp.watch(other.fileAll, gulp.series('buildOther'))
        .on('change', (event) => {
            console.log(event);
        });

    gulp.watch(image.fileAll, gulp.series('buildImage'))
        .on('change', (event) => {
            console.log(event);
        });

    callback();
});