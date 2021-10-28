const gulp = require('gulp');
const ftp = require('vinyl-ftp'); //npm install --save-dev vinyl-ftp //https://www.npmjs.com/package/vinyl-ftp
const util = require('gulp-util'); //npm install gulp-util --save-dev // https://www.npmjs.com/package/gulp-util
const configuration = require('./configuration.js');



gulp.task('ftp', function () {
    const conn = ftp.create({
        host: configuration.ftpHost,
        port: configuration.ftpPort,
        user: configuration.ftpUser,
        password: configuration.ftpPassword,
        parallel: 10,
        log: util.log
    });

    const globs = [
        configuration.dist + configuration.allFolderFile,
        configuration.dist + '.htaccess'
    ];

    return gulp
        .src(globs, { buffer: true })
        .pipe(conn.newer(configuration.folderFtp))
        .pipe(conn.dest(configuration.folderFtp));
});