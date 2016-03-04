<script language="javascript">
	function sorting( o )
	{
		if(o.value){
		window.location=o.value;
		}
	}
</script>
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

		$brands = mysql_query("SELECT t.slug,t.name
		FROM wp_terms AS t, wp_term_taxonomy AS tt
		WHERE tt.taxonomy = 'brand'
		AND t.term_id = tt.term_id");
	$select = "<select name='sltBrand' style='width:150px; margin:10px 10px 0;' onchange='sorting(this)' >
		<option value=''>Select Brand</option>
	";
	while($aa = mysql_fetch_array($brands)){
		$select .= "<option value='?brand=".$aa['slug']."'>".$aa['name']."</option>";	
	}
	$select .= "</select>";



		$the_div_class 	= 'sidebar frontPage_sidebar noprint '. $the_float_class; ?>
<!--Home Page Left Panle-->
<div class="<?php echo $the_div_class;?>">
  <!--CUSTOMIZED AREA-->
  <div style="margin-top:0px;">
    <!-- Green belt-->
    <div style="height:185px; background-color:#D9F3FF;">
<?php if ( is_sidebar_active('archive_widget_area') ) : dynamic_sidebar('archive_widget_area'); endif; ?>      
<!--
      <div id="seprateBox">
        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="?page_id=2">About Us</a></li>
          <li><a href="?page_id=839">Locations</a></li>
        </ul>
      </div>
-->        
    </div>
  </div>
  <!--CUSTOMIZED AREA-->
  <div id="blue-bg" >
  	<ul>
			<li><a href="<?php bloginfo('url'); ?>/spas">Hot Tubs</a></li>
			<li><a href="<?php bloginfo('url'); ?>/spas/swim-spas">Swim Spas</a></li>
			<li><a href="<?php bloginfo('url'); ?>/inground-swimming-pools">Inground Pools</a></li>
			<li><a href="<?php bloginfo('url'); ?>/above-ground-swimming-pools">Above Ground Pools</a></li>
    </ul>
  </div>
  <div id="blue-bg" >
    <div class="widget shop_by_widget widget-shop-by-brand">
      <h3 class="widget-title" style="padding:5px;">Brands</h3>
      <?php echo $select; ?> </div>
    <!-- End customized Area -->
  </div>
  
  <div style="clear:both"></div>
  <div class="padding">
    <div id="blue-bg">
      <?php if ( is_sidebar_active('frontpage_widget_area') ) : dynamic_sidebar('frontpage_widget_area'); endif; ?>
    </div>
    <!--CUSTOMIZED AREA-->
    <div style="width:174px; height:8px; float:left;margin-top:-7px;" id="seprateBoxBlue" ><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
    <a href="http://spapoolbilliards.com/brands/bullfrog-jetpacks" style="border:0px; outline:none;">
<img src="http://spapoolbilliards.com/wp-content/uploads/JetPakButton.png" style="float:left;">
</a>
    <!-- END CUSTOMIZED AREA-->
  </div>
  <!-- padding -->
</div>

<!-- frontPage_sidebar -->
<?php  } 

	

	if ( is_sidebar_active('frontpage_3left_widget_area') || is_sidebar_active('frontpage_2left_widget_area') || is_sidebar_active('frontpage_single_widget_area')) : ?>
<ul class="secondary_content clearfix noprint">
  <?php // 3 columns

			if ( is_sidebar_active('frontpage_3left_widget_area')): 

				if ( is_sidebar_active('frontpage_3left_widget_area') ) : ?>
                  <li class="c_box c_box3 c_box_first">
                    <?php dynamic_sidebar('frontpage_3left_widget_area'); ?>
                  </li>
  <!-- c_box  -->
  <?php endif;

				

				if ( is_sidebar_active('frontpage_3middle_widget_area') ) : ?>
                  <li class="c_box c_box3 c_box_middle">
                    <?php dynamic_sidebar('frontpage_3middle_widget_area'); ?>
                  </li>
  <!-- c_box  -->
  <?php endif;

				

				if ( is_sidebar_active('frontpage_3right_widget_area') ) : ?>
                  <li class="c_box c_box3 c_box_last">
                    <?php dynamic_sidebar('frontpage_3right_widget_area'); ?>
                  </li>
  <!-- c_box  -->
  <?php endif;

