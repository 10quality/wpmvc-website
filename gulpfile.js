/**
 * Gulp
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package WPMVC
 * @license MIT
 * @version 1.0.6
 */

'use strict';

// Prepare
var fs = require('fs');
var gulp = require('gulp');
var wpmvc = require('gulp-wpmvc');
// @since 1.0.1
var less = require('gulp-less');
var concat = require('gulp-concat');

// Load package JSON as config file.
var config = JSON.parse(fs.readFileSync('./package.json'));

// Init WPMVC default tasks.
wpmvc(gulp, config);

// --------------
// START - CUSTOM TASKS

/**
 * Copies CSS dependencies to assets folder.
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
 * Copies FONTS to assets folder.
 * @since 1.0.1
 */
gulp.task('vendorfonts', function() {
    return gulp.src([
            './node_modules/font-awesome/fonts/**/*',
        ])
        .pipe(gulp.dest('./assets/fonts'));
});

/**
 * Copies JS to assets folder.
 * @since 1.0.1
 */
gulp.task('vendorjs', function() {
    return gulp.src([
            './node_modules/bootstrap/dist/js/bootstrap.min.js',
            './node_modules/jquery-match-height/dist/jquery.matchHeight-min.js',
            './node_modules/jquery.scrollto/jquery.scrollTo.min.js',
            './node_modules/clipboard/dist/clipboard.min.js',
        ])
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('./assets/js'));
});

/**
 * Compiles LESS files and runs all other tasks.
 * @since 1.0.1
 */
gulp.task('less', ['vendorfonts', 'vendorcss'], function () {
    return gulp.src('./assets/raw/less/*.less')
        .pipe(less())
        .pipe(gulp.dest('./assets/raw/css'));
});