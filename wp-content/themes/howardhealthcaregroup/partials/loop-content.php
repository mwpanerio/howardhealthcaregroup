<?php
	if(is_home() || is_archive() || is_search()) {
		echo get_template_part('partials/loop-blog');
	} else {
		echo get_template_part('partials/testimonial-card');
	}
?>