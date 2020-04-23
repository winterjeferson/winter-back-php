var gulp = require('gulp');
var nunjucksRender = require('gulp-nunjucks-render'); //npm install gulp-nunjucks-render --save-dev // https://zellwk.com/blog/nunjucks-with-gulp/
var rename = require("gulp-rename");//npm install gulp-rename --save-dev // https://www.npmjs.com/package/gulp-rename/
var htmlmin = require('gulp-htmlmin'); //npm install gulp-htmlmin --save-dev  //https://www.npmjs.com/package/gulp-htmlmin/
var del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del

var configuration = require('./configuration-wb.js');




var folderTemplate = configuration.development + 'template/';
var fileTemplate = folderTemplate + '*.php';
var fileTemplateWatch = [
    folderTemplate + '*.php',
    folderTemplate + 'include/*.php'
];


function clean(path) {
    return del(path, { force: true }); // returns a promise
}

gulp.task('wb_template_clean', function () {
    var files = [
        configuration.homologation + '*.php'
    ];
    return clean(files);
});

gulp.task('wb_template_include', function () {

    return gulp
        .src(fileTemplate)
        .pipe(nunjucksRender({
            path: [folderTemplate]
        }))
        .pipe(rename({ extname: '.php' }))
        .pipe(gulp.dest(configuration.homologation));
});

gulp.task('wb_template_minify', function () {
    return gulp
        .src(configuration.homologation + '*.php')
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest(configuration.production));
});

gulp.task('wb_template', gulp.series(
    'wb_template_clean',
    'wb_template_include',
    'wb_beep'
));





module.exports = {
    fileTemplate: fileTemplate,
    fileTemplateWatch: fileTemplateWatch
};