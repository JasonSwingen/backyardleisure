<?php 
switch($OPTION['wps_blogPostContent_option']){
					
	case 'content_link': ?>
		<p><?php the_content_rss('', TRUE, '', $wordLimit);?></p>
	<?php
	break;
													
	case 'excerpt_link':
		the_excerpt(); 
	break;
} 
?>
<p class="read_more">
	<a href="<?php the_permalink(); ?>"><?php echo get_option('wps_readMoreLink'); ?></a>
</p>