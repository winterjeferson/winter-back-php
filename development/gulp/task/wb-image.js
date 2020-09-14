var gulp = require('gulp');
var imagemin = require('gulp-imagemin'); //npm install gulp-imagemin --save-dev //https://www.npmjs.com/package/gulp-imagemin/
var newer = require('gulp-newer'); //npm install gulp-newer --save-dev // https://www.npmjs.com/package/gulp-newer/
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del
var configuration = require('./configuration.js');



var fileImg = [
    configuration.development + 'img/*',
    configuration.development + 'img/**',
    configuration.development + 'img/**/*',
    configuration.development + 'img/**/*.*'
];

var fileImgPublic = [
    configuration.homologation + 'img/*',
    configuration.homologation + 'img/**',
    configuration.homologation + 'img/**/*',
    configuration.homologation + 'img/**/*.*'
];

gulp.task('wb_image_move', function (done) {
    return gulp
        .src(configuration.development + 'img/**/*.*')
        .pipe(gulp.dest(configuration.homologation + configuration.assets + "img/"));
    done();
});


// fix enoent problem: node node_modules/optipng-bin/lib/install.js
gulp.task('wb_image_imagemin', function () {
    return gulp
        .src(configuration.homologation + configuration.assets + 'img/**')
        .pipe(imagemin([
            imagemin.svgo({
                plugins: [
                    { removeViewBox: true },
                    { cleanupIDs: false }
                ]
            })
        ]))
        .pipe(gulp.dest(configuration.production + configuration.assets + "img/"));
});

gulp.task('wb_image', gulp.series(
    'wb_image_move',
    'wb_beep'
));



module.exports = {
    fileImg: fileImg,
    fileImgPublic: fileImgPublic,
};