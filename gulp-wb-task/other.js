const gulp = require('gulp');
const del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del
const configuration = require('./configuration.js');
const helper = require('./helper.js');



const fileOther = [
    configuration.src + 'other/.htaccess',
    configuration.src + 'other/' + configuration.allFolderFile
];
const fileOtherPublic = [
    configuration.dist + '.htaccess',
    configuration.dist + '*.txt'
];



gulp.task('buildOtherClean', (done) => {
    clean(fileOtherPublic);
    done();
});

gulp.task('buildOtherMove', function (done) {
    return gulp
        .src(fileOther)
        .pipe(gulp.dest(configuration.dist));
    done();
});

gulp.task('buildOther', gulp.series(
    'buildOtherClean',
    'buildOtherMove',
));



module.exports = {
    fileAll: fileOther,
    fileOtherPublic: fileOtherPublic,
};