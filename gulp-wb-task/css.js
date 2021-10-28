const gulp = require('gulp');
const sass = require('gulp-sass'); //npm install gulp-sass --save-dev // https://www.npmjs.com/package/gulp-sass/
const csso = require('gulp-csso'); //npm install gulp-csso --save-dev //https://www.npmjs.com/package/gulp-csso/
const rename = require('gulp-rename'); //npm install gulp-rename --save-dev // https://www.npmjs.com/package/gulp-rename/
const gulpStylelint = require('gulp-stylelint'); //npm install stylelint gulp-stylelint --save-dev //https://www.npmjs.com/package/gulp-stylelint

const configuration = require('./configuration.js');

const extensionCss = 'css';
const extensionSass = `s${extensionCss}`;
const filePrefix = `${configuration.prefix}${configuration.theme}`;
const filePrefixAdmin = `${configuration.prefix}${configuration.admin}`;
const folder = `${configuration.src}${extensionSass}/`;
const file = folder + `${filePrefix}/${configuration.index}.${extensionSass}`;
const fileAdmin = folder + `${filePrefixAdmin}/${configuration.index}.${extensionSass}`;
const fileName = `${filePrefix}.${extensionCss}`;
const fileNameAdmin = `${filePrefixAdmin}.${extensionCss}`;
const fileAll = folder + configuration.allFolderFile;



gulp.task('buildCssSass', () => {
    return gulp
        .src(file)
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(rename(fileName))
        .pipe(gulp.dest(`${configuration.dist}${configuration.assets}${extensionCss}/`));
});

gulp.task('buildCssSassAdmin', () => {
    return gulp
        .src(fileAdmin)
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(rename(fileNameAdmin))
        .pipe(gulp.dest(`${configuration.dist}${configuration.assets}${extensionCss}/`));
});

gulp.task('buildCssMinify', () => {
    return gulp
        .src(`${configuration.dist}${configuration.assets}${extensionCss}/*.*`)
        .pipe(csso())
        .pipe(gulp.dest(`${configuration.dist}${configuration.assets}${extensionCss}/`));
});

gulp.task('buildCssLint', function lintCssTask(done) {
    gulp
        .src(fileAll)
        .pipe(gulpStylelint({
            failAfterError: true,
            reporters: [{
                formatter: 'verbose',
                console: true
            }, ],
            debug: true
        }));
    done();
});


gulp.task('buildCss', gulp.series(
    'buildCssLint',
    'buildCssSass',
    'buildCssSassAdmin',
));


module.exports = {
    fileAll: fileAll
};