window.onload=function(){const e=document.getElementById("js-spinner");e.classList.add("loaded"),window.setTimeout(function(){const e=document.getElementById("js-fvtitle");e.classList.add("is-animated"),window.setTimeout(function(){const e=document.getElementById("js-fvcontent");e.classList.add("is-show"),window.setTimeout(function(){const e=document.getElementById("js-fvbutton");e.classList.add("is-show")},250)},250)},500)},document.addEventListener("DOMContentLoaded",function(){const n=document.querySelector(".js-cursor");var e=document.querySelectorAll("a"),t=document.querySelectorAll("summary");document.addEventListener("mousemove",function(e){var t=e.pageX-window.pageXOffset,e=e.pageY-window.pageYOffset;n.style.transform="translate("+t+"px,"+e+"px)"}),Array.prototype.forEach.call(e,function(e){e.addEventListener("mouseenter",function(){n.classList.add("is-hovering")}),e.addEventListener("mouseleave",function(){n.classList.remove("is-hovering")})}),Array.prototype.forEach.call(t,function(e){e.addEventListener("mouseenter",function(){n.classList.add("is-hovering")}),e.addEventListener("mouseleave",function(){n.classList.remove("is-hovering")})})});const ballWrap=document.getElementById("js-rollingball"),ballElement=document.createElement("span");ballElement.className="p-fv__visualElement";for(let e=0;e<180;e++){const q=ballElement.cloneNode(),r=q.style;r.transform="rotateY("+e+"deg)",ballWrap.appendChild(q)}function showElementAnimation(){const t=document.getElementsByClassName("js-fadeIn");if(t){var n=768<window.innerHeight?200:40,o=window.pageYOffset,s=window.innerHeight;for(let e=0;e<t.length;e++){var i=o+t[e].getBoundingClientRect().top;i<o+s-n?t[e].classList.add("is-show"):o+s<i&&t[e].classList.remove("is-show")}}}showElementAnimation(),window.addEventListener("scroll",showElementAnimation);