window.onload=function(){const e=document.getElementById("js-spinner");e.classList.add("loaded"),window.setTimeout(function(){const e=document.getElementById("js-fvTitle1");e.classList.add("is-show"),window.setTimeout(function(){const e=document.getElementById("js-fvTitle2");e.classList.add("is-show"),window.setTimeout(function(){const e=document.getElementById("js-headerIn");e.classList.add("is-show"),window.setTimeout(function(){const e=document.getElementById("js-fvScroll");e.classList.add("is-show")},1e3)},500)},250)},500)};const toggle=document.getElementsByClassName("js-navToggle")[0],navLink=document.querySelectorAll(".l-header__navLists li a,.l-header__navCta");for(let e=0;e<navLink.length;e++)navLink[e].onclick=function(){toggle.checked=!1};const innerspan=document.querySelector(".js-innerspan");innerspan.innerHTML=innerspan.textContent.replace(/\S/g,"<span>$&</span>");const spanelement=document.querySelectorAll("span");for(let e=0;e<spanelement.length;e++)spanelement[e].style.transition="1s cubic-bezier(0.22, 1, 0.36, 1)"+.05*e+"s";function showElementAnimation(){const n=document.getElementsByClassName("js-fadeIn");if(n){var t=768<window.innerHeight?200:40,s=window.pageYOffset,o=window.innerHeight;for(let e=0;e<n.length;e++){var i=s+n[e].getBoundingClientRect().top;i<s+o-t?n[e].classList.add("is-show"):s+o<i&&n[e].classList.remove("is-show")}}}showElementAnimation(),window.addEventListener("scroll",showElementAnimation),window.matchMedia("(min-width: 640px)").matches&&document.addEventListener("DOMContentLoaded",function(){const t=document.querySelector(".js-cursor");var e=document.querySelectorAll("a"),n=document.querySelectorAll(".js-service__hovering");document.addEventListener("mousemove",function(e){var n=e.pageX-window.pageXOffset,e=e.pageY-window.pageYOffset;t.style.transform="translate("+n+"px,"+e+"px)"}),Array.prototype.forEach.call(e,function(e){e.addEventListener("mouseenter",function(){t.classList.add("is-hovering")}),e.addEventListener("mouseleave",function(){t.classList.remove("is-hovering")})}),Array.prototype.forEach.call(n,function(e){e.addEventListener("mouseenter",function(){t.classList.add("is-hovering--service")}),e.addEventListener("mouseleave",function(){t.classList.remove("is-hovering--service")})})});