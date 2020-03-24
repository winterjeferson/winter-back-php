var gulp = require('gulp');

var project = require('./wb-project.js');
var util = require('./wb-util.js');
var image = require('./wb-image.js');
var project = require('./wb-project.js');
var js = require('./wb-js.js');
var template = require('./wb-template.js');

gulp.task('wb_deploy', gulp.series(
        'wb_css_minify',
        'wb_js_remove_code',
        'wb_js_minify',
        'wb_project_move_production',
        'wb_template_minify',
        'wb_image_imagemin',
        'wb_beep'
));