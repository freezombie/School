function showVideo(id) {
	document.write("<object width=\"291\" height=\"225\"><param name=\"movie\" value=\"http://www.youtube.com/v/"+id+">&amp;hl=en&amp;fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><embed src=\"http://www.youtube.com/v/"+id+"&amp;hl=en&amp;fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"291\" height=\"225\"></embed></object>");
}

$(function() {
	$('#featured').cycle({
		fx: 'scrollLeft',
		speed: 700,
		timeout: 5000
	});
});
