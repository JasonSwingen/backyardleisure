<?php $OPTION = NWS_get_global_options();?>
			</div><!-- container -->
		</div><!-- floatswrap-->
	</div><!-- pg_wrap -->

		<?php 

			switch($OPTION['wps_footer_option']){
				case 'small_footer':
					include (TEMPLATEPATH . '/includes/footers/smallFooter.php');  

       					
				break;
					
				case 'large_footer':
					include (TEMPLATEPATH . '/includes/footers/largeFooter.php'); 
	   
				break;
			}
		?>
		</div><!-- end container -->				
	</div><!-- end footer -->
	
<?php wp_footer(); ?>
<script type="text/javascript">
(function(a,e,c,f,g,b,d){var h={ak:"995873944",cl:"lNsOCI-5lFsQmKnv2gM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");
</script>
<script type="text/javascript">
window.onload = function(){ _googWcmGet('gnumber', '919-850-2200'); 
};
</script>	
</body>
</html>