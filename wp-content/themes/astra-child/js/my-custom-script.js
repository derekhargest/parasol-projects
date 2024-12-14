jQuery(document).ready(function ($) {
	if (typeof post_data !== 'undefined') {
		$('a.cl-element-featured_media__anchor').each(function () {
			var postId = post_data.post_id; // Access the post ID
			$(this).attr('href', '#myModal-' + postId);
		});
	} else {
		console.error('post_data is not defined.');
	}
});
