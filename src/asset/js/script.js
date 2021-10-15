// js-loading
window.onload = function () {
	const spinner = document.getElementById("js-spinner");
	spinner.classList.add("loaded");

	// js-fvtitle 0.5秒後に実行
	// window.setTimeout(onload_fv1, 500);
	// function onload_fv1() {
	// 	const fvtitle = document.getElementById("js-fvtitle");
	// 	fvtitle.classList.add("is-animated");
	// 	// js-fvcontent 0.25秒後に実行
	// 	window.setTimeout(onload_fv2, 250);
	// 	function onload_fv2() {
	// 		const fvcontent = document.getElementById("js-fvcontent");
	// 		fvcontent.classList.add("is-show");
	// 		// js-fvbutton 0.25秒後に実行
	// 		window.setTimeout(onload_fv3, 250);
	// 		function onload_fv3() {
	// 			const fvbutton = document.getElementById("js-fvbutton");
	// 			fvbutton.classList.add("is-show");
	// 		}
	// 	}
	// }
};

// js-cursor
document.addEventListener("DOMContentLoaded", function () {
	const cursor = document.querySelector(".js-cursor");
	const links = document.querySelectorAll("a");
	const links2 = document.querySelectorAll("summary");

	// cursorを追従させる機能
	document.addEventListener("mousemove", function (e) {
		const x = e.pageX - window.pageXOffset;
		const y = e.pageY - window.pageYOffset;

		cursor.style.transform = "translate(" + x + "px," + y + "px)";
	});

	// linksホバー時の機能
	Array.prototype.forEach.call(links, function (link) {
		// linksホバー時is-hoveringクラス付与
		link.addEventListener("mouseenter", function () {
			cursor.classList.add("is-hovering");
		});

		//linksホバー時is-hoveringクラス削除
		link.addEventListener("mouseleave", function () {
			cursor.classList.remove("is-hovering");
		});
	});
	Array.prototype.forEach.call(links2, function (link) {
		// linksホバー時is-hoveringクラス付与
		link.addEventListener("mouseenter", function () {
			cursor.classList.add("is-hovering");
		});

		//linksホバー時is-hoveringクラス削除
		link.addEventListener("mouseleave", function () {
			cursor.classList.remove("is-hovering");
		});
	});
});

// js-navToggle js-navLists
const toggle = document.getElementsByClassName("js-navToggle")[0];
const navLink = document.querySelectorAll(".l-header__navLists li a");

for (let i = 0; i < navLink.length; i++) {
	navLink[i].onclick = function () {
		toggle.checked = false;
	};
}

// #js-rollingball .p-fv__visual
const ballWrap = document.getElementById("js-rollingball");
const ballElement = document.createElement("span");
ballElement.className = "p-fv__visualElement";

for (let i = 0; i < 180; i++) {
	const ballClone = ballElement.cloneNode();
	const ballCloneStyle = ballClone.style;
	//1deg ずつずらして180度分重ねる
	ballCloneStyle.transform = "rotateY(" + i + "deg)";
	ballWrap.appendChild(ballClone);
}

// js-fadein
function showElementAnimation() {
	/* js-fadeInの値をelementに代入 */
	const element = document.getElementsByClassName("js-fadeIn");
	/* 要素がなかったら処理をキャンセル */
	if (!element) return;

	/* 要素が出るタイミングの調整 */
	// 要素が200px（768px以下のウィンドウサイズでは40px）分過ぎたら表示させる
	const showTiming = window.innerHeight > 768 ? 200 : 40; // 表示させるwindowのコンテンツの高さ
	const scrollY = window.pageYOffset; // Y軸へのスクロール
	const windowH = window.innerHeight; // windowのコンテンツの高さ

	/* i(element)の数分だけ繰り返す */
	for (let i = 0; i < element.length; i++) {
		const elemClientRect = element[i].getBoundingClientRect(); // 要素の寸法と位置
		const elemY = scrollY + elemClientRect.top; // スクロール分と要素の一番高い部分との足し算
		/* 表示させるwindowの高さまでスクロールしたとき */
		if (scrollY + windowH - showTiming > elemY) {
			/* is-showを追加 */
			element[i].classList.add("is-show");
			/* スクロール分が表示させる高さより上に移動したとき */
		} else if (scrollY + windowH < elemY) {
			/* 上にスクロールして再度is-showを削除 */
			element[i].classList.remove("is-show");
		}
	}
}
/* 関数showElementAnimationを実行 */
showElementAnimation();
window.addEventListener("scroll", showElementAnimation);
