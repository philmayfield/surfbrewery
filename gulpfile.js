// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var svgmin = require('gulp-svgmin');
var cheerio = require('gulp-cheerio'); 
var svgstore = require('gulp-svgstore');
var imagemin = require ('gulp-imagemin');
var pngquant = require ('imagemin-pngquant');
var autoprefixer = require ('gulp-autoprefixer');

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src('./src/scss/main.scss')
        .pipe(sass())
        .pipe(rename('main.min.css'))
        .pipe(autoprefixer({ browsers: ['last 2 version'] }))
        .pipe(cssmin())
        .pipe(gulp.dest('./build/css'));
});
gulp.task('sass-admin', function() {
    return gulp.src('./src/scss/main-admin.scss')
        .pipe(sass())
        .pipe(rename('main-admin.min.css'))
        .pipe(autoprefixer({ browsers: ['last 2 version'] }))
        .pipe(cssmin())
        .pipe(gulp.dest('./build/css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src([
        './src/js/modernizr.custom.js', 
        './src/js/picturefill.js', 
        './src/js/svg4everybody.min.js', 
        './src/js/plugins.js', 
        './src/js/instagram.js', 
        './src/js/modal.js', 
        './src/js/droptab.js', 
        './src/js/main.js', 
        './src/js/scrollreveal.js'])
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./build/js'));
});
gulp.task('scripts-admin', function() {
    return gulp.src([
        './src/js/modernizr.custom.js', 
        './src/js/svg4everybody.min.js', 
        './src/js/modal.js', 
        './src/js/droptab.js', 
        './src/js/jquery.confirm.min.js', 
        './src/js/main-admin.js'])
        .pipe(concat('main-admin.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./build/js'));
});

// Optimize images
// gulp.task('imagemin', function() {
//     return gulp.src('./src/img/*')
//         .pipe(imagemin({
//             progressive: true,
//             svgoPlugins: [{removeViewBox: false}],
//             use: [pngquant()]
//         }))
//         .pipe(gulp.dest('./build/img'));
// });

// Create SVG sprite
gulp.task('svg-store', function () {
	return gulp.src('./src/svg/store/**/*')
		.pipe(svgmin())
        .pipe(cheerio({
            run: function ($) {
                $('path').each(function () {
                    if ($(this).attr('fill') == 'none') {
                        $(this).remove();
                    }
                });
                // $('[fill]').removeAttr('fill');
            },
            parserOptions: {xmlMode: true}
        }))
		.pipe(svgstore())
		.pipe(rename('defs.svg'))
		.pipe(gulp.dest('./build/svg'));
});

// Minify individual svgs
gulp.task('svg-solo', function () {
    return gulp.src('./src/svg/solo/**/*')
        .pipe(svgmin())
        .pipe(gulp.dest('./build/svg'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('./src/js/**/*.js', ['scripts']);
    gulp.watch('./src/js/**/*.js', ['scripts-admin']);
    gulp.watch('./src/scss/**/*.scss', ['sass']);
    gulp.watch('./src/scss/**/*.scss', ['sass-admin']);
    gulp.watch('./src/svg/**/*.svg', ['svg-store','svg-solo']);
});

// Default Task
gulp.task('default', ['sass', 'sass-admin', 'scripts', 'scripts-admin', 'svg-store', 'svg-solo', 'watch']);