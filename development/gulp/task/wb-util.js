var gulp = require('gulp');
var wb_util = require('gulp-util'); //npm install gulp-util --save-dev // https://www.npmjs.com/package/gulp-util



gulp.task('wb_beep', function (done) {
    wb_util.beep();
    done();
});