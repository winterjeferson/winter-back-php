var gulp = require('gulp');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del

var wb_configuration = require('./wb_configuration.js');





var filePHP = [
    wb_configuration.development + 'php/*',
    wb_configuration.development + 'php/**',
    wb_configuration.development + 'php/**/*',
    wb_configuration.development + 'php/**/*.*'
];

var filePHPPublic = [
    wb_configuration.homologation + 'php/*',
    wb_configuration.homologation + 'php/**',
    wb_configuration.homologation + 'php/**/*',
    wb_configuration.homologation + 'php/**/*.*'
];


function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('wb_php_clean', function () {
    var files = [wb_configuration.homologation + 'php/**'];
    return clean(files);
});


gulp.task('wb_php_move', function (done) {
    return gulp
        .src(wb_configuration.development + 'php/**/*.*')
        .pipe(gulp.dest(wb_configuration.homologation + "php/"));
    done();
});

gulp.task('wb_php_delete_tool', function (done) {
    var files = [wb_configuration.homologation + 'php/tool/**'];
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