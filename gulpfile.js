/**
 * Define dependencies
 */

const gulp = require('gulp');
const gulpLess = require('gulp-less');
const gulpWebpack = require('gulp-webpack');
const uglify = require('gulp-uglify');

gulp.task('less', function () {
    return gulp.src('src/less/*.less')
        .pipe(gulpLess())
        .pipe(gulp.dest("website/assets/css"));
});

gulp.task('ts', function () {
    return gulp.src('src/index.ts')
        .pipe(gulpWebpack({
            module: {
                loaders: [
                    {test: /\.ts(x?)$/, loader: 'ts-loader'},
                ],
            },
            output: {
                filename: "bundle.js"
            },
            resolve: {
                // Add '.ts' and '.tsx' as a resolvable extension.
                extensions: ["", ".webpack.js", ".web.js", ".ts", ".tsx", ".js"]
            }
        }))
        .pipe(uglify())
        .pipe(gulp.dest("website/assets/js"));
});

gulp.task('watch', function(){
    gulp.watch("src/less/*.less", gulp.series('less'));
    gulp.watch("src/*.ts", gulp.series('ts'));
});

gulp.task('default', gulp.series(['less', 'watch'], function(done) {
    done();
}));
