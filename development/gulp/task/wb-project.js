var gulp = require('gulp');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del

var configuration = require('./configuration.js');


gulp.task('wb_project_move_production', function () {
    gulp
        .src(configuration.homologation + '*/**/*.*')
        .pipe(gulp.dest(configuration.production));
    gulp
        .src(configuration.homologation + '*.php')
        .pipe(gulp.dest(configuration.production));
    gulp
        .src(configuration.homologation + '*.txt')
        .pipe(gulp.dest(configuration.production));

    gulp
        .src(configuration.homologation + '/php/**/*.*')
        .pipe(gulp.dest(configuration.production + '/php/'));

    gulp
        .src(configuration.homologation + '/img/**/*.*')
        .pipe(gulp.dest(configuration.production + '/img/'));

    return gulp
        .src(configuration.homologation + '.htaccess')
        .pipe(gulp.dest(configuration.production));
});