var gulp = require('gulp');
var project = require('./wb-project.js');
var util = require('./wb-util.js');
var image = require('./wb-image.js');
var project = require('./wb-project.js');
var js = require('./wb-js.js');
var application = require('./wb-application.js');

gulp.task('wb_deploy', gulp.series(
        'wb_css_minify',
        'wb_js_remove_code',
        'wb_js_minify',
        'wb_application_production_move',
        'wb_application_production_move2',
        'wb_project_move_production',
        'wb_application_minify',
        'wb_image_imagemin',
        'wb_beep'
));