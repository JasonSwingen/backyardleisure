<?php
switch($featuredCont){
	case 'main_cats':
	
		//get the order by for main categories
		$orderBy 	= $OPTION['wps_mainCat_orderbyOption'];
		$order 		= $OPTION['wps_mainCat_orderOption'];
		// are we using a Blog?
		$blog_Name 	= $OPTION['wps_blogCat'];
		if ($blog_Name != 'Select a Category') {
			$blog_ID 	= get_cat_ID( $blog_Name );
			//collect the main categories & exclude the Blog
			$mainCategories = get_terms('category', 'orderby='.$orderBy.'&order='.$order.'&parent=0&hide_empty=0&exclude='.$blog_ID);
		} else {
		//collect the main categories
		$mainCategories = get_terms('category', 'orderby='.$orderBy.'&order='.$order.'&parent=0&hide_empty=0');
		}
		foreach ($mainCategories as $mainCategory) {
			$featuredArgs = array(
				'cat'		=> '$mainCategory->term_id;',
				'showposts'	=> 1,
				'caller_get_posts' => 1
			);
			
			switch($featuredEffect){
				case 'innerfade_effect':
					$text 			= NULL;
				break;
				case 'Slider_effect':
					$captionPosition    = $OPTION['wps_caption_position'];
					$text 				= "<div class='{$captionPosition}'>".$mainCategory->description."</div>";
				break;
				case 'cycle_effect':
					$text 			= NULL;
				break;
			}
			
			//form the main category query
			/*
			$featuredQuery = new WP_Query($featuredArgs);
			if ($featuredQuery->have_posts()) : while ($featuredQuery->have_posts()) : $featuredQuery->the_post();?>
			
				<li>
					<!--<a href="<?php echo get_category_link($mainCategory->term_id);?>">-->
						<img src="<?php echo $OPTION['siteurl' ];?>/<?php echo $OPTION['upload_path'];?>/<?php echo $mainCategory->slug; ?>.<?php echo $OPTION['wps_catimg_file_type']; ?>" alt="<?php echo $mainCategory->name; ?>" />
					<!--</a>-->
					<?php if ($text!=NULL) {echo $text;} ?>
				</li>
				
			<?php endwhile; endif; 
			*/
			$featuredQuery = new WP_Query('category_name=Slider&order=ASC');
			if ($featuredQuery->have_posts()) : while ($featuredQuery->have_posts()) : $featuredQuery->the_post();?>
				<li>
				   <?php echo the_post_thumbnail('large'); ?>
					<?php if ($text!=NULL) {echo $text;} ?>
				</li>

				
			<?php endwhile; endif; 

		} 
		
	break;
	case 'sticky_posts':
		// collect sticky posts
		$sticky 	= get_option('sticky_posts');//$OPTION['sticky_posts'];
	
		$img_size 	= $OPTION['wps_featured_img_size'];
		$featuredArgs	= array(
			'post__in'  => $sticky,
			'caller_get_posts'	=> 1,
		);
		
		$featuredQuery = new WP_Query($featuredArgs);
			if ($featuredQuery->have_posts()) : while ($featuredQuery->have_posts()) : $featuredQuery->the_post();

				//get prod featured image 
				if(strlen(get_custom_field('featured_img', FALSE))>0) {
					$img_src 	= get_post_meta($post->ID, "featured_img", TRUE);								
					$des_src 	= $OPTION['upload_path'].'/cache';							
					$img_file 	= mkthumb($img_src,$des_src,$img_size,'width');    
					$imgURL 	= get_option('siteurl').'/'.$des_src.'/'.$img_file;	
				}
				
				switch($featuredEffect){
					case 'innerfade_effect':
						$text 			= NULL;
					break;
					case 'Slider_effect':
						$captionPosition    = $OPTION['wps_caption_position'];
						$text 				= "<div class='{$captionPosition}'>".get_the_title()."</div>";
					break;
					case 'cycle_effect':
						$text 			= NULL;
					break;
				} ?>
			
				<li>
					<?php if ($imgURL!='') { ?>
						<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'wpShop'), the_title_attribute('echo=0') ); ?>">
							<img src="<?php echo $imgURL;?>" alt="<?php the_title_attribute(); ?>" />
						</a>
						<?php if ($text!=NULL) {echo $text;} 
					
					} else { ?>
						<p class="error">
							<?php _e('Oops! No Image was found for this Sticky Product. Please upload one and enter it\'s full path in the value field of the custom field "featured_img".','wpShop'); ?><br/>
						</p>
					<?php } ?>
				</li>
				
			<?php endwhile; endif; 
			
	break;
	case 'cats':
		//get the order by for main categories
		$orderBy 	= $OPTION['wps_myFeaturedCats_orderbyOption'];
		$order 		= $OPTION['wps_myFeaturedCats_orderOption'];
		//which ones?
		$include    = $OPTION['wps_myFeaturedCats_include'];
		//collect them
		$myFeaturedCats = get_categories('orderby='.$orderBy.'&order='.$order.'&include='.$include.'&hide_empty=0');
		foreach ($myFeaturedCats as $myFeaturedCat) {
		
			$myFeaturedCatID = $myFeaturedCat->term_id;
			$featuredArgs = array(
				'cat'				=> $myFeaturedCatID,
				'showposts'			=> 1,
				'caller_get_posts' 	=> 1
			);
			
			switch($featuredEffect){
				case 'innerfade_effect':
					$text 			= NULL;
				break;
				case 'Slider_effect':
					$captionPosition    = $OPTION['wps_caption_position'];
					$text 				= "<div class='{$captionPosition}'>".$myFeaturedCat->description."</div>";
				break;
				case 'cycle_effect':
					$text 			= NULL;
				break;
			}
			
			//form the main category query
			
			//$featuredQuery = new WP_Query($featuredArgs);
			//if ($featuredQuery->have_posts()) : while ($featuredQuery->have_posts()) : $featuredQuery->the_post();
		
			
			?>
			
				<li>
					<a href="<?php echo get_category_link($myFeaturedCat->term_id);?>">
						<img src="<?php echo get_option('siteurl');?>/<?php echo $OPTION['upload_path'];?>/<?php echo $myFeaturedCat->slug; ?>.<?php echo $OPTION['wps_catimg_file_type']; ?>" alt="<?php echo $myFeaturedCat->name; ?>" />
					</a>
					<?php if ($text!=NULL) {echo $text;} ?>
				</li>
				
			<?php //endwhile; endif; 
		} 
	break;
	
	case 'custom_img': ?>
	
		<li>
		<?php if ($OPTION['wps_custom_img_link_enable']) { ?>
			<a href="<?php echo $OPTION['wps_custom_img_link'];?>">
		<?php } ?>
				<img src="<?php echo $OPTION['wps_custom_img_path'];?>.<?php echo $OPTION['wps_catimg_file_type']; ?>" alt="" />
		<?php if ($OPTION['wps_custom_img_link_enable']) { ?>
			</a>
		<?php } ?>
		</li>
		
		<?php
	break;
} ?>