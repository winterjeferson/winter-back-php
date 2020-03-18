var gulp = require('gulp');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del

var wb_configuration = require('./wb_configuration.js');





var fileOther = [
    wb_configuration.development + 'other/.htaccess',
    wb_configuration.development + 'other/*',
    wb_configuration.development + 'other/**',
    wb_configuration.development + 'other/**/*',
    wb_configuration.development + 'other/**/*.*'
];

var fileOtherPublic = [
    wb_configuration.homologation + '.htaccess',
    wb_configuration.homologation + '*.htaccess',
    wb_configuration.homologation + '*.txt'
];


function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('wb_other_clean', function () {
    return clean(fileOtherPublic);
});

gulp.task('wb_other_move', function (done) {
    return gulp
        .src(fileOther)
        .pipe(gulp.dest(wb_configuration.homologation));
    done();
});

gulp.task('wb_other', gulp.series(
    'wb_other_clean',
    'wb_other_move',
    'wb_beep'
));



module.exports = {
    fileOther: fileOther,
    fileOtherPublic: fileOtherPublic,
};