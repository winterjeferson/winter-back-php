const gulp = require('gulp');
const del = require('del'); //npm install del --save-dev //https://www.npmjs.com/package/del
const taskApplication = require('./app.js');
const css = require('./css.js');
const js = require('./js.js');
const other = require('./other.js');
const image = require('./image.js');


gulp.task('deploy', gulp.series(
    'buildAppMinify',
    'buildCssMinify',
    'buildJsRemoveCode',
    'buildJsMinify',
    'buildImageMinify',
));

gulp.task('initialize', gulp.series(
    'buildApp',
    'buildCss',
    'buildJs',
    'buildImage',
    'buildOther',
));

clean = (path) => {
    del.sync(path, {
        force: true
    });
};

exports.default = clean;