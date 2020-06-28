/**
 * Gulp
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package WPMVC
 * @license MIT
 * @version 1.1.2
 */

'use strict';

// Prepare
var fs = require('fs');
var gulp = require('gulp');
var wpmvc = require('gulp-wpmvc');
var deploybot = require('gulp-wpmvc-deploybot');
// @since 1.0.1
var less = require('gulp-less');

// Load package JSON as config file.
var config = JSON.parse(fs.readFileSync('./package.json'));

// --------------
// START - CUSTOM TASKS

/**
 * Configuration: Defines what to do pre styles
 * @since 1.1.2
 */
config.prestyles = ['sass', 'less', 'vendorfonts', 'vendorcss'];
/**
 * Configuration: Defines what to do pre scripts
 * @since 1.1.2
 */
config.prescripts = ['vendorjs'];
/**
 * Configuration: Deletes test cases of vendor dependencies.
 * @since 1.1.1
 */
config.deletes = [
    './builds/staging/'+config.name+'/vendor/10quality/{wp-query-builder,php-curl,php-data-model,wpmvc-addon}/tests/**/*',
    './builds/staging/'+config.name+'/vendor/10quality/{wp-query-builder,php-curl,php-data-model,wpmvc-addon}/tests',
];
/**
 * Copies CSS dependencies into assets folder.
 * @since 1.0.1
 */
gulp.task('vendorcss', function() {
    return gulp.src([
            './node_modules/bootstrap/dist/css/bootstrap.min.css',
            './node_modules/font-awesome/css/font-awesome.min.css',
        ])
        .pipe(gulp.dest('./assets/css'));
});
/**
 * Copies FONTS dependencies into assets folder.
 * @since 1.0.1
 */
gulp.task('vendorfonts', function() {
    return gulp.src([
            './node_modules/font-awesome/fonts/**/*',
        ])
        .pipe(gulp.dest('./assets/fonts'));
});
/**
 * Copies JS dependencies into assets folder.
 * @since 1.0.1
 */
gulp.task('vendorjs', function() {
    return gulp.src([
            './node_modules/bootstrap/dist/js/bootstrap.min.js',
            './node_modules/jquery-match-height/dist/jquery.matchHeight-min.js',
            './node_modules/jquery.scrollto/jquery.scrollTo.min.js',
            './node_modules/clipboard/dist/clipboard.min.js',
        ])
        .pipe(gulp.dest('./assets/js'));
});
/**
 * Allows to use LESS to compile CSS assets.
 * @since 1.0.1
 */
gulp.task('less', function () {
    return gulp.src('./assets/raw/less/*.less')
        .pipe(less())
        .pipe(gulp.dest('./assets/css'));
});
/**
 * Add watch for less files.
 * @since 1.0.2
 */
gulp.task('watch-less', async function() {
    gulp.watch([
        './assets/raw/less/**/*.less',
    ], gulp.series('less'));
});

// END - CUSTOM TASKS
// --------------

// Init WPMVC default tasks.
wpmvc(gulp, config);