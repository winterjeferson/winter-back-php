var gulp = require('gulp');
var nunjucksRender = require('gulp-nunjucks-render'); //npm install gulp-nunjucks-render --save-dev // https://zellwk.com/blog/nunjucks-with-gulp/
var rename = require("gulp-rename");//npm install gulp-rename --save-dev // https://www.npmjs.com/package/gulp-rename/
var htmlmin = require('gulp-htmlmin'); //npm install gulp-htmlmin --save-dev  //https://www.npmjs.com/package/gulp-htmlmin/
var configuration = require('./configuration.js');
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del




var folderTemplate = configuration.development + 'template/';
var fileTemplate = folderTemplate + '*.php';
var fileTemplateWatch = [
    folderTemplate + '*.php',
    folderTemplate + 'include/*.php'
];


function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('template_clean', function () {
    var files = [
        configuration.homologation + '*.php'
    ];
    return clean(files);
});

gulp.task('template_include', function () {

    return gulp
        .src(fileTemplate)
        .pipe(nunjucksRender({
            path: [folderTemplate]
        }))
        .pipe(rename({ extname: '.php' }))
        .pipe(gulp.dest(configuration.homologation));
});

gulp.task('template_minify', function () {
    return gulp
        .src(configuration.homologation + '*.php')
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest(configuration.production));
});

gulp.task('build_template', gulp.series(
    'template_clean',
    'template_include',
    'beep'
));





module.exports = {
    fileTemplate: fileTemplate,
    fileTemplateWatch: fileTemplateWatch
};