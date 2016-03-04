<?php 
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
	<div id="<?php echo $the_div_id;?>" class="<?php echo $the_div_class;?>">
		<ul id="<?php echo $the_ul_id;?>">
			<?php include (TEMPLATEPATH . '/includes/index/featured.php');?>
		</ul>
        <div style="font-family:Arial, Helvetica, sans-serif; line-height:1.6em">
          <p><br />
    Backyard Leisure Spas, Pools, and Billiards of Raleigh, North Carolina was started to give our customers the highest quality family fun hot tubs, pools, and billiards available.  We have established this business after 15+ years of experience. We have taken what we have learned over the years to provide the absolutely highest quality products in the industry at the lowest possible price.  That experience has taught us how to help you find the right hot tub or pool table to match what you're looking for. 
    <br /><br />
     We are a family owned business with a friendly atmosphere to match. At Backyard Leisure, customer service is not just a department- it is an attitude! We are here for you, our customers. We want everyone to be able to get the spa, pool, or pool table of their dreams. Therefore, we offer several different finance plans to help suit your needs. Come and see us soon! 
     <br /><br/ > 
    
We offer the highest quality hot tubs from Bullfrog Spas and West Coast Spas that we get direct from the factory. All of our billiard tables are specially handcrafted in the United States by Stripe 9 Billiards and are the finest products available. Stop by and take a look and we think you will agree!<br /><br />  
Hurry in soon to take advantage of our special Holiday Sale going on now. We are offering these same great hot tubs and pool tables for up to 50% off! Come see how we can help you get an exceptional deal on a new spa or pool table just in time for the holidays.
          </p></div>        
	</div><!-- main_col -->	
	<?php include (TEMPLATEPATH . '/widget_ready_areas.php');
}  

get_footer();

?>


