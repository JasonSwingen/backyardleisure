<div id="main_col" class="<?php echo $the_float_class;?>">
	<div class="featuredCat">
		<?php 
		$imgSrc = get_option('siteurl').'/'.$OPTION['upload_path'].'/'.$this_category->slug.'.'.$OPTION['wps_catimg_file_type'];
		//$imgSrc = get_option('siteurl').'/'.$OPTION['upload_path'].'/'.$this_category->slug.'_alt.'.$OPTION['wps_catimg_file_type']; 
		?>
		<img src="<?php echo $imgSrc; ?>" alt="<?php echo $this_category->name; ?>" />
	</div>
<?php if (((!empty($childrenCats)) && ($grandChildCats == FALSE)) || ((empty($childrenCats)) && ($this_category->category_parent!=0))) {
	include (TEMPLATEPATH . '/includes/category/categorySubNavi.php');
}