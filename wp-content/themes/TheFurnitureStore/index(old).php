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
    Backyard Leisure Spas, Pools, and Billiards of Raleigh and Greensboro, North Carolina was started to give our customers the highest quality family fun hot tubs, pools, and billiards available.  We have established this business after 15+ years of experience. We have taken what we have learned over the years to provide the absolutely highest quality products in the industry at the lowest possible price.  That experience has taught us how to help you find the right hot tub or pool table to match what you're looking for. 
    <br /><br />
     We are a family owned business with a friendly atmosphere to match. At Backyard Leisure, customer service is not just a department- it is an attitude! We are here for you, our customers. We want everyone to be able to get the spa, pool, or pool table of their dreams. Therefore, we offer several different finance plans to help suit your needs. Come and see us soon! 
     <br /><br/ > 
We offer the highest quality hot tubs from Jacuzzi Hot Tubs, Bullfrog Spas, Durasport Spas, and Hawkeye Spas that we get direct from the factory. All of our billiard tables are specially handcrafted in the United States by Stripe 9 Billiards and are the finest products available. We also have pools for all sizes and budgets. Stop by and take a look and we think you will agree!<br /><br />  
Hurry in soon to take advantage of our Special Sales going on now. We are offering these same great hot tubs and pool tables for up to 50% off! Right now we have a special deal on the Schooner Hot Tub by Hawkeye Spas for only $3,999. That's 50% off, an amazing price just for you! Come see how we can help you get an exceptional deal on a new spa or pool table.</p><br />
    <div style="float:left; margin-top:20px;">
    	<object width="560" height="349"><param name="movie" value="http://www.youtube.com/v/ITHOUA8iHtk?version=3&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/ITHOUA8iHtk?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="560" height="349" allowscriptaccess="always" allowfullscreen="true"></embed></object>
    	<!--<iframe width="560" height="349" src="http://www.youtube.com/embed/B_cvY1MOlg4" frameborder="0" allowfullscreen></iframe>-->
    </div>
</div>
<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.2.js"></script>-->
<script>
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
	</div>        

	</div><!-- main_col -->	
	<?php include (TEMPLATEPATH . '/widget_ready_areas.php');?>
	

	<?php
}  
get_footer();
?>