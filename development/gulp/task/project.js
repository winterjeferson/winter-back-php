var gulp = require('gulp');
var configuration = require('./configuration.js');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del


gulp.task('project_move_production', function () {
    gulp
        .src(configuration.homologation + '*.php')
        .pipe(gulp.dest(configuration.production));

    gulp
        .src(configuration.homologation + '*.xml')
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