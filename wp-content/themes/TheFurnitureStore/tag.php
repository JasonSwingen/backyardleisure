<?php get_header();
if($OPTION['wps_blogTags_option']) {
	include(TEMPLATEPATH . "/includes/tags/tag-blog.php" );
} else {
	include(TEMPLATEPATH . "/includes/tags/tag-shop.php" );
}
?>