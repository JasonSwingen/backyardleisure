<div align="center" id="footer" class="smallft clearfix noprint">
	<div align="center" class="container clearfix">
		<div id="footer-left"></div>
        <div class="footer_notes">
			<p class="copyright">&copy; <?php echo date('Y'); ?>. <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. | <?php _e('All Rights Reserved','wpShop');?>.</span>
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
			<p><?php _e('WordPress Theme by','wpShop');?> <a href="http://www.sarah-neuber.de"><?php _e('SN Design and Development','wpShop');?></a>.</p>
		</div>
        <div id="footer-right"></div>