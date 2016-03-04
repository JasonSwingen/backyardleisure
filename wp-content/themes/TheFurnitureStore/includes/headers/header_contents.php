<?php 
// different page options
$search			= get_page_by_title($OPTION['wps_pgNavi_searchOption']);
$accountReg		= get_page_by_title($OPTION['wps_pgNavi_regOption']);
$accountLog		= get_page_by_title($OPTION['wps_pgNavi_logOption']);
$customerArea	= get_page_by_title($OPTION['wps_customerAreaPg']);

$lostPass		= get_page_by_title($OPTION['wps_passLostPg']);		//change.9

$pg_sortColumn 	= $OPTION['wps_pgNavi_sortOption'];
$pg_include		= $OPTION['wps_pgNavi_inclOption'];
$pg_exclude		= $OPTION['wps_pgNavi_exclOption'];
$showHome		= $OPTION['wps_pgNavi_homeOption'];

$pageMenuArg = array(
	'include'    	=>'1632,696,847,848,849,850,855,860,1536,1639,1637,1861,1863',
	'exclude'		=>$pg_exclude,
	'show_home'		=>$showHome,
	'sort_column'	=>'post_date',
	'sort_order'	=>'ASC',
	'depth'			=>1,
	'menu_class'	=>'main_navi clearfix'
);

// the Login, Register, Search and Shopping Bag links
?>

<ul class="alignright">
	<?php include (TEMPLATEPATH . '/includes/headers/header_links.php'); ?>
</ul>

<?php //do we want a regular search input field as opposed to the text link?
if($OPTION['wps_search_input']) { ?>
	<div class="alignright input_search">
		<?php include (TEMPLATEPATH . '/headerSearchform.php'); ?>
	</div>
<?php } 

//For better SEO use h2 for the logo on subpages
if (is_front_page()) { ?>
	<h1 id="branding"><a style="width:auto !important;" href="<?php bloginfo( 'url' );?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo('name'); bloginfo( 'description' ); ?></a></h1>
	
<?php } else { ?>	
	<h2 id="branding"><a href="<?php bloginfo( 'url' );?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo('name'); bloginfo( 'description' ); ?></a></h2>
	
<?php } 

//for the Header Widget (Ad)
if ( is_sidebar_active('header_widget_area') ) : dynamic_sidebar('header_widget_area'); endif; 

//## the main navigation ##//
//are custom menus active?
/*if ($OPTION['wps_wp_custom_menus']) {
	wp_nav_menu( 
		array( 
		'theme_location' 	=> 'primary-menu',
		'container_class' 	=> 'main_navi clearfix',
		'fallback_cb'     	=> '',
		) 
	); 
	
//no? then use the theme default navigation options
} else {
	//Are we using a hybrid menu?
	if ($OPTION['wps_hybrid_menu_enable']) {
		//collect the category sort options
		$cat_orderBy 	= $OPTION['wps_catNavi_orderbyOption'];
		$cat_order 		= $OPTION['wps_catNavi_orderOption'];
		$cat_include	= $OPTION['wps_catNavi_inclOption'];
		$cat_exclude	= $OPTION['wps_catNavi_exclOption'];
		
		// do we want a drop down hybrid menu?
		if ($OPTION['wps_hybrid_dropMenu_enable']) {
			include (TEMPLATEPATH . '/includes/headers/hybrid_drop_menu.php');
		} else {
			// collect the page sort options
			$arg = $pageMenuArg;
			$titleLi	='';
			
			$cat_args = array(
				'include'   =>$cat_include,
				'exclude'	=>$cat_exclude,
				'orderby'	=>$cat_orderBy,
				'order'		=>$cat_order,
				'title_li'	=>$titleLi,
				'show_count'=>0,
				'depth'		=>1,
				'hide_empty'=>0,
			);
			
			NWS_page_cat_hybrid_menu($arg,$cat_args);
		}
	// if not then just a page menu then.
	} else {
		wp_page_menu($pageMenuArg);
	}


	// are we using a blog?
	if ($blog_Name != 'Select a Category') {
		$blog_ID 	= get_cat_ID( $blog_Name );
		$exclCatID 	= $OPTION['wps_catNavi_exclOption'];

		$myIDarray 	= explode( ','  , $exclCatID );
		
		if (in_array($blog_ID, $myIDarray)) { ?>
			<ul class="secondary_menu">
				<li class="blog"><a href="<?php echo get_category_link($blog_ID);?>"><?php echo $blog_Name; ?></a></li>
			</ul>	
		<?php } else { }
	} 
}*/ ?>	

<div class="main_navi clearfix">
<?php //if(is_page('2318')):?>
<script type="text/javascript">
$(document).ready(function() {

	$('#header ul li ul').css("display", "none");
		$("#header ul li:nth-last-child(1)").css("background-image", "none");
		//var lastt = $("#header ul li:last").addClass("bg-none");
		//alert(lastt);
	//$("#header li:last").css("background","none !important");
//	$('#header li').last().css("background-image", "none");

    $('#header ul li').mouseover(function(){
		$(this).children('ul').css("display", "block");

    }).mouseout(function(){
		$(this).children('ul').css("display", "none");
    });

    $('#header ul li').mouseover(function(){
		$(this).children('ul').css("display", "block");
    }).mouseout(function(){
		$(this).children('ul').css("display", "none");
    });

	
});

</script>

<?php if ( is_sidebar_active('top_menu_widgets') ) : dynamic_sidebar('top_menu_widgets'); endif; ?>

<?php /*else:?>
	<ul>
    	<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <li><a href="<?php bloginfo('url'); ?>/products">Hot Tubs</a></li>
        <li><a href="<?php bloginfo('url'); ?>/brands/swimming-pools">Pools</a></li>
        <li><a href="<?php bloginfo('url'); ?>/brands/strip9">Billiards</a></li>
        <li><a href="<?php bloginfo('url'); ?>/contact">Contact/About</a></li>
        <li><a href="<?php bloginfo('url'); ?>/testimonials">Testimonials</a></li>
        <li><a href="<?php bloginfo('url'); ?>/blog-2">Blog</a></li>
        <li><a href="<?php echo get_page_link(1861);?>"><?php echo get_the_title(1861)?></a></li>
        <li><a href="<?php echo get_page_link(1863);?>"><?php echo get_the_title(1863)?></a></li>

    </ul>
<?php endif */?>

</div>

<div class="tooltip"></div>	