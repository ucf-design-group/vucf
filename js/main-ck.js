// Will adjust classes and properties to display the correct menu
function adjustNav(){if($(document).width()<540){$("nav.main-menu").removeClass("full").addClass("compact");$(".compact-menu").css("display","block");$(".main-menu ul").hide()}if($(document).width()>540){$("nav.main-menu").removeClass("compact").addClass("full");$(".compact-menu").css("display","none");$(".main-menu ul").show()}}$(document).ready(function(){(function(){var e={kitId:"bgz0fho",scriptTimeout:3e3},t=document.getElementsByTagName("html")[0];t.className+=" wf-loading";var n=setTimeout(function(){t.className=t.className.replace(/(\s|^)wf-loading(\s|$)/g," ");t.className+=" wf-inactive"},e.scriptTimeout),r=document.createElement("script"),i=!1;r.src="//use.typekit.net/"+e.kitId+".js";r.type="text/javascript";r.async="true";r.onload=r.onreadystatechange=function(){var t=this.readyState;if(i||t&&t!="complete"&&t!="loaded")return;i=!0;clearTimeout(n);try{Typekit.load(e)}catch(r){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(r,s)})();adjustNav();$(".menu-toggle").on("click",function(e){$(".main-menu ul").slideToggle();e.preventDefault()})});$(window).resize(function(){adjustNav()});