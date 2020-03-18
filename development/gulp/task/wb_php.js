var gulp = require('gulp');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del

var configuration = require('./configuration.js');





var filePHP = [
    configuration.development + 'php/*',
    configuration.development + 'php/**',
    configuration.development + 'php/**/*',
    configuration.development + 'php/**/*.*'
];

var filePHPPublic = [
    configuration.homologation + 'php/*',
    configuration.homologation + 'php/**',
    configuration.homologation + 'php/**/*',
    configuration.homologation + 'php/**/*.*'
];


function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('wb_php_clean', function () {
    var files = [configuration.homologation + 'php/**'];
    return clean(files);
});


gulp.task('wb_php_move', function (done) {
    return gulp
        .src(configuration.development + 'php/**/*.*')
        .pipe(gulp.dest(configuration.homologation + "php/"));
    done();
});

gulp.task('wb_php_delete_tool', function (done) {
    var files = [configuration.homologation + 'php/tool/**'];
    return clean(files);
});

gulp.task('wb_php', gulp.series(
    'wb_php_clean',
    'wb_php_move',
    'wb_php_delete_tool',
    'wb_beep'
));



module.exports = {
    filePHP: filePHP,
    filePHPPublic: filePHPPublic,
};