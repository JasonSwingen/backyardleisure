<?php get_header();
$WPS_tagCol			= $OPTION['wps_tagCol_option'];
$WPS_sidebar		= $OPTION['wps_sidebar_option'];
$term 				= get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$customTax 			= $term->taxonomy;

switch($WPS_sidebar){
	case 'alignRight':
		$the_float_class 	= 'alignleft';
	break;
	case 'alignLeft':
		$the_float_class 	= 'alignright';
	break;
}

	if($OPTION['wps_teaser_enable_option']) {$the_eqcol_class = 'eqcol'; }
	//which column option?
	switch($WPS_tagCol){
		case 'tagCol1':
			$the_div_class 	= 'theTags clearfix tagCol1 '.$the_float_class.' '.$the_eqcol_class;
			$counter = 1;      
		break;
		
		case 'tagCol2':
			$the_div_class 	= 'theTags clearfix tagCol2 '.$the_float_class.' '.$the_eqcol_class;
			$counter = 2;      
		break;
		
		case 'tagCol3':
			$the_div_class 	= 'theTags clearfix tagCol3 '.$the_float_class.' '.$the_eqcol_class;
			$counter = 3;      
		break;
			
		case 'tagCol4':
			$the_div_class 	= 'theTags clearfix tagCol4 '.$the_float_class.' '.$the_eqcol_class;
			$counter = 4;      
		break;
	} ?>
	<div id="main_col" class="<?php echo $the_float_class;?>">
	
		<div class="featuredTag">
			<?php $imgSrc = $OPTION['siteurl' ].'/'.$OPTION['upload_path'].'/'.$term->slug.'.'.$OPTION['wps_tagimg_file_type']; ?>
			<img src="<?php echo $imgSrc; ?>" alt="<?php echo $term->name; ?>" />
		</div>
        <p style="margin:0px 0px 10px 0px;">
        <?php
			echo $term->description;
        ?>
        </p>
		<?php  if($OPTION['wps_termDescr_enable']) {
			echo term_description();
		} ?>
		<div class="<?php echo $the_div_class;?>">
			<?php 
			//set the counter according to the column selection from the theme options
			$a = 1;
			// allow user to order their Products as the want to
			$orderBy 	= $OPTION['wps_prods_orderbyOption'];
			$order 		= $OPTION['wps_prods_orderOption'];
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				$term->taxonomy 	=>$term->slug,
				'orderby'			=>$orderBy,
				'order'				=>$order,
				'paged'				=>$paged,
				'caller_get_posts' 	=> 1
			);
			$currentTagQuery = new WP_Query($args);
			while ($currentTagQuery->have_posts()) : $currentTagQuery->the_post();
			
				$output = my_attachment_images(0,2);
				/*global $wp_query;
				$postid = $wp_query->post->ID;*/
				$customfieldvalue = get_post_meta($post->ID, "dimension_pools", true);
				$imgNum = count($output);
				
				//set the class and resize the product image according to the column selection from the theme options 
				switch($WPS_tagCol){
					case 'tagCol1':
						$the_class 		= alternating_css_class($counter,1,' c_box_first');
						if($a==1) {$the_row_class='top_row';}else{$the_row_class='';}
						$the_div_class 	= 'c_box c_box1 '. $the_class .' '. $the_row_class;
						$img_size 		= $OPTION['wps_prodCol1_img_size'];
					break;
					
					case 'tagCol2':
						$the_class 		= alternating_css_class($counter,2,' c_box_first');
						if (($a==1) || ($a==2)) {$the_row_class='top_row';}else{$the_row_class='';}
						$the_div_class 	= 'c_box c_box2 '. $the_class .' '. $the_row_class;
						$img_size 		= $OPTION['wps_prodCol2_img_size'];
					break;
					
					case 'tagCol3':
						$the_class 		= alternating_css_class($counter,3,' c_box_first');
						if (($a==1) || ($a==2) || ($a==3)) {$the_row_class='top_row';}else{$the_row_class='';}
						$the_div_class 	= 'c_box c_box3 '. $the_class .' '. $the_row_class;
						$img_size 		= $OPTION['wps_prodCol3_img_size'];
					break;
															
					case 'tagCol4':
						$the_class 		= alternating_css_class($counter,4,' c_box_first');
						if (($a==1) || ($a==2) || ($a==3) || ($a==4)) {$the_row_class='top_row';}else{$the_row_class='';}
						$the_div_class 	= 'c_box c_box4 '. $the_class .' '. $the_row_class;
						$img_size 		= $OPTION['wps_prodCol4_img_size'];
					break;
				} 
				
				if($imgNum != 0){
					$imgURL		= array();
					foreach($output as $v){
					
						$img_src 	= $v;
						
						// do we want the WordPress Generated thumbs?
						if ($OPTION['wps_wp_thumb']) {
							//get the file type
							$img_file_type = strrchr($img_src, '.');
							//get the image name without the file type
							$parts = explode($img_file_type,$img_src);
							// get the thumbnail dimmensions
							$width = get_option('thumbnail_size_w');
							$height = get_option('thumbnail_size_h');
							//put everything together
							$imgURL[] = $parts[0].'-'.$width.'x'.$height.$img_file_type;
						
						// no? then display the default proportionally resized thumbnails
						} else {
							$des_src 	= $OPTION['upload_path'].'/cache';							
							$img_file 	= mkthumb($img_src,$des_src,$img_size,'width');    
							$imgURL[] 	= get_option('siteurl').'/'.$des_src.'/'.$img_file;	
						}
				
					}
				} 
				?>
				
				<div style="background:none;" <?php post_class("$the_div_class"); ?>>
					<?php include (TEMPLATEPATH . '/lib/pages/category_body.php'); ?>
                    <h4 style="text-align:center; font-weight:bold; margin:5px 0 0 0px;"><?php the_title();?></h4>
					<h6 style="text-align:center; font-weight:bold; margin:5px 0 0 0px;"><?php echo $customfieldvalue;?></h6>
				</div><!-- c_box  -->
				
			<?php 
			// clear for nicely displayed rows :)
			switch($WPS_tagCol){
				case 'tagCol1':
					echo insert_clearfix($counter,1,' <div class="clear"></div>');
				break;
				
				case 'tagCol2':
					echo insert_clearfix($counter,2,' <div class="clear"></div>');
				break;
				
				case 'tagCol3':
					echo insert_clearfix($counter,3,' <div class="clear"></div>');
				break;
				
				case 'tagCol4':
					echo insert_clearfix($counter,4,' <div class="clear"></div>');
				break;
			}
			$counter++;
			$a++;
			
			endwhile;
			wp_reset_query();
			
			include (TEMPLATEPATH . '/wp-pagenavi.php'); 
			if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
			?>
			
		</div><!-- theTags -->
	</div><!-- main_col -->			

	<?php
	include (TEMPLATEPATH . '/widget_ready_areas.php');
		
get_footer(); ?>