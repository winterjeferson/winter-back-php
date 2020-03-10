var gulp = require('gulp');
var project = require('./project.js');
var util = require('./util.js');

var project = require('./project.js');
var js = require('./js.js');
var template = require('./template.js');

gulp.task('deploy', gulp.series(
        'css_minify',
        'js_remove_code',
        'js_minify',
        'project_move_production',
        'template_minify',
        'beep'
));