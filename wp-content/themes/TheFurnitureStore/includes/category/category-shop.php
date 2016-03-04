<?php
 
//collect options
$WPS_prodCol		= $OPTION['wps_prodCol_option'];
$WPS_catCol			= $OPTION['wps_catCol_option'];
$WPS_sidebar		= $OPTION['wps_sidebar_option'];
$WPS_showposts		= $OPTION['wps_showpostsOverwrite_Option'];

$this_category 		= get_category($cat);



$topParent 			= NWS_get_root_category($cat,'allData');
$topParentSlug 		= $topParent->slug;
$this_categorySlug 	= $this_category->slug;

//collect options
$orderBy 	= $OPTION['wps_secondaryCat_orderbyOption'];
$order 		= $OPTION['wps_secondaryCat_orderOption'];

//collect the child categories
$childrenCats 	= get_terms('category', 'orderby='.$orderBy.'&order='.$order.'&parent='.$this_category->term_id.'&hide_empty=0');



//collect the grandchild categories
foreach ($childrenCats as $childrenCat) {
	$currentChildCat 	= $childrenCat->term_id;
	$grandChildCats = get_terms('category', 'orderby='.$orderBy.'&order='.$order.'&parent='.$currentChildCat.'&hide_empty=0');
	$grandNum = count($grandChildCats);
	if ($grandNum > 0) {
		$grandChildCats = TRUE;
	break;
	} else {
		$grandChildCats = FALSE;
	}
}

// sidebar location?
switch($WPS_sidebar){
	case 'alignRight':
		$the_float_class 	= 'alignleft';
	break;
	case 'alignLeft':
		$the_float_class 	= 'alignright';
	break;
}
// teaser?
if($OPTION['wps_teaser_enable_option']) {$the_eqcol_class = 'eqcol'; }

//what cat column option?
switch($WPS_catCol){
	case 'catCol3':
		$catCol_class = 'theCats3';
	break;
		
	case 'catCol4':
		$catCol_class = 'theCats4';
	break;
}

//what prod column option?
switch($WPS_prodCol){
	case 'prodCol1':
		$prodCol_class = 'theProds1';
	break;
	case 'prodCol2':
		$prodCol_class = 'theProds2';
	break;
	case 'prodCol3':
		$prodCol_class = 'theProds3';
	break;
	case 'prodCol4':
		$prodCol_class = 'theProds4';
	break;
}

//set the div class	
if (!empty($childrenCats)) {
	if ($grandChildCats) {
		$the_div_class 	= 'theCats clearfix '.$catCol_class. ' '.$the_float_class;
	} else {
		$the_div_class 	= 'theProds clearfix '.$prodCol_class. ' '.$the_float_class.' '.$the_eqcol_class;
	}
	
} else {
	$the_div_class 	= 'theProds clearfix '.$prodCol_class. ' '.$the_float_class.' '.$the_eqcol_class;
} 
	
	if($OPTION['wps_catDescr_enable']) {
		echo term_description();
	} ?>

	<div class="<?php echo $the_div_class;?>">
		<?php 
		//display subcategories if my category has children, otherwise display products. Display also products when there's no grandchildren!
	
		if (!empty($childrenCats)) {
			if ($grandChildCats) {
				include (TEMPLATEPATH . '/includes/category/categoryDisplay.php');
			} else {
				include (TEMPLATEPATH . '/includes/category/productDisplay.php');
			}
		} 
		//otherwise display products
		else {
	
			include (TEMPLATEPATH . '/includes/category/productDisplay.php');
		} ?>
		
	</div><!-- theProds -->
</div><!-- main_col -->
<?php
	include (TEMPLATEPATH . '/widget_ready_areas.php');
get_footer(); ?>