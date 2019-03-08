jQuery(document).ready(function($){
	$('#tag-most-popular').appendTo('.most-popular-article-container:first');
});

jQuery(document).ready(function($){
	$('#tag-most-recent').appendTo('.most-recent-article-container:first');
});

jQuery(document).ready(function($){
	$('#tag-all-of').appendTo('.tag-allof-container:first');
});
function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
   }
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
