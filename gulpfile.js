const { src, dest, parallel , series , watch } = require('gulp');
// Gulp Sass
const sass = require('gulp-sass')(require('sass'));
const fileinclude = require('gulp-file-include');
const sourcemaps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify');
const minify = require('gulp-minifier');
const strip = require('gulp-strip-comments');
const rtlcss = require('gulp-rtlcss');
const rename = require('gulp-rename');

// sass.compiler = require('node-sass'); // no-need for gulp-sass v5+

var node_path = '../..';


/*function html(cb) {
  src('src/html/**')
  .pipe(dest('frontend/web/dlite/html'));

  cb();
}*/

function scss(cb) {
  src(['src/scss/*.scss'])
  // .pipe(sourcemaps.init())               // If you want generate source map.
  .pipe(sass().on('error', sass.logError))  // uses {outputStyle: 'compressed'} in saas() for minify css
  // .pipe(sourcemaps.write('./'))          // If you want generate source map.
  .pipe(dest('frontend/web/dlite/assets/css'));

  src(['src/scss/*.scss', '!src/scss/style-email.scss'])
  // .pipe(sourcemaps.init())               // If you want generate source map.
  .pipe(sass().on('error', sass.logError))  // uses {outputStyle: 'compressed'} in saas() for minify css
  // .pipe(sourcemaps.write('./'))          // If you want generate source map.
  .pipe(rtlcss())
  .pipe(rename({ suffix: '.rtl' }))
  .pipe(dest('frontend/web/dlite/assets/css'));

  // EDITORS
  src(['src/scss/editors/*.scss'])
  // .pipe(sourcemaps.init())                                           // If you want generate source map.
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))   // remove {outputStyle: 'compressed'} from saas() if do not want to minify css
  // .pipe(sourcemaps.write('./'))                                      // If you want generate source map.
  .pipe(dest('frontend/web/dlite/assets/css/editors'));

  src(['src/scss/editors/*.scss'])
  // .pipe(sourcemaps.init())                                           // If you want generate source map.
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))   // remove {outputStyle: 'compressed'} from saas() if do not want to minify css
  // .pipe(sourcemaps.write('./'))                                      // If you want generate source map.
  .pipe(rtlcss())
  .pipe(rename({ suffix: '.rtl' }))
  .pipe(dest('frontend/web/dlite/assets/css/editors'));

  src(['src/scss/libs/*.scss'])
  // .pipe(sourcemaps.init())                                           // If you want generate source map.
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))   // remove {outputStyle: 'compressed'} from saas() if do not want to minify css
  // .pipe(sourcemaps.write('./'))                                      // If you want generate source map.
  .pipe(dest('frontend/web/dlite/assets/css/libs'));

  // SKINS
  src(['src/scss/skins/*.scss'])
  // .pipe(sourcemaps.init())               // If you want generate source map.
  .pipe(sass().on('error', sass.logError))  // uses {outputStyle: 'compressed'} in saas() for minify css
  // .pipe(sourcemaps.write('./'))          // If you want generate source map.
  .pipe(dest('frontend/web/dlite/assets/css/skins'));

  cb();
}

function js_scripts(cb) {
  src(['src/js/*.js','!src/js/bundle.js'])
  // .pipe(uglify())                        // If you minify the code.
  .pipe(dest('frontend/web/dlite/assets/js'));

  src(['src/js/charts/*.js'])
  // .pipe(uglify())                        // If you minify the code.
  .pipe(dest('frontend/web/dlite/assets/js/charts'));

  src(['src/js/apps/*.js'])
  // .pipe(uglify())                        // If you minify the code.
  .pipe(dest('frontend/web/dlite/assets/js/apps'));

  cb();
}

function js_bundle(cb) {
  src('src/js/bundle.js')
  .pipe(fileinclude({
    prefix: '@@',
    basepath: '@file',
    context: { build: 'frontend/web/dlite', nodeRoot: node_path }
  }))
  .pipe(strip())
  .pipe(minify({ minify: true, minifyJS: { sourceMap: false } }))     // Disable, if you dont want to minify bundle file.
  .pipe(dest('frontend/web/dlite/assets/js'));

  src(['src/js/libs/**', '!src/js/libs/editors/skins/**'])
  .pipe(fileinclude({
    prefix: '@@',
    basepath: '@file',
    context: { build: 'frontend/web/dlite', nodeRoot: node_path }
  }))
  .pipe(strip())
  .pipe(minify({ minify: true, minifyJS: { sourceMap: false } }))     // Disable, if you dont want to minify bundle file.
  .pipe(dest('frontend/web/dlite/assets/js/libs'));

  src('src/js/libs/editors/skins/**').pipe(dest('frontend/web/dlite/assets/js/libs/editors/skins'));

  cb();
}

function assets(cb){
  src(['src/images/**'])
  .pipe(dest('frontend/web/dlite/images'));

  src(['src/assets/**', '!src/assets/js/**', '!src/assets/css/**'])
  .pipe(dest('frontend/web/dlite/assets'));

  cb();
}

exports.build = series(scss, js_scripts, js_bundle, assets);

exports.develop = function() {
    watch(['src/scss/*.scss','src/scss/**'], scss)
    // watch(['src/html/*.html','src/html/**/*.html'], html)
    watch(['src/images/**', 'src/assets/**'], assets)
    watch(['src/js/*.js','src/js/charts/*.js', 'src/js/apps/*.js', '!src/js/bundle.js'], js_scripts)
    watch(['src/js/libs/**','src/js/bundle.js'], js_bundle)
};
