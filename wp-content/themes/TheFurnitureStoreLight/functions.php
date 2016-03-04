<?php
##################################################################################################################################
// 	                                              Loading JS and OTHER HEADER STUFF
##################################################################################################################################
register_sidebar( array(
		'name' => __( 'Footer Tags Area', 'twentyten' ),
		'id' => 'footer-tags-area',
		'description' => __( 'tags area in footer', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
add_action('get_header', 'childtheme_queue_js');
add_action('wp_head', 'childtheme_head');

function childtheme_queue_js() {
	global $OPTION;
	
	if (!is_admin()){
		if(($_SERVER['HTTPS'] == 'on')||($_SERVER['HTTPS'] == '1') || ($_SERVER['SSL'] == '1')){
			$siteurl = get_bloginfo('stylesheet_directory');
			wp_enqueue_script( 'cufon-yui',$siteurl.'/js/cufon-yui.js', array('jquery'), '1.09', true );
			wp_enqueue_script( 'Napoleodoni_400-Napoleodoni_700.font',$siteurl.'/js/Napoleodoni_400-Napoleodoni_700.font.js', array('jquery'), '1.02', true );
			wp_enqueue_script( 'jquery.tools.min',$siteurl.'/js/jquery.tools.min.js', array('jquery'), '1.1.1', true );
			wp_enqueue_script( 'jquery.validate.pack',$siteurl.'/js/jquery.validate.pack.js', array('jquery'), '1.7', true );
			wp_enqueue_script( 'myjquery', $siteurl.'/js/myjquery.js', array('jquery'), '1', true );
		
		} else {
			wp_enqueue_script( 'cufon-yui',get_stylesheet_directory_uri().'/js/cufon-yui.js', array('jquery'), '1.09', true );
			wp_enqueue_script( 'Napoleodoni_400-Napoleodoni_700.font',get_stylesheet_directory_uri().'/js/Napoleodoni_400-Napoleodoni_700.font.js', array('jquery'), '1.02', true );
			wp_enqueue_script( 'jquery.tools.min',get_stylesheet_directory_uri().'/js/jquery.tools.min.js', array('jquery'), '1.1.1', true );
			wp_enqueue_script( 'jquery.validate.pack',get_stylesheet_directory_uri().'/js/jquery.validate.pack.js', array('jquery'), '1.7', true );
			
			//load only on front page
			if (is_home()) { 
				$featuredEffect 	= $OPTION['wps_featureEffect_option'];
				switch($featuredEffect){
					case 'innerfade_effect':
						wp_enqueue_script( 'jquery.innerfade',get_stylesheet_directory_uri().'/js/jquery.innerfade.js', array('jquery'), '1', true );
						wp_enqueue_script('innerfade_call',get_stylesheet_directory_uri().'/js/innerfade_call.js', array('jquery'), '1', true );
					break;
					case 'Slider_effect':
						wp_enqueue_script( 'nws_slider',get_stylesheet_directory_uri().'/js/nws_slider.js', array('jquery'), '1', true );
						wp_enqueue_script('nws_slider_call',get_stylesheet_directory_uri().'/js/nws_slider_call.js', array('jquery'), '1', true );
					break;
					case 'cycle_effect':
						wp_enqueue_script( 'jquery.cycle.all.min',get_stylesheet_directory_uri().'/js/jquery.cycle.all.min.js', array('jquery'), '2.50', true );
						wp_enqueue_script('cycle_call',get_stylesheet_directory_uri().'/js/cycle_call.js', array('jquery'), '1', true );
					break;
				}
			}
			
			//load only on product single page
			if (is_single()) {
				$WPS_prodImg_effect	= $OPTION['wps_prodImg_effect'];
				// are we using a Blog?
				$blog_Name 	= $OPTION['wps_blogCat'];
				
				if ($blog_Name != 'Select a Category') {
					
					$blog_ID 	= get_cat_ID( $blog_Name );
					// who's our ancestor, blog or shop?
					if (!(cat_is_ancestor_of( $blog_ID, (int)$category[0]->term_id )) || ($category[0]->term_id != $blog_ID)) {
						
						// do we want flowplayer?
						if($OPTION['wps_flowplayer_enable']) {
							wp_enqueue_script( 'flowplayer',get_stylesheet_directory_uri().'/js/flowplayer-3.1.4.min.js', '3.1.4', true );
						}
						
						switch($WPS_prodImg_effect){
							case 'mz_effect': 
								wp_enqueue_script( 'magiczoom',get_stylesheet_directory_uri().'/js/magiczoom.js', '1', true );
							break;
							
							case 'mzp_effect':
								wp_enqueue_style('magiczoomplus',get_stylesheet_directory_uri().'/js/magiczoomplus/magiczoomplus.css', false, '1.7.3', 'screen');
								wp_enqueue_script( 'magiczoomplus',get_stylesheet_directory_uri().'/js/magiczoomplus.js', '1.7.3', true );
							break;
										
							case 'jqzoom_effect':
								wp_enqueue_style('jqzoom',get_stylesheet_directory_uri().'/css/jqzoom.css', false, '1.0', 'screen');
								wp_enqueue_script('jqzoom.pack.1.0.1',get_stylesheet_directory_uri().'/js/jqzoom.pack.1.0.1.js', array('jquery'), '1.0.1', true );
								wp_enqueue_script('jqzoom_call',get_stylesheet_directory_uri().'/js/jqzoom_call.js', array('jquery'), '1', true );
							break;
							
							case 'lightbox':
								wp_enqueue_style('jquery.fancybox',get_stylesheet_directory_uri().'/js/jquery.fancybox/jquery.fancybox.css', false, '1.0', 'screen');
								wp_enqueue_script('jquery.fancybox-1.2.1.pack',get_stylesheet_directory_uri().'/js/jquery.fancybox/jquery.fancybox-1.2.1.pack.js', array('jquery'), '1.2.1', true );
								wp_enqueue_script('fancybox_call',get_stylesheet_directory_uri().'/js/fancybox_call.js', array('jquery'), '1', true );
							break;
										
							case 'no_effect':
							break;
						}
					} else {
						
					}
					
				} else {
				
					// do we want flowplayer?
					if($OPTION['wps_flowplayer_enable']) {
						wp_enqueue_script( 'flowplayer',get_stylesheet_directory_uri().'/js/flowplayer-3.1.4.min.js', '3.1.4', true );
					}
					
					switch($WPS_prodImg_effect){
						case 'mz_effect': 
							wp_enqueue_script( 'magiczoom',get_stylesheet_directory_uri().'/js/magiczoom.js', '1', true );
						break;
						
						case 'mzp_effect':
							wp_enqueue_style('magiczoomplus',get_stylesheet_directory_uri().'/js/magiczoomplus/magiczoomplus.css', false, '1.7.3', 'screen');
							wp_enqueue_script( 'magiczoomplus',get_stylesheet_directory_uri().'/js/magiczoomplus.js', '1.7.3', true );
						break;
									
						case 'jqzoom_effect':
							wp_enqueue_style('jqzoom',get_stylesheet_directory_uri().'/css/jqzoom.css', false, '1.0', 'screen');
							wp_enqueue_script('jqzoom.pack.1.0.1',get_stylesheet_directory_uri().'/js/jqzoom.pack.1.0.1.js', array('jquery'), '1.0.1', true );
							wp_enqueue_script('jqzoom_call',get_stylesheet_directory_uri().'/js/jqzoom_call.js', array('jquery'), '1', true );
						break;
						
						case 'lightbox':
							wp_enqueue_style('jquery.fancybox',get_stylesheet_directory_uri().'/js/jquery.fancybox/jquery.fancybox.css', false, '1.0', 'screen');
							wp_enqueue_script('jquery.fancybox-1.2.1.pack',get_stylesheet_directory_uri().'/js/jquery.fancybox/jquery.fancybox-1.2.1.pack.js', array('jquery'), '1.2.1', true );
							wp_enqueue_script('fancybox_call',get_stylesheet_directory_uri().'/js/fancybox_call.js', array('jquery'), '1', true );
						break;
									
						case 'no_effect':
						break;
					}
				}
			}
			
			wp_enqueue_script( 'myjquery', get_stylesheet_directory_uri().'/js/myjquery.js', array('jquery'), '1', true );
			 
		}
	}
}

function childtheme_head() {
	
	if (!is_admin()){
		
	
		if(($_SERVER['HTTPS'] == 'on')||($_SERVER['HTTPS'] == '1') || ($_SERVER['SSL'] == '1')){
			$NWS_template_directory_alt = explode("https://", get_bloginfo('template_directory'));
		} else {
			$NWS_template_directory_alt = explode('http://', get_bloginfo('template_directory'));
		}
		?>
		<script>
			var NWS_template_directory 		= '<?php bloginfo('template_directory'); ?>';
			var NWS_template_directory_alt 	= '<?php echo $NWS_template_directory_alt[1]; ?>';
		</script>
		
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
		
		<!--[if IE]> 
			<link rel="stylesheet" media="all" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/main_ie.css" /> 
		<![endif]-->
		
		<!--[if lte IE 6]> 
			<link rel="stylesheet" media="all" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/main_lte_ie6.css" /> 
		<![endif]-->
	<?php }
}

##################################################################################################################################
// 	                                              FOOTER STUFF
##################################################################################################################################

add_action('wp_footer', 'NWS_footer');

function NWS_footer() {
	global $OPTION;
	// for the cufon font replacement
	$content = '<script type="text/javascript"> Cufon.now(); </script>';
	echo $content;
	
	//google analytics
	if(($OPTION['wps_google_analytics']) == 'active'){
		echo google_analytics($OPTION['wps_google_analytics_id']);
	}
	
	/**
	*
	// DO NOT TOUCH ANY OF THESE- OR ELSE....
	*
	**/
	dinfo_footer($OPTION['wps_support_id']);
	$_SESSION['go2page'] = get_real_base_url();
	if(ini_get('register_globals') === '1'){
		echo "<p class='error'>".__('Security warning: set the value *register_globals* in the php ini to *Off* !!','wpShop'); 
		echo " ";
		echo __('Contact your Host if you do not know where this is done!','wpShop');
		echo "</p>";
	}
	#echo "<pre>"; print_r($_SESSION); echo "</pre>";
	#echo "<pre>"; print_r($_POST); echo "</pre>";
	#echo "<pre>"; print_r($_SERVER); echo "</pre>";
	#echo "<pre>"; print_r($OPTION); echo "</pre>";
	#echo "<pre>"; print_r(session_get_cookie_params()); echo "</pre>";
}