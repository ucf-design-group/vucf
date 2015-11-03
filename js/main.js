// Will adjust classes and properties to display the correct menu
function adjustNav(){
	if($(document).width() < 540){
		$("nav.main-menu").removeClass("full").addClass("compact");
		$(".compact-menu").css("display", "block");
		$(".main-menu ul").hide();
	}
	if($(document).width() > 540){
		$("nav.main-menu").removeClass("compact").addClass("full");
		$(".compact-menu").css("display", "none");
		$(".main-menu ul").show();
	}
}


$(document).ready(function() {

	// Load TypeKit fonts
	(function() {
		var config = {
			kitId: 'bgz0fho',
			scriptTimeout: 3000
		};
		var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
	})();

	// Set up the navigation
	adjustNav();
	$(".menu-toggle").on("click", function(evt){
		$(".main-menu ul").slideToggle();
		evt.preventDefault();
	});

	$("#individual-info").hide();
	$("#rso-info").hide();

	// $("#individual-expand").click(function (evt) {
	// 	$("#individual-info").slideToggle();
	// 	evt.preventDefault();
	// });

	$("#rso-expand").click(function (evt) {
		$("#rso-info").slideToggle();
		evt.preventDefault();
	});



	// Event Toggles

	$(".event-toggle").hide();

	$(".event h2 a").click(function (evt) {
		$(this).parent().next(".event-toggle").slideToggle();
		evt.preventDefault();
	});

	$("#individual-expand").fancybox();
	$("#rso-expand").fancybox();
});


// If the viewport is resized, re-evaluate which menu to display
$(window).resize(function() {
	adjustNav();
});