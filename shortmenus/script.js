$(document).ready(function(){
	$("#short-trigger").off("click").on("click",function(){
		$(this).find("i").toggle();
		$(".short-target").toggle();
	});
});