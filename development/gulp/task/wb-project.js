var gulp = require('gulp');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del
var configuration = require('./configuration.js');


gulp.task('wb_project_move_production', function () {
    gulp
        .src(configuration.homologation + '*.php')
        .pipe(gulp.dest(configuration.production));
    gulp
        .src(configuration.homologation + '*.txt')
        .pipe(gulp.dest(configuration.production));
    gulp
        .src(configuration.homologation + '*.xml')
        .pipe(gulp.dest(configuration.production));
    gulp
        .src(configuration.homologation + configuration.assets + '/php/**/*.*')
        .pipe(gulp.dest(configuration.production + configuration.assets + '/php/'));

    return gulp
        .src(configuration.homologation + '.htaccess')
        .pipe(gulp.dest(configuration.production));
});