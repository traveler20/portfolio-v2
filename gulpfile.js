//gulp本体
const gulp = require("gulp");

//scss Dart Sass はSass公式が推奨 @use構文などが使える
const sass = require("gulp-dart-sass");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
// エラーが発生しても強制終了させない
const plumber = require("gulp-plumber");
// エラー発生時のアラート出力
const notify = require("gulp-notify");
//ブラウザリロード
const browserSync = require("browser-sync");

// 入出力するフォルダを指定
const srcBase = "./src";
const distBase = "./dist";

const srcPath = {
	scss: srcBase + "/asset/sass/**/*.scss",
	js: srcBase + "/asset/js/*.js",
	html: srcBase + "/*.html",
};

const distPath = {
	css: distBase + "/asset/css/",
	js: distBase + "/asset/js/",
	html: distBase + "/",
};

/**
 * sass
 */
const cssSass = () => {
	return gulp
		.src(srcPath.scss, {
			sourcemaps: true,
		})
		.pipe(
			//エラーが出ても処理を止めない
			plumber({
				errorHandler: notify.onError("Error:<%= error.message %>"),
			})
		)
		.pipe(sass({ outputStyle: "expanded" })) //指定できるキー expanded compressed
		.pipe(gulp.dest(distPath.css, { sourcemaps: "./" })) //コンパイル先
		.pipe(browserSync.stream())
		.pipe(
			notify({
				message: "Sassをコンパイルしました！",
				onLast: true,
			})
		);
};

/**
 * js
 */
const js = () => {
	return (
		gulp
			.src(srcPath.js)
			.pipe(
				//エラーが出ても処理を止めない
				plumber({
					errorHandler: notify.onError("Error:<%= error.message %>"),
				})
			)
			.pipe(uglify())
			// .pipe(
			// 	rename({
			// 		extname: ".min.js",
			// 	})
			// )
			.pipe(gulp.dest(distPath.js))
			.pipe(browserSync.stream())
	);
};

/**
 * html
 */
const html = () => {
	return gulp.src(srcPath.html).pipe(gulp.dest(distPath.html));
};

/**
 * ローカルサーバー立ち上げ
 */
const browserSyncFunc = () => {
	browserSync.init(browserSyncOption);
};

const browserSyncOption = {
	server: distBase,
};

/**
 * リロード
 */
const browserSyncReload = (done) => {
	browserSync.reload();
	done();
};

/**
 * ファイル監視 ファイルの変更を検知したら、browserSyncReloadでreloadメソッドを呼び出す
 * series 順番に実行
 * watch('監視するファイル',処理)
 */
const watchFiles = () => {
	gulp.watch(srcPath.scss, gulp.series(cssSass));
	gulp.watch(srcPath.js, gulp.series(js));
	gulp.watch(srcPath.html, gulp.series(html, browserSyncReload));
};

/**
 * seriesは「順番」に実行
 * parallelは並列で実行
 */
exports.default = gulp.series(
	gulp.parallel(html, js, cssSass),
	gulp.parallel(watchFiles, browserSyncFunc)
);
