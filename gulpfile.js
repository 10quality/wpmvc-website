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
gulp.task('injectedcss', function() {
    return gulp.src([
            './node_modules/bootstrap/dist/css/bootstrap.min.css',
            './node_modules/font-awesome/css/font-awesome.min.css',
        ])
        .pipe(gulp.dest('./assets/raw/css'));
});

/**
 * Copies FONTS to assets folder.
 * @since 1.0.1
 */
gulp.task('injectedfonts', function() {
    return gulp.src([
            './node_modules/font-awesome/fonts/**/*',
        ])
        .pipe(gulp.dest('./assets/fonts'));
});

/**
 * Copies admin-only JS to assets folder.
 * @since 1.0.1
 */
gulp.task('injectedadminjs', function() {
    return gulp.src([
            './node_modules/vue/dist/vue.js',
        ])
        .pipe(gulp.dest('./assets/admin/raw/js/external'));
});

/**
 * Concats admin-only JS files in assets folder.
 * @since 1.0.1
 */
gulp.task('adminscripts', ['injectedadminjs'], function() {
    return gulp.src('./assets/admin/raw/js/**/*.js')
        .pipe(concat('app.js'))
        .pipe(gulp.dest('./assets/admin/js'));
});

/**
 * Copies JS to assets folder.
 * @since 1.0.1
 */
gulp.task('injectedjs', ['adminscripts'], function() {
    return gulp.src([
            './node_modules/vue/dist/vue.js',
            './node_modules/bootstrap/dist/js/bootstrap.min.js',
            './node_modules/jquery-match-height/dist/jquery.matchHeight-min.js',
        ])
        .pipe(gulp.dest('./assets/raw/js/external'));
});

/**
 * Compiles LESS files and runs all other tasks.
 * @since 1.0.1
 */
gulp.task('less', ['injectedfonts', 'injectedcss'], function () {
    return gulp.src('./assets/raw/less/*.less')
        .pipe(less())
        .pipe(gulp.dest('./assets/raw/css'));
});