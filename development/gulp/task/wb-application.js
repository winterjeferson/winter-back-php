var gulp = require('gulp');
var rename = require("gulp-rename");//npm install gulp-rename --save-dev // https://www.npmjs.com/package/gulp-rename/
var htmlmin = require('gulp-htmlmin'); //npm install gulp-htmlmin --save-dev  //https://www.npmjs.com/package/gulp-htmlmin/
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del
var configuration = require('./configuration.js');
var wb_util = require('./wb-util.js');
var application = 'application/';
var folderView = 'view/';



var folderApplication = configuration.development + application;
var fileApplication = [
    folderApplication + '**/*.*',
    '!' + folderApplication + 'index.php',
];
var fileApplicationWatch = [
    folderApplication + '**/*.*',
    folderApplication + 'index.php',
];


function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('wb_application_clean', function () {
    var files = [
        configuration.homologation + application + '**/*.*',
        configuration.production + application + '**/*.*',
    ];
    return clean(files);
});

gulp.task('wb_application_move', function (done) {
    return gulp
        .src(fileApplication)
        .pipe(gulp.dest(configuration.homologation + application))
    done();
});

gulp.task('wb_application_move2', function (done) {
    return gulp
        .src(configuration.development + application + 'index.php')
        .pipe(gulp.dest(configuration.homologation))
    done();
});

gulp.task('wb_application_production_move', function (done) {
    return gulp
        .src(fileApplication)
        .pipe(gulp.dest(configuration.production + application))
    done();
});

gulp.task('wb_application_production_move2', function (done) {
    return gulp
        .src(configuration.development + application + 'index.php')
        .pipe(gulp.dest(configuration.production))
    done();
});

gulp.task('wb_application_minify', function (done) {
    return gulp
        .src(configuration.production + application + folderView + '**/*.*')
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest(configuration.production + application + folderView));
    done();
});

gulp.task('wb_application', gulp.series(
    'wb_application_clean',
    'wb_application_move',
    'wb_application_move2',
    'wb_beep'
));





module.exports = {
    fileApplication: fileApplication,
    fileApplicationWatch: fileApplicationWatch,
};