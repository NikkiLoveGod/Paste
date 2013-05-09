jQuery(document).ready(function($) {
	$('.pastebox').tabby();

    $('.nav a').each(function() {
        $(this).attr('data-content', $(this).text())
               .text('');
    });

});