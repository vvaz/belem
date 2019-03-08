jQuery(document).ready(function($){
	$(window).scroll(function(){
        if ($(this).scrollTop() < 200) {
			$('#smoothup') .fadeOut();
        } else {
			$('#smoothup') .fadeIn();
        }
    });
	$('#smoothup').on('click', function(){
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
		});
});

jQuery(document).ready(function($){
	
	$('#smoothup2').on('click', function(){
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
		});
});
