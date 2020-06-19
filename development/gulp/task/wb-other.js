var gulp = require('gulp');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del
var configuration = require('./configuration.js');



var fileOther = [
    configuration.development + 'other/.htaccess',
    configuration.development + 'other/*',
    configuration.development + 'other/**',
    configuration.development + 'other/**/*',
    configuration.development + 'other/**/*.*'
];
var fileOtherPublic = [
    configuration.homologation + '.htaccess',
    configuration.homologation + '*.htaccess',
    configuration.homologation + '*.txt'
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
        .pipe(gulp.dest(configuration.homologation));
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