$(function(){

	var a = $(document).height();
	var b = "hide";
	
	$('.baseline').css("height",a);
	$('.baseline a').click(function(){
	
		if (b == "show") {
			$(this).text("Show Grid").parent().removeClass("show").addClass("hide");
			b = "hide";
		} else {
			$(this).text("Hide Grid").parent().removeClass("hide").addClass("show");
			b = "show";
		}
		
	});

});