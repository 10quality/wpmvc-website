/**
 * Gulp
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package WPMVC
 * @license MIT
 * @version 1.0.1
 */

'use strict';

// Prepare
var fs = require('fs');
var gulp = require('gulp');
var wpmvc = require('gulp-wpmvc');
// @since 1.0.1
var less = require('gulp-less');
// @since 1.0.1
var path = require('path');

// Load package JSON as config file.
var config = JSON.parse(fs.readFileSync('./package.json'));

// Init WPMVC default tasks.
wpmvc(gulp, config);

// --------------
// START - CUSTOM TASKS
gulp.task('injectedcss', function() {
    return gulp.src([
            './node_modules/bootstrap/dist/css/bootstrap.min.css',
            './node_modules/font-awesome/css/font-awesome.min.css',
        ])
        .pipe(gulp.dest('./assets/raw/css'));
});

gulp.task('injectedfonts', function() {
    return gulp.src([
            './node_modules/font-awesome/fonts/**/*',
        ])
        .pipe(gulp.dest('./assets/fonts'));
});

gulp.task('less', ['injectedfonts', 'injectedcss'], function () {
    return gulp.src('./assets/raw/less/*.less')
        .pipe(less())
        .pipe(gulp.dest('./assets/raw/css'));
});