var gulp = require('gulp');
var concat = require('gulp-concat-sourcemap');

gulp.task('main', function() {
    gulp.src([
        'app/app.js'
    ])
        .pipe(concat('app.js'))
        .pipe(gulp.dest('../www/assets/js/'));
});

gulp.task('watch', function() {
    gulp.watch('app/**/*.js', ['main']);
});

gulp.task('default', ['main']);
