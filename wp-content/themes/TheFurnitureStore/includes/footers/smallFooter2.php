<div id="footer" align="center" class="smallft clearfix noprint">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-tags-area') ) :?> <?php endif;   ?>
	<div class="container clearfix" align="center">
		
        <div class="footer_notes">
			<span class="copyright">&copy; <?php echo date('Y'); ?>. <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. | <?php _e('All Rights Reserved','wpShop');?>.</span>
			<?php 
			//custom menu?
			if ($OPTION['wps_wp_custom_menus']) {
				wp_nav_menu( 
					array( 
					'theme_location' 	=> 'secondary-menu',
					'container_class' 	=> 'footer_navi clearfix',
					'fallback_cb'     	=> '',
					) 
				); 
			} ?>
            <div style="font-size:5px; margin-right:10px">
	
		</div>
       