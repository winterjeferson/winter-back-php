var gulp = require('gulp');
// var nunjucksRender = require('gulp-nunjucks-render'); //npm install gulp-nunjucks-render --save-dev // https://zellwk.com/blog/nunjucks-with-gulp/
var rename = require("gulp-rename");//npm install gulp-rename --save-dev // https://www.npmjs.com/package/gulp-rename/
var htmlmin = require('gulp-htmlmin'); //npm install gulp-htmlmin --save-dev  //https://www.npmjs.com/package/gulp-htmlmin/
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del
var configuration = require('./configuration-wb.js');
var wb_util = require('./wb-util.js');
var folderApplication = 'application/';
var folderView = 'view/';



var folderApplicationApplication = configuration.development + folderApplication;
var fileApplication = folderApplicationApplication + '**/*.*';

function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('wb_application_clean', function () {
    var files = [
        configuration.homologation + folderApplication + '**/*.*',
        configuration.production + folderApplication + '**/*.*',
    ];
    return clean(files);
});

gulp.task('wb_application_move', function (done) {
    return gulp
        .src(configuration.development + folderApplication + '**/*.*')
        .pipe(gulp.dest(configuration.homologation + folderApplication))
        .pipe(gulp.dest(configuration.production + folderApplication));
    done();
});

gulp.task('wb_application_minify', function () {
    return gulp
        .src(configuration.production + folderApplication + folderView + '**/*.*')
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest(configuration.production + folderView));
});

gulp.task('wb_application', gulp.series(
    'wb_application_clean',
    'wb_application_move',
    'wb_beep'
));





module.exports = {
    fileApplication: fileApplication,
};