endif;

			

			// 1 column

			if (is_sidebar_active('frontpage_single_widget_area')) :  ?>
              <li class="c_box_single">
                <?php dynamic_sidebar('frontpage_single_widget_area'); ?>
              </li>
  <!-- c_box  -->
  <?php endif;

			// 2 columns
			if ( is_sidebar_active('frontpage_2left_widget_area')): 

				if ( is_sidebar_active('frontpage_2left_widget_area') ) : ?>
                  <li class="c_box c_box2 c_box_first">
                    <?php dynamic_sidebar('frontpage_2left_widget_area'); ?>
                  </li>
  <!-- c_box  -->
  <?php endif;

				

				if ( is_sidebar_active('frontpage_2right_widget_area') ) : ?>
                  <li class="c_box c_box2 c_box_last">
                    <?php dynamic_sidebar('frontpage_2right_widget_area'); ?>
                  </li>
  <!-- c_box  -->
  <?php endif;

			endif;?>
	</ul>
<!-- secondary_content -->
<?php endif;

	

// sidebar for pages 	

} elseif (is_page()){

	

	//get current page
	$brands = mysql_query("SELECT t.slug, t.name
		FROM wp_terms AS t, wp_term_taxonomy AS tt
		WHERE tt.taxonomy = 'brand'
		AND t.term_id = tt.term_id");
	$select = "<select name='sltBrand' style='width:150px; margin:10px 10px 0;' onchange='sorting(this)' >
		<option value=''>Select Brand</option>
	";
	while($aa = mysql_fetch_array($brands)){
		$select .= "<option value='../?brand=".$aa['slug']."'>".$aa['name']."</option>";	
	}
	$select .= "</select>";

#$post_obj = $wp_query->get_queried_object();

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

	

	?>
<!--CUSTOMIZED AREA-->
<!--Sub Pages SideBar-->
    <div style="margin-top:0px; width:175px; margin-left:14px;"><!-- Green belt-->
<div style="height:175px; background-color:#D9F3FF;">
<?php if ( is_sidebar_active('archive_widget_area') ) : dynamic_sidebar('archive_widget_area'); endif; ?>   
<!--  <div id="seprateBox">
    <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="?page_id=2">About Us</a></li>
      <li><a href="?page_id=839">Locations</a></li>
    </ul>
  </div>
-->  
</div>
</div>
	<div id="blue-bg" style="margin-left:15px;">
		<ul>
			<li><a href="<?php bloginfo('url'); ?>/spas">Hot Tubs</a></li>
			<li><a href="<?php bloginfo('url'); ?>/spas/swim-spas">Swim Spas</a></li>
			<li><a href="<?php bloginfo('url'); ?>/inground-swimming-pools">Inground Pools</a></li>
			<li><a href="<?php bloginfo('url'); ?>/above-ground-swimming-pools">Above Ground Pools</a></li>
		</ul>
    </div>
<!--CUSTOMIZED AREA-->
<div id="blue-bg" style="margin-left:15px;">
  <div class="widget shop_by_widget widget-shop-by-brand">
    <h3 class="widget-title" style="padding:5px;">Brands</h3>
    <?php echo $select; ?> </div>
</div>
<?

	if ((($OPTION['wps_customerAreaPg']!='Select a Page') && (is_page($customerArea->post_title))) || (($OPTION['wps_customerAreaPg']!='Select a Page') && (is_tree($customerArea->ID)))) { ?>
<div class="sidebar page_sidebar protected_sidebar noprint <?php echo $the_float_class;?>">
  <div class="padding">
    <div id="blue-bg">
      <!--customized line-->
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
        <h3 class="widget-title">
          <?php _e('Account Options &amp; Services','wpShop');?>
        </h3>
        <ul class="<?php echo $the_ul_class;?>">
          <li class="edit_login_info"><a href='?myaccount=1&action=1'>
            <?php _e('Edit Login Info','wpShop');?>
            </a></li>
          <li class="my_information"><a href='?myaccount=1&action=2'>
            <?php _e('My information','wpShop');?>
            </a></li>
          <li class="my_wishlist"><a href='?myaccount=1&action=3'>
            <?php _e('My wishlist','wpShop');?>
            </a></li>
        </ul>
      </div>
      <!-- widget -->
      <?php if ($children) { ?>
      <div class="widget widget_subpages">
        <h3 class="widget-title">
          <?php _e('Also in this Section:','wpShop');?>
        </h3>
        <ul>
          <?php echo $children; ?>
        </ul>
      </div>
      <!-- widget -->
      <?php } ?>
      <div class="widget widget_trackOrder">
        <h3 class="widget-title">
          <?php  if($OPTION['wps_shop_mode'] == 'Inquiry email mode'){

							_e('Track your Enquiry','wpShop');

						}else{

							_e('Track your Order','wpShop');

						}					

						?>
        </h3>
        <div class="widgetPadding">
          <?php include (TEMPLATEPATH . '/trackingform.php'); ?>
        </div>
        <!-- widgetPadding -->
      </div>
      <!-- widget -->
      <?php dynamic_sidebar('customer_area_widget_area');?>
    </div>
    <!--CUSTOMIZED AREA-->
    <div style="width:174px; height:8px; float:left;margin-top:-7px;" id="seprateBoxBlue"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
    <!-- END CUSTOMIZED AREA-->
  </div>
  <!-- padding -->
</div>
<!-- page_sidebar -->
<?php } else {

	

		if ( is_sidebar_active('about_page_widget_area') || is_sidebar_active('contact_page_widget_area') || is_sidebar_active('search_widget_area') || is_sidebar_active('sub_customer_service_widget_area') || is_sidebar_active('page_widget_area') ||($children)){ ?>
        <div style="clear:both"></div>
<div class="sidebar page_sidebar noprint <?php echo $the_float_class;?>">
  <div class="padding">
    <div id="blue-bg">
      <!--Customized-->
      <?php if ($children) { ?>
      <!--CUSTOMIZED AREA-->
      
      <div class="widget widget_subpages">
        <h3 class="widget-title">
          <?php _e('In this section:','wpShop');?>
        </h3>
        <ul>
          <?php echo $children; ?>
        </ul>
      </div>
      <!-- widget -->
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
    <div style="width:174px; height:8px; float:left;margin-top:-7px;" id="seprateBoxBlue"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
    <!-- END CUSTOMIZED AREA-->
  </div>
  <!-- padding -->
</div>
<!-- page_sidebar -->
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
  </div>
  <!-- padding -->
</div>
<!-- sidebar -->
<?php }

	

//when in a shop category when using a blog please see includes/blog/blog-category-sidebar.php

} elseif (is_category()) {
	//==========Fill Brands In dropdown list
	$brands = mysql_query("SELECT t.slug, t.name
		FROM wp_terms AS t, wp_term_taxonomy AS tt
		WHERE tt.taxonomy = 'brand'
		AND t.term_id = tt.term_id");
	$select = "<select name='sltBrand' style='width:150px; margin:10px 10px 0;' onchange='sorting(this)' >
		<option value=''>Select Brand</option>
	";
	while($aa = mysql_fetch_array($brands)){
		$select .= "<option value='../?brand=".$aa['slug']."'>".$aa['name']."</option>";	
	}
	$select .= "</select>";

	$the_div_class 	= 'sidebar category_sidebar noprint '. $the_float_class; ?>
<div class="<?php echo $the_div_class;?>">
  <!--CUSTOMIZED AREA-->
  <div style="margin-top:0px;">
    <!-- Green belt-->
    <div style="height:185px; background-color:#D9F3FF;">
   
<?php if ( is_sidebar_active('single_widget_area') ) : dynamic_sidebar('single_widget_area'); endif; ?>     

      <!--<div id="seprateBox">
        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="?page_id=2">About Us</a></li>
          <li><a href="?page_id=839">Locations</a></li>
        </ul>
      </div>-->
      
    </div>
  </div>
  <!--CUSTOMIZED AREA-->
  	<div id="blue-bg">
		<ul>
			<li><a href="<?php bloginfo('url'); ?>/spas">Hot Tubs</a></li>
			<li><a href="<?php bloginfo('url'); ?>/spas/swim-spas">Swim Spas</a></li>
			<li><a href="<?php bloginfo('url'); ?>/inground-swimming-pools">Inground Pools</a></li>
			<li><a href="<?php bloginfo('url'); ?>/above-ground-swimming-pools">Above Ground Pools</a></li>
		</ul>
    </div>
  <!--Customized Area -->
  <div id="blue-bg" >
    <div class="widget shop_by_widget widget-shop-by-brand">
      <h3 class="widget-title" style="padding:5px;">Brands</h3>
      <?php echo $select; ?> </div>
    <!-- End customized Area -->
    <div class="padding">
    
      <!-- customized Area-->
      <?php 

			// widgets are added here

			if (is_sidebar_active('category_widget_area') ) : dynamic_sidebar('category_widget_area'); endif;

			?>
    </div>
    <!--CUSTOMIZED AREA-->
    <div style="width:174px; height:8px; float:left;margin-top:-7px;" id="seprateBoxBlue">
    <img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8"  /></div>
    <!-- END CUSTOMIZED AREA-->
  </div>
  <!-- padding -->
</div>
<!-- category_sidebar -->
<?php 

// sidebar for Post Tag Pages

} elseif (is_tag()) { 

	$brands = mysql_query("SELECT t.slug, t.name
		FROM wp_terms AS t, wp_term_taxonomy AS tt
		WHERE tt.taxonomy = 'brand'
		AND t.term_id = tt.term_id");
	$select = "<select name='sltBrand' style='width:150px; margin:10px 10px 0;' onchange='sorting(this)' >
		<option value=''>Select Brand</option>
	";
	while($aa = mysql_fetch_array($brands)){
		$select .= "<option value='?brand=".$aa['slug']."'>".$aa['name']."</option>";	
	}
	$select .= "</select>";

	$the_div_class 	= 'sidebar tag_sidebar noprint '. $the_float_class; ?>
<div class="<?php echo $the_div_class;?>">
  <!--CUSTOMIZED AREA-->
  
  <div style="margin-top:0px;">
    <!-- Green belt-->
    <div style="height:185px; background-color:#D9F3FF;">
<?php if ( is_sidebar_active('archive_widget_area') ) : dynamic_sidebar('archive_widget_area'); endif; ?>  
    <!--  <div id="seprateBox">
        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="?page_id=2">About Us</a></li>
          <li><a href="?page_id=839">Locations</a></li>
        </ul>
      </div>-->
    </div>
  </div>
  <!--CUSTOMIZED AREA-->
  	<div id="blue-bg">
		<ul>
			<li><a href="<?php bloginfo('url'); ?>/spas">Hot Tubs</a></li>
			<li><a href="<?php bloginfo('url'); ?>/spas/swim-spas">Swim Spas</a></li>
			<li><a href="<?php bloginfo('url'); ?>/inground-swimming-pools">Inground Pools</a></li>
			<li><a href="<?php bloginfo('url'); ?>/above-ground-swimming-pools">Above Ground Pools</a></li>
		</ul>
    </div>
  <!--Customized Area -->
  <div id="blue-bg" >
    <div class="widget shop_by_widget widget-shop-by-brand">
      <h3 class="widget-title" style="padding:5px;">Brands</h3>
      <?php echo $select; ?> </div>
    <!-- End customized Area -->
    <div class="padding">
      <!-- Customized line-->
      <?php if($OPTION['wps_blogTags_option']) {

				if ( is_sidebar_active('blog_category_widget_area') ) : dynamic_sidebar('blog_category_widget_area'); endif;

			} else { 

				if ( is_sidebar_active('tag_widget_area') ) : dynamic_sidebar('tag_widget_area'); endif;

			} ?>
    </div>
    <!--CUSTOMIZED AREA-->
    <div style="width:174px; height:8px; float:left;margin-top:-7px;" id="seprateBoxBlue"><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
    <!-- END CUSTOMIZED AREA-->
  </div>
  <!-- padding -->
</div>
<!-- tag_sidebar -->
<?php 

// sidebar for Custom Taxonomy Pages

} elseif (is_taxonomy($customTax)) { 

		$brands = mysql_query("SELECT t.slug, t.name
		FROM wp_terms AS t, wp_term_taxonomy AS tt
		WHERE tt.taxonomy = 'brand'
		AND t.term_id = tt.term_id");
	$select = "<select name='sltBrand' style='width:150px; margin:10px 10px 0;' onchange='sorting(this)' >
		<option value=''>Select Brand</option>
	";
	while($aa = mysql_fetch_array($brands)){
		$select .= "<option value='?brand=".$aa['slug']."'>".$aa['name']."</option>";	
	}
	$select .= "</select>";



	$the_div_class 	= 'sidebar tag_sidebar noprint '. $the_float_class; ?>
<div class="<?php echo $the_div_class;?>">
  <!--CUSTOMIZED AREA-->
  <div style="margin-top:0px;">
    <!-- Green belt-->
    <div style="height:185px; background-color:#D9F3FF;">
<?php if ( is_sidebar_active('archive_widget_area') ) : dynamic_sidebar('archive_widget_area'); endif; ?>      
<!--
      <div id="seprateBox">
        <h3 class="widget-title">Backyard Leisure Spas, Pools, and Billiards</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="?page_id=2">About Us</a></li>
          <li><a href="?page_id=839">Locations</a></li>
        </ul>
      </div>
-->        
    </div>
  </div>
  <div id="blue-bg">
		<ul>
			<li><a href="<?php bloginfo('url'); ?>/spas">Hot Tubs</a></li>
			<li><a href="<?php bloginfo('url'); ?>/spas/swim-spas">Swim Spas</a></li>
			<li><a href="<?php bloginfo('url'); ?>/inground-swimming-pools">Inground Pools</a></li>
			<li><a href="<?php bloginfo('url'); ?>/above-ground-swimming-pools">Above Ground Pools</a></li>
		</ul>
    </div>
  <!--CUSTOMIZED AREA-->
  <div id="blue-bg" >
    <div class="widget shop_by_widget widget-shop-by-brand">
      <h3 class="widget-title" style="padding:5px;">Brands</h3>
      <?php echo $select; ?> </div>
    <!-- End customized Area -->
  </div>
  <div style="clear:both"></div>
  <div class="padding">
    <div id="blue-bg">
      <?php if ( is_sidebar_active('frontpage_widget_area') ) : dynamic_sidebar('frontpage_widget_area'); endif; ?>
    </div>
    <!--CUSTOMIZED AREA-->
    <div style="width:174px; height:8px; float:left;margin-top:-7px;" id="seprateBoxBlue" ><img src="http://localhost/wordpress/wp-content/themes/TheFurnitureStoreLight/images/side-blue-bottom.jpg" width="174" height="8" /></div>
    <!-- END CUSTOMIZED AREA-->
  </div>
  <!-- padding -->
</div>
<!-- tag_sidebar -->
<?php } ?>