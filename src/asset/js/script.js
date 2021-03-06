// js-loading
window.onload = function () {
	const spinner = document.getElementById("js-spinner");
	spinner.classList.add("loaded");

	// js-fvTitle1 0.5秒後に実行
	window.setTimeout(onload_fv1, 500);
	function onload_fv1() {
		const fvTitle1 = document.getElementById("js-fvTitle1");
		fvTitle1.classList.add("is-show");
		// js-fvTitle2 0.25秒後に実行
		window.setTimeout(onload_fv2, 250);
		function onload_fv2() {
			const fvTitle2 = document.getElementById("js-fvTitle2");
			fvTitle2.classList.add("is-show");
			// js-headerIn .is-show 0.5秒後に実行
			window.setTimeout(onload_fv3, 500);
			function onload_fv3() {
				const headerIn = document.getElementById("js-headerIn");
				headerIn.classList.add("is-show");
				// js-fvScroll 1秒後に実行
				window.setTimeout(onload_fv3, 1000);
				function onload_fv3() {
					const fvScroll = document.getElementById("js-fvScroll");
					fvScroll.classList.add("is-show");
				}
			}
		}
	}
};

// // #js-headerIn .is-headerIn
// (function () {
// 	const target = document.getElementById("js-headerIn"),
// 		height = 60;
// 	let offset = 0,
// 		lastPosition = 0,
// 		ticking = false;

// 	function onScroll() {
// 		if (lastPosition > height) {
// 			if (lastPosition > offset) {
// 				target.classList.add("is-headIn");
// 			} else {
// 				target.classList.remove("is-headIn");
// 			}
// 			offset = lastPosition;
// 		}
// 	}

// 	window.addEventListener("scroll", function (e) {
// 		lastPosition = window.scrollY;
// 		if (!ticking) {
// 			window.requestAnimationFrame(function () {
// 				onScroll(lastPosition);
// 				ticking = false;
// 			});
// 			ticking = true;
// 		}
// 	});
// })();

// #js-navToggle js-navLists
const toggle = document.getElementsByClassName("js-navToggle")[0];
const navLink = document.querySelectorAll(
	".l-header__navLists li a,.l-header__navCta"
);

for (let i = 0; i < navLink.length; i++) {
	navLink[i].onclick = function () {
		toggle.checked = false;
	};
}

// .js-innerspan
const innerspan = document.querySelector(".js-innerspan");
innerspan.innerHTML = innerspan.textContent.replace(/\S/g, "<span>$&</span>");

// innerspan span insert rotate spanelement
const spanelement = document.querySelectorAll("span");
for (let i = 0; i < spanelement.length; i++) {
	spanelement[i].style.transition =
		"1s cubic-bezier(0.22, 1, 0.36, 1)" + i * 0.05 + "s";
}

// .js-fadein
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
showElementAnimation();
window.addEventListener("scroll", showElementAnimation);

if (window.matchMedia("(min-width: 640px)").matches) {
	//PC環境の場合
	// js-cursor
	document.addEventListener("DOMContentLoaded", function () {
		const cursor = document.querySelector(".js-cursor");
		const links = document.querySelectorAll("a,label,input");
		const links2 = document.querySelectorAll(".js-service__hovering");

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
		Array.prototype.forEach.call(links2, function (link2) {
			// linksホバー時is-hoveringクラス付与
			link2.addEventListener("mouseenter", function () {
				cursor.classList.add("is-hovering--service");
			});

			//linksホバー時is-hoveringクラス削除
			link2.addEventListener("mouseleave", function () {
				cursor.classList.remove("is-hovering--service");
			});
		});
	});
	//モバイル環境の場合
} else {
}
