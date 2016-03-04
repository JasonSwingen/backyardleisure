<div id="footer" class="bigft clearfix noprint">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-tags-area') ) :?> <?php endif;   ?>
	<div class="container clearfix">
		<div class="footer_box">
			<div class="footer_inner_box clearfix">
				<?php if ( is_sidebar_active('footer_left_widget_area') ) : dynamic_sidebar('footer_left_widget_area'); endif;?>	
			</div><!-- footer_inner_box -->
		</div><!-- footer_box -->
			
		<div class="footer_box middle">
			<div class="footer_inner_box clearfix">
				<?php if ( is_sidebar_active('footer_middle_widget_area') ) : dynamic_sidebar('footer_middle_widget_area'); endif;?>	
			</div><!-- footer_inner_box -->
		</div><!-- footer_box -->
			
		<div class="footer_box">
			<div class="footer_inner_box clearfix">
					<?php if ( is_sidebar_active('footer_right_widget_area') ) : dynamic_sidebar('footer_right_widget_area'); endif;?>
			</div><!-- footer_inner_box -->
		</div><!-- footer_box -->
			
		<p class="footer_notes">
			<span class="copyright">&copy; <?php echo date('Y'); ?>. <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. | <?php _e('All Rights Reserved','wpShop');?>.</span>
			<span><?php _e('WordPress Theme by','wpShop');?> <a href="http://www.sarah-neuber.de"><?php _e('SN Design and Development','wpShop');?></a>.</span>
		</p>