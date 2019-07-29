const gulp = require('gulp');
const config = require('./gulp.config.js');
const del = require('del');
const webpackStream = require('webpack-stream');
const webpack = require('webpack');
const webpackConfig = require('./webpack.config.js');
const nodemon = require('gulp-nodemon');
const browserSync = require('browser-sync').create();
const plumber = require('gulp-plumber');
const nunjucks = require('gulp-nunjucks-render');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');

// clean dist directory
gulp.task('clean', function() {
    return del(config.paths.dist.files);
});

// craft scripts
gulp.task('dev:scripts', function() {
    return gulp
            .src(config.paths.scripts.entry)
            .pipe(webpackStream(webpackConfig, webpack))
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(config.paths.scripts.dist))
            .pipe(browserSync.stream());
});
gulp.task('watch:scripts', function() {
    return gulp
            .watch(config.paths.scripts.src, gulp.series('dev:scripts')).on('change', browserSync.reload);
});
gulp.task('prod:scripts', function() {
    return gulp
            .src(config.paths.scripts.entry)
            .pipe(webpackStream(webpackConfig, webpack))
            .pipe(uglify())
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(config.paths.scripts.dist))
});

// craft views
gulp.task('dev:views', function() {
    return gulp
            .src(config.paths.views.src)
            .pipe(plumber())
            .pipe(nunjucks({
                path: 'src/templates'
            }))
            .pipe(gulp.dest(config.paths.views.dist))
            .pipe(browserSync.stream());
});
gulp.task('watch:views', function() {
    return gulp
            .watch('./src/**/*.njk', gulp.series('dev:views')).on('change', browserSync.reload);
});
gulp.task('prod:views', function() {
    return gulp
            .src(config.paths.views.src)
            .pipe(nunjucks({
                path: 'src/templates'
            }))
            .pipe(gulp.dest(config.paths.views.dist))
});

// craft styles
gulp.task('dev:styles', function() {
    return gulp
            .src(config.paths.styles.src)
            .pipe(sourcemaps.init())
            .pipe(plumber())
            .pipe(sass({
                includePaths: ['node_modules']
            }).on('error', sass.logError))
            .pipe(autoprefixer({
                browsers: ['> 5%'],
                cascade: false,
                remove: true
            }))
            .pipe(rename({
                basename: 'bundle',
                suffix: '.min'
            }))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(config.paths.styles.dist))
            .pipe(browserSync.stream());
});
gulp.task('watch:styles', function() {
    return gulp
            .watch('./src/styles/**/*.scss', gulp.series('dev:styles')).on('change', browserSync.reload);
});
gulp.task('prod:styles', function() {
    return gulp
            .src(config.paths.styles.src)
            .pipe(sass({
                includePaths: ['node_modules']
            }).on('error', sass.logError))
            .pipe(autoprefixer({
                browsers: ['> 5%'],
                cascade: false,
                remove: true
            }))
            .pipe(cleanCSS({compatibility: 'ie8'}))
            .pipe(rename({
                basename: 'bundle',
                suffix: '.min'
            }))
            .pipe(gulp.dest(config.paths.styles.dist))
});

// craft images
gulp.task('dev:images', function() {
    return gulp
            .src(config.paths.images.src)
            .pipe(gulp.dest(config.paths.images.dist))
            .pipe(browserSync.stream());
});
gulp.task('watch:images', function() {
    return gulp
            .watch(config.paths.images.src, gulp.series('dev:images'));
});
gulp.task('prod:images', function() {
    return gulp
            .src(config.paths.images.src)
            .pipe(gulp.dest(config.paths.images.dist))
});

// craft favicons
gulp.task('dev:favicons', function() {
    return gulp
            .src(config.paths.favicons.src)
            .pipe(gulp.dest(config.paths.favicons.dist))
            .pipe(browserSync.stream());
});
gulp.task('watch:favicons', function() {
    return gulp
            .watch(config.paths.favicons.src, gulp.series('dev:favicons'));
});
gulp.task('prod:favicons', function() {
    return gulp
            .src(config.paths.favicons.src)
            .pipe(gulp.dest(config.paths.favicons.dist))
});

// Move fonts
gulp.task('move:fonts', done => {
    gulp.src(config.paths.fonts.src)
    .pipe(gulp.dest(config.paths.fonts.dist));
    done();
});

// setup and start server
gulp.task('server', function (cb) {
    var called = false;
    return nodemon(config.plugins.nodemon)

    .on('start', function () {
        if (!called) {
            called = true;
            cb();
        }
    })
});

// browserSync initialition
gulp.task('browser-sync', function() {
    return browserSync.init(config.plugins.browserSync)
});

// dev
gulp.task('dev', gulp.parallel('dev:styles', 'dev:views', 'dev:scripts', 'dev:images', 'dev:favicons', 'move:fonts'));

// watch
gulp.task('watch', gulp.parallel('watch:styles', 'watch:views', 'watch:scripts', 'watch:images', 'watch:favicons'));

// build for production (with views)
gulp.task('build', gulp.parallel('clean', 'prod:styles', 'prod:views', 'prod:scripts', 'prod:images', 'prod:favicons', 'move:fonts'));

// default
gulp.task('default', gulp.series('clean', 'dev', 'server', gulp.parallel('watch','browser-sync')));
