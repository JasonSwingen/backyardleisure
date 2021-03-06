<?php

$myAccount		= get_page_by_title($OPTION['wps_pgNavi_myAccountOption']);

$custServ		= get_page_by_title($OPTION['wps_customerServicePg']);

$about			= get_page_by_title($OPTION['wps_aboutPg']);

$contact		= get_page_by_title($OPTION['wps_contactPg']);

$search			= get_page_by_title($OPTION['wps_pgNavi_searchOption']);

$accountReg		= get_page_by_title($OPTION['wps_pgNavi_regOption']);

$accountLog		= get_page_by_title($OPTION['wps_pgNavi_logOption']);

$customerArea	= get_page_by_title($OPTION['wps_customerAreaPg']);



$customTax 			= $term->taxonomy;



$WPS_tagimgs		= $OPTION['wps_tagimg_file_type'];





switch($OPTION['wps_sidebar_option']){

	case 'alignRight':

		$the_float_class 	= 'alignright';

	break;

	case 'alignLeft':

		$the_float_class 	= 'alignleft';

	break;

}



//front page

if (is_home()) { 



	if ($OPTION['wps_front_sidebar_disable'] != TRUE) {





		$the_div_class 	= 'sidebar frontPage_sidebar noprint '. $the_float_class; ?>



		<div class="<?php echo $the_div_class;?>">

            

            <div style="clear:both"></div>

            <div class="padding">

            	<div id="blue-bg">

				  <?php if ( is_sidebar_active('frontpage_widget_area') ) : dynamic_sidebar('frontpage_widget_area'); endif; ?>

                </div>
                <!--CUSTOMIZED AREA-->
                <div style="width:175px; height:8px; float:left;margin-top:-6px;"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
				<!-- END CUSTOMIZED AREA-->
			</div><!-- padding -->
            
				<!--CUSTOMIZED AREA-->							
                <div style="margin-top:20px;"><!-- Green belt-->
                 <div id="seprateBox">
        
                        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        
                        <ul>
							<li><a href="index.php">Home</a></li>
                            <li><a href="?page_id=2">About Us</a></li>
                            <li><a href="?page_id=839">Locations</a></li>	        
                        </ul>
        
                    </div>
                </div><!--CUSTOMIZED AREA-->
            
        
		</div><!-- frontPage_sidebar -->

        

	<?php  } 

	

	if ( is_sidebar_active('frontpage_3left_widget_area') || is_sidebar_active('frontpage_2left_widget_area') || is_sidebar_active('frontpage_single_widget_area')) : ?>

		

		<ul class="secondary_content clearfix noprint">

			

			<?php // 3 columns

			if ( is_sidebar_active('frontpage_3left_widget_area')): 

				if ( is_sidebar_active('frontpage_3left_widget_area') ) : ?>

					<li class="c_box c_box3 c_box_first">

						<?php dynamic_sidebar('frontpage_3left_widget_area'); ?>

					</li><!-- c_box  -->

				<?php endif;

				

				if ( is_sidebar_active('frontpage_3middle_widget_area') ) : ?>

					<li class="c_box c_box3 c_box_middle">

						<?php dynamic_sidebar('frontpage_3middle_widget_area'); ?>

					</li><!-- c_box  -->

				<?php endif;

				

				if ( is_sidebar_active('frontpage_3right_widget_area') ) : ?>

					<li class="c_box c_box3 c_box_last">

						<?php dynamic_sidebar('frontpage_3right_widget_area'); ?>

					</li><!-- c_box  -->

				<?php endif;

			endif;

			

			// 1 column

			if (is_sidebar_active('frontpage_single_widget_area')) :  ?>	

				<li class="c_box_single">

					<?php dynamic_sidebar('frontpage_single_widget_area'); ?>

				</li><!-- c_box  -->

			<?php endif;

		

			

			// 2 columns

			

			if ( is_sidebar_active('frontpage_2left_widget_area')): 

				if ( is_sidebar_active('frontpage_2left_widget_area') ) : ?>

					<li class="c_box c_box2 c_box_first">

						<?php dynamic_sidebar('frontpage_2left_widget_area'); ?>

					</li><!-- c_box  -->

				<?php endif;

				

				if ( is_sidebar_active('frontpage_2right_widget_area') ) : ?>

					<li class="c_box c_box2 c_box_last">

						<?php dynamic_sidebar('frontpage_2right_widget_area'); ?>

					</li><!-- c_box  -->

				<?php endif;

			endif;?>

			

		</ul><!-- secondary_content -->

			

	<?php endif;

	

// sidebar for pages 	

} elseif (is_page()){

	

	//get current page

	$post_obj = $wp_query->get_queried_object();

	$depth = count($post->ancestors) + 1;

	

	// display subpages if any

	if($post->post_parent) {

		//for 2nd level pages

		if ($depth == 2) {

			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&depth=".$depth);

		//for 3rd level pages

		} else {

			$children = wp_list_pages("title_li=&child_of=".$post->ancestors[1]."&echo=0&depth=".$depth);

		}		

	} else {

		if ($OPTION['wps_customerServicePg']!='Select a Page' && is_page($custServ->post_title)) {

			if ($post->post_parent==0) {

				$children = '';

			} else {

				$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

			}

		} else {

			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&depth=".$depth);

		}

	}

	

	

	if ((($OPTION['wps_customerAreaPg']!='Select a Page') && (is_page($customerArea->post_title))) || (($OPTION['wps_customerAreaPg']!='Select a Page') && (is_tree($customerArea->ID)))) { ?>

		<div class="sidebar page_sidebar protected_sidebar noprint <?php echo $the_float_class;?>">

			<div class="padding">
            	<div id="blue-bg"><!--customized line-->

				<?php					

				switch($_GET[action]){

					case 1:

						$the_ul_class = 'edit_login_info_list';

					break;



					case 2: 

						$the_ul_class = 'my_information_list';

					break;



					case 3: 

						$the_ul_class = 'my_wishlist_list';

					break;



					case 4:

						$the_ul_class = '';

					break;



					case 5:

						$the_ul_class = '';

					break;

					

					default:

						$the_ul_class = 'account_dashboard_list';

					break;

				} ?>

			

				<div class="widget widget_subpages">

					<h3 class="widget-title"><?php _e('Account Options &amp; Services','wpShop');?></h3>

					

					<ul class="<?php echo $the_ul_class;?>">

						<li class="edit_login_info"><a href='?myaccount=1&action=1'><?php _e('Edit Login Info','wpShop');?></a></li>

						<li class="my_information"><a href='?myaccount=1&action=2'><?php _e('My information','wpShop');?></a></li>

						<li class="my_wishlist"><a href='?myaccount=1&action=3'><?php _e('My wishlist','wpShop');?></a></li>

					</ul>

					

				</div><!-- widget -->

				

				<?php if ($children) { ?>

					<div class="widget widget_subpages">

						<h3 class="widget-title"><?php _e('Also in this Section:','wpShop');?></h3>

						<ul><?php echo $children; ?></ul>

					</div><!-- widget -->

				

				<?php } ?>

				

				<div class="widget widget_trackOrder">

					<h3 class="widget-title">

						<?php  if($OPTION['wps_shop_mode'] == 'Inquiry email mode'){

							_e('Track your Enquiry','wpShop');

						}else{

							_e('Track your Order','wpShop');

						}					

						?></h3>

					<div class="widgetPadding">

						<?php include (TEMPLATEPATH . '/trackingform.php'); ?>

					</div><!-- widgetPadding -->

				</div><!-- widget -->

				

				<?php dynamic_sidebar('customer_area_widget_area');?>

			 </div>
             <!--CUSTOMIZED AREA-->
                <div style="width:175px; height:8px; float:left;margin-top:-6px;"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
				<!-- END CUSTOMIZED AREA-->
			</div><!-- padding -->
            
				<!--CUSTOMIZED AREA-->							
                <div style="margin-top:20px;"><!-- Green belt-->
                 <div id="seprateBox">
        
                        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        
                        <ul>
							<li><a href="index.php">Home</a></li>
                            <li><a href="?page_id=2">About Us</a></li>
                            <li><a href="?page_id=839">Locations</a></li>	        
                        </ul>
        
                    </div>
                </div><!--CUSTOMIZED AREA-->

		</div><!-- page_sidebar -->	

	

	

	<?php } else {

	

		if ( is_sidebar_active('about_page_widget_area') || is_sidebar_active('contact_page_widget_area') || is_sidebar_active('search_widget_area') || is_sidebar_active('sub_customer_service_widget_area') || is_sidebar_active('page_widget_area') ||($children)){ ?>

			<div class="sidebar page_sidebar noprint <?php echo $the_float_class;?>">

				<div class="padding">
					<div id="blue-bg"><!--Customized-->
					<?php if ($children) { ?>

						<div class="widget widget_subpages">

							<h3 class="widget-title"><?php _e('In this section:','wpShop');?></h3>

							<ul><?php echo $children; ?></ul>

						</div><!-- widget -->

					

					<?php }

					//about

					if ($OPTION['wps_aboutPg']!='Select a Page' && (is_page($about->post_title)|| is_tree($about->ID))) { if ( is_sidebar_active('about_page_widget_area') ) : dynamic_sidebar('about_page_widget_area'); endif; } 

					//contact

					elseif ($OPTION['wps_contactPg']!='Select a Page' && (is_page($contact->post_title)|| is_tree($contact->ID))) { if ( is_sidebar_active('contact_page_widget_area') ) : dynamic_sidebar('contact_page_widget_area'); endif;}

					//search

					elseif ($OPTION['wps_pgNavi_searchOption']!='Select a Page' && (is_page($search->post_title)|| is_tree($search->ID))) { if ( is_sidebar_active('search_widget_area') ) : dynamic_sidebar('search_widget_area'); endif;}

					

					//customer service subpages

					elseif ($OPTION['wps_customerServicePg']!='Select a Page' && is_tree($custServ->ID)) { if ( is_sidebar_active('sub_customer_service_widget_area') ) : dynamic_sidebar('sub_customer_service_widget_area'); endif;}

					

					//all other pages

					else { if ( is_sidebar_active('page_widget_area') ) : dynamic_sidebar('page_widget_area'); endif;} 

					?>

					

				 </div>
                 <!--CUSTOMIZED AREA-->
                <div style="width:175px; height:8px; float:left;margin-top:-6px;"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
				<!-- END CUSTOMIZED AREA-->
			</div><!-- padding -->
            
				<!--CUSTOMIZED AREA-->							
                <div style="margin-top:20px;"><!-- Green belt-->
                 <div id="seprateBox">
        
                        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        
                        <ul>
							<li><a href="index.php">Home</a></li>
                            <li><a href="?page_id=2">About Us</a></li>
                            <li><a href="?page_id=839">Locations</a></li>	        
                        </ul>
        
                    </div>
                </div><!--CUSTOMIZED AREA-->

			</div><!-- page_sidebar -->	



		<?php }

	}

	

// for the search || 404	

} elseif (is_search() || is_404()) {

	if (is_sidebar_active('page404_widget_area') || is_sidebar_active('search_widget_area')){ ?>

	

		<div class="sidebar noprint <?php echo $the_float_class;?>">

			<div class="padding">

				

				<?php 

				if (is_search()) { dynamic_sidebar('search_widget_area'); }

				elseif (is_404()) { dynamic_sidebar('page404_widget_area'); }

				?>

				

			</div><!-- padding -->

		</div><!-- sidebar -->

	<?php }

	

//when in a shop category when using a blog please see includes/blog/blog-category-sidebar.php

} elseif (is_category()) {

	$the_div_class 	= 'sidebar category_sidebar noprint '. $the_float_class; ?>

	

	<div class="<?php echo $the_div_class;?>">

		<div class="padding">
			
            	<div id="blue-bg"><!-- customized Area-->

				  <?php 

			// widgets are added here

			if (is_sidebar_active('category_widget_area') ) : dynamic_sidebar('category_widget_area'); endif;

			?>


                </div>
                <!--CUSTOMIZED AREA-->
                <div style="width:175px; height:8px; float:left;margin-top:-6px;"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
				<!-- END CUSTOMIZED AREA-->
			</div><!-- padding -->
            
				<!--CUSTOMIZED AREA-->							
                <div style="margin-top:20px;"><!-- Green belt-->
                 <div id="seprateBox">
        
                        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        
                        <ul>
							<li><a href="index.php">Home</a></li>
                            <li><a href="?page_id=2">About Us</a></li>
                            <li><a href="?page_id=839">Locations</a></li>	        
                        </ul>
        
                    </div>
                </div><!--CUSTOMIZED AREA-->


	</div><!-- category_sidebar -->

	

<?php 

// sidebar for Post Tag Pages

} elseif (is_tag()) { 

	$the_div_class 	= 'sidebar tag_sidebar noprint '. $the_float_class; ?>

	

	<div class="<?php echo $the_div_class;?>">

		<div class="padding">

		<div id="blue-bg"><!-- Customized line-->

			<?php if($OPTION['wps_blogTags_option']) {

				if ( is_sidebar_active('blog_category_widget_area') ) : dynamic_sidebar('blog_category_widget_area'); endif;

			} else { 

				if ( is_sidebar_active('tag_widget_area') ) : dynamic_sidebar('tag_widget_area'); endif;

			} ?>

		

		 </div>
         		<!--CUSTOMIZED AREA-->
                <div style="width:175px; height:8px; float:left;margin-top:-6px;"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
				<!-- END CUSTOMIZED AREA-->
			</div><!-- padding -->
            
				<!--CUSTOMIZED AREA-->							
                <div style="margin-top:20px;"><!-- Green belt-->
                 <div id="seprateBox">
        
                        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        
                        <ul>
							<li><a href="index.php">Home</a></li>
                            <li><a href="?page_id=2">About Us</a></li>
                            <li><a href="?page_id=839">Locations</a></li>	        
                        </ul>
        
                    </div>
                </div><!--CUSTOMIZED AREA-->


	</div><!-- tag_sidebar -->

	

<?php 

// sidebar for Custom Taxonomy Pages

} elseif (is_taxonomy($customTax)) { 

	$the_div_class 	= 'sidebar tag_sidebar noprint '. $the_float_class; ?>

	

	<div class="<?php echo $the_div_class;?>">

		<div class="padding">
			<div id="blue-bg"><!--Customized -->
			

			<?php if($OPTION['wps_blogTags_option']) {

				if ( is_sidebar_active('tax_widget_area') ) : dynamic_sidebar('tax_widget_area'); endif;

			} else { 

				if ( is_sidebar_active('tag_widget_area') ) : dynamic_sidebar('tag_widget_area'); endif;

			} ?>

			

		 </div><!--CUSTOMIZED AREA-->
                <div style="width:175px; height:8px; float:left;margin-top:-6px;"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
				<!-- END CUSTOMIZED AREA-->
			</div><!-- padding -->
            
				<!--CUSTOMIZED AREA-->							
                <div style="margin-top:20px;"><!-- Green belt-->
                 <div id="seprateBox">
        
                        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        
                        <ul>
							<li><a href="index.php">Home</a></li>
                            <li><a href="?page_id=2">About Us</a></li>
                            <li><a href="?page_id=839">Locations</a></li>	        
                        </ul>
        
                    </div>
                </div><!--CUSTOMIZED AREA-->


	</div><!-- tag_sidebar -->

	

<?php } ?>