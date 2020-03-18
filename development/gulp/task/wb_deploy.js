var gulp = require('gulp');

var project = require('./wb_project.js');
var util = require('./wb_util.js');
var image = require('./wb_image.js');
var project = require('./wb_project.js');
var js = require('./wb_js.js');
var template = require('./wb_template.js');

gulp.task('wb_deploy', gulp.series(
        'wb_css_minify',
        'wb_js_remove_code',
        'wb_js_minify',
        'wb_project_move_production',
        'wb_template_minify',
        'wb_image_imagemin',
        'wb_beep'
));