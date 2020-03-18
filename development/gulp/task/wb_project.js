var gulp = require('gulp');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del

var wb_configuration = require('./wb_configuration.js');


gulp.task('wb_project_move_production', function () {
    gulp
        .src(wb_configuration.homologation + '*.php')
        .pipe(gulp.dest(wb_configuration.production));
    gulp
        .src(wb_configuration.homologation + '*.txt')
        .pipe(gulp.dest(wb_configuration.production));

    gulp
        .src(wb_configuration.homologation + '/php/**/*.*')
        .pipe(gulp.dest(wb_configuration.production + '/php/'));

    gulp
        .src(wb_configuration.homologation + '/img/**/*.*')
        .pipe(gulp.dest(wb_configuration.production + '/img/'));

    return gulp
        .src(wb_configuration.homologation + '.htaccess')
        .pipe(gulp.dest(wb_configuration.production));
});