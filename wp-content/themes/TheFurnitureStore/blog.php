<?php 
/*Template Name: Blog*/
get_header();



$DEFAULT = show_default_view(); 



include (TEMPLATEPATH . '/lib/pages/index_body.php'); 



 if($DEFAULT){ 

	

	// this is a "fake cronjob" = whenever default index page is called - the age of dlinks is checked - and removed if necessary

	delete_dlink();

	

	//content to feature?

	$featuredCont 	= $OPTION['wps_feature_option'];



	//type of effect?

	$featuredEffect 	= $OPTION['wps_featureEffect_option'];

	

	// sidebar location?

	$WPS_sidebar		= $OPTION['wps_sidebar_option'];

	switch($WPS_sidebar){

		case 'alignRight':

			$the_float_class 	= 'alignleft';

		break;

		case 'alignLeft':

			$the_float_class 	= 'alignright';

		break;

	}

	

	switch($featuredEffect){

		case 'innerfade_effect':

			$the_ul_id 		= 'innerfade_effect';

		break;

		case 'Slider_effect':

			$the_ul_id 		= 'slider';

		break;

		case 'cycle_effect':

			$the_ul_id 		= 'cycle';

		break;

	}

	

	if($OPTION['wps_front_sidebar_disable']) {

		$the_div_class 	= 'featured_wrap featured_wrap_alt';

		$the_div_id 	= 'main_col_alt';

	} else {

		$the_div_class 	= 'featured_wrap ' .$the_float_class;

		$the_div_id 	= 'main_col';



	}

?>
<?php
	$my_pageid = $page_id;//This is page id or post id
	$content_page = get_post($my_pageid);
	$content = $content_page->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array());
	$img = $image[0];			
?>


	<div id="<?php echo $the_div_id;?>" class="<?php echo $the_div_class;?>">
	<?php echo $content;?> 
    <?php
      query_posts("cat=3");
      while ( have_posts() ) : the_post() ?>
      <h2><?php the_title();?></h2>
      <p><?php the_content();?></p>
      
      <?php endwhile;?>

	</div><!-- main_col -->	

	<?php include (TEMPLATEPATH . '/widget_ready_areas.php');

}  



get_footer();



?>





