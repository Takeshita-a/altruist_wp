	$(".sp_menu").on("click", function() {
		$(this).toggleClass("active").next().slideToggle(300);
	});

	var topBtn = $('#page-top');	
    topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
    });