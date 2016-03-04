<?php 
if(isset($_POST['sendEmail']) == "yes"){
	if(empty($_POST["txtName"])){
		echo "<script>alert('Please fill up your name');</script>";
	}elseif(empty($_POST["Email"])){
		echo "<script>alert('Please fill up your email');</script>";
	}elseif(empty($_POST["txtPhone"])){
		echo "<script>alert('Please fill up your Phone');</script>";
	}else{
		if($_POST['checkbox'] == 1){
			$schedule = "YES";
		}else{
			$schedule = "NO";
		}
		$header = 'From:'. $_POST['Email']  . " \r\n";			
		$headers .= 'MIME-Version: 1.0' . "\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$to = 'sales@spapoolbilliards.com';
		//$to = 'waqarahmad1000@gmail.com';
		$subject = "This is the site Message";
		$message = '<table border="1" cellspacing="0">

			  <tr>

				<td><table id="Table_01" width="559" height="184" border="0" cellpadding="0" cellspacing="0"  >

				  <font face="Verdana, Geneva, sans-serif">

				  <tr></tr>

				  </font>

				  <tr>

					<td rowspan="5"></td>

					<td bgcolor="#eeeeee" width="150" valign="center" align="left" ><font size="2" face="Verdana, Geneva, sans-serif">&nbsp;Name:</font></td>

					<td align="left"><font face="Verdana, Geneva, sans-serif">&nbsp;'.$_POST["txtName"].'&nbsp;</font></td>

				  </tr>
                  

				  <tr>

					<td bgcolor="#eeeeee" width="100" valign="center" align="left" ><font size="2" face="Verdana, Geneva, sans-serif">&nbsp;E-Mail:</font></td>

					<td><font face="Verdana, Geneva, sans-serif">&nbsp;'.$_POST["Email"].'</font></td>

				  </tr>

				  <tr>

					<td bgcolor="#eeeeee" width="100" valign="center" align="left" ><font size="2" face="Verdana, Geneva, sans-serif">&nbsp;Phone:</font></td>

					<td><font face="Verdana, Geneva, sans-serif">&nbsp;'.$_POST["txtPhone"].'</font></td>

				  </tr>
                  
                  <tr>

					<td bgcolor="#eeeeee" width="100" valign="center" align="left" ><font size="2" face="Verdana, Geneva, sans-serif">&nbsp;Schedule a test:</font></td>

					<td><font face="Verdana, Geneva, sans-serif">&nbsp;'.$schedule.'</font></td>

				  </tr>
                  
                  <tr>

					<td bgcolor="#eeeeee" width="100" valign="center" align="left" ><font size="2" face="Verdana, Geneva, sans-serif">&nbsp;Comments:</font></td>

					<td><font face="Verdana, Geneva, sans-serif">&nbsp;'.$_POST["txtComments"].'</font></td>

				  </tr>

				</table></td>

			  </tr>

			</table>';
			
			$mail = @mail($to, $subject, $message,$headers);
			if($mail){?>
            <script>
            	window.alert("Your Email Successfully Devilered");
            </script>
<?php				
			}
	}
}


