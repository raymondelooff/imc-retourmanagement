'use strict';

var gulp = require('gulp'),
    gutil = require('gulp-util'),
    compass = require('gulp-compass'),
    livereload = require('gulp-livereload'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

gulp.task('blade', function() {
    return gulp.src('resources/views/**/*.blade.php')
        .pipe(livereload());
});

gulp.task('compass', function() {
    return gulp.src('resources/assets/sass/**/*.scss')
        .pipe(compass({
            config_file: 'resources/assets/config.rb',
            css: 'public/css',
            sass: 'resources/assets/sass'
        }).on('error', function(error) {
            gutil.log(error);
            this.emit('end');
        }))
        .pipe(gulp.dest('public/css'))
        .pipe(livereload());
});

gulp.task('compress', function() {
    return gulp.src('resources/assets/js/*.js')
        .pipe(concat('app.js'))
        .pipe(uglify().on('error', function(error) {
            gutil.log(error);
            this.emit('end');
        }))
        .pipe(gulp.dest('public/js'))
        .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();

    // Watch Twig files
    gulp.watch('resources/views/**/*.blade.php', ['blade']);

    // Watch SASS and SCSS files
    gulp.watch('resources/assets/sass/**/*.{sass,scss}', ['compass']);

    // Watch JS files
    gulp.watch('resources/assets/js/*.js', ['compress']);
});

gulp.task('default', ['watch']);