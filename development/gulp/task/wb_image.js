var gulp = require('gulp');
var imagemin = require('gulp-imagemin'); //npm install gulp-imagemin --save-dev //https://www.npmjs.com/package/gulp-imagemin/
var newer = require('gulp-newer'); //npm install gulp-newer --save-dev // https://www.npmjs.com/package/gulp-newer/
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del

var wb_configuration = require('./wb_configuration.js');





var fileImg = [
    wb_configuration.development + 'img/*',
    wb_configuration.development + 'img/**',
    wb_configuration.development + 'img/**/*',
    wb_configuration.development + 'img/**/*.*'
];

var fileImgPublic = [
    wb_configuration.homologation + 'img/*',
    wb_configuration.homologation + 'img/**',
    wb_configuration.homologation + 'img/**/*',
    wb_configuration.homologation + 'img/**/*.*'
];


function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('wb_image_clean', function () {
    var files = [wb_configuration.homologation + 'img/**'];
    return clean(files);
});

gulp.task('wb_image_move', function (done) {
    return gulp
        .src(wb_configuration.development + 'img/**/*.*')
        .pipe(gulp.dest(wb_configuration.homologation + "img/"));
    done();
});


// fix enoent problem: node node_modules/optipng-bin/lib/install.js
gulp.task('wb_image_imagemin', function () {
    return gulp
        .src(wb_configuration.homologation + 'img/**')
        // .pipe(newer(wb_configuration.production + "img/"))
        .pipe(imagemin())
        .pipe(gulp.dest(wb_configuration.production + "img/"));
});

gulp.task('wb_image', gulp.series(
    'wb_image_clean',
    'wb_image_move',
    'wb_beep'
));



module.exports = {
    fileImg: fileImg,
    fileImgPublic: fileImgPublic,
};