get_header();
$DEFAULT = show_default_view(); 
include (TEMPLATEPATH . '/lib/pages/index_body.php'); 
 if($DEFAULT){ 
	// removed if necessary
	delete_dlink();
	//content to feature?
	$featuredCont 	= $OPTION['wps_feature_option'];
	//type of effect?
	$featuredEffect 	= $OPTION['wps_featureEffect_option'];

	// sidebar location?
	$WPS_sidebar		= $OPTION['wps_sidebar_option'];
	switch($WPS_sidebar){

		case 'alignRight':
			$the_float_class 	= 'alignleft';
		break;
		case 'alignLeft':
			$the_float_class 	= 'alignright';
		break;
	}
	switch($featuredEffect){
		case 'innerfade_effect':
			$the_ul_id 		= 'innerfade_effect';
		break;
		case 'Slider_effect':
			$the_ul_id 		= 'slider';
		break;
		case 'cycle_effect':
			$the_ul_id 		= 'cycle';
		break;
	}
	if($OPTION['wps_front_sidebar_disable']) {
		$the_div_class 	= 'featured_wrap featured_wrap_alt';
		$the_div_id 	= 'main_col_alt';
	} else {
		$the_div_class 	= 'featured_wrap ' .$the_float_class;
		$the_div_id 	= 'main_col';
	}
?>

	<div id="<?php echo $the_div_id;?>" class="<?php echo $the_div_class;?>">
		<ul id="<?php echo $the_ul_id;?>">
			<?php include (TEMPLATEPATH . '/includes/index/featured.php');?>
		</ul>
        <div style="font-family:Arial, Helvetica, sans-serif; line-height:1.6em; float:left; width:75%; text-align:left;">
          <p><br />
			<?php //$query_home = new WP_Query( 'page_id=1923' ); /*Local*/?>
			<?php $query_home = new WP_Query( 'page_id=1924' ); /*Live*/?>
            <?php while ( $query_home->have_posts() ) : $query_home->the_post(); ?>
            <?php echo the_content();?>
            <?php endwhile;?>
            <?php wp_reset_postdata();?>
		</p><br />
    
   <iframe width="560" height="315" src="http://www.youtube.com/embed/UkbJTqOfrV8" frameborder="0" allowfullscreen></iframe>
</div>
<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.2.js"></script>-->

<script type="text/javascript">
function checking1(){
	document.getElementById('check1').style.display='none';
	document.getElementById('check2').style.display='block';
	document.getElementById('checkBox').value=1;
}
function checking2(){
	document.getElementById('check2').style.display='none';
	document.getElementById('check1').style.display='block';
	document.getElementById('checkBox').value=0;
}
</script>

<!-- Contact Us Form-->
  <div id="contactForm">
        <div id="checkBoxes">
        	<div id="check1" style="display:block;" onclick="checking1();"><img src="<?php bloginfo('template_directory'); ?>/images/no_tick.png" /></div>
            <div id="check2" style="display:none;" onclick="checking2();"><img src="<?php bloginfo('template_directory'); ?>/images/tick.png" /></div>
        </div>
        <div id="contactFields" style="margin-bottom:20px;">
            <form method="post" action="#" onsubmit="return Validat(this);">
            	<input type="hidden" name="sendEmail" value="yes" />
            	<input type="hidden" name="checkbox" id="checkBox" value="" />
                <label for="txtName" class="labels">Name</label>
                <input type="text" name="txtName" class="fields" title="Name" />
                <label for="Email" class="labels" >E-Mail</label>
                <input type="text" name="Email" class="fields" title="Email"  />
                <label for="txtPhone" class="labels">Phone</label>
                <input type="text" name="txtPhone" class="fields" title="Phone"  />
                <label for="txtComments" class="labels">Comments</label>
                <textarea name="txtComments" class="txtArea" rows="5"></textarea>
                <input type="image" src="<?php bloginfo('template_directory'); ?>/images/contact-form-btn.png" class="formSubmit" />
            </form>
        </div>
        <img style="float:right; margin-top:20px;" src="http://spapoolbilliards.com/wp-content/uploads/fbtwitterlogo.jpg" width="178" height="88" alt="spa, pools, pool tables fan pages" usemap="#logosmap" />
        <map name="logosmap">        
          <area shape="rect" coords="0,0,89,88"="Facebook" href="http://www.facebook.com/pages/Backyard-Leisure/176407239039336" />
          <area shape="rect" coords="90,0,178,88" alt="Twitter" href="https://twitter.com/backyardleisure" />
        </map>
        <a href="http://www.bbb.org/raleigh-durham/business-reviews/hot-tub-and-spa-dealers/backyard-leisure-in-raleigh-nc-90189773" target="_blank"><img style="float:left; margin-top:20px;" src="<?php bloginfo('template_directory'); ?>/images/cbbb-badge-horz.png" alt="Better Business Bureau" title="Rated an A from the BBB"/></a>
	</div>        

	</div><!-- main_col -->	
	<?php include (TEMPLATEPATH . '/widget_ready_areas.php');?>
	

	<?php
}  
get_footer();
?>