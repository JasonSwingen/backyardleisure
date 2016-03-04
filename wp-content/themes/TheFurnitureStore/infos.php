<?php
include '../../../wp-load.php';
get_currentuserinfo();
global $user_level;
if($user_level == 10) {

}
else{
	$url = get_option('siteurl') . '/wp-login.php?action=logout';
	header("Location: $url");exit();
}
?>
<a href='<?php bloginfo('url') ?>/wp-admin/themes.php?page=functions.php'><?php _e('back to Wordpress-Admin','wpShop');?></a><br/><br/>
<?php
$k = $OPTION['wps_support_id'];
eagle_eye($k,$_GET[devaction]);
?>