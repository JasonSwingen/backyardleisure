<div id="main_col" class="<?php echo $the_float_class;?>">
	<div class="featuredCat">
		<?php 
		//echo "<hr>".$this_category->description."<hr>";
		//$imgSrc = get_option('siteurl').'/'.$OPTION['upload_path'].'/'.$this_category->slug.'.'.$OPTION['wps_catimg_file_type'];
		$imgSrc = get_option('siteurl').'/'.$OPTION['upload_path'].'/'.$this_category->slug.'-header.'.$OPTION['wps_catimg_file_type']; 
		?>
		<img src="<?php echo $imgSrc; ?>" alt="<?php echo $this_category->name; ?>" />
	</div>
    <p style="margin:0px 0px 10px 0px;">
	<?php echo $this_category->description;?>
    </p>
    
<?php if (((!empty($childrenCats)) && ($grandChildCats == FALSE)) || ((empty($childrenCats)) && ($this_category->category_parent!=0))) {
	include (TEMPLATEPATH . '/includes/category/categorySubNavi.php');
}