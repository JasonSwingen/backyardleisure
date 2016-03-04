<?php
include '../../../wp-load.php';	
global $options;
foreach ($options as $value) {
	 if (get_settings( $value['id'] ) === FALSE) { $value['id'] = $value['std']; } else { $value['id'] = get_settings( $value['id'] ); }
}

$accountLog		= get_page_by_title($OPTION['wps_pgNavi_logOption']);
$accountReg		= get_page_by_title($OPTION['wps_pgNavi_regOption']);
session_start();


// Verify inputs
$POST 			= clean_data($_POST);
$username 		= trim($POST[username]);
$email			= trim($POST[email]);
$url 			= $OPTION[siteurl].'/'.$accountReg->post_name.'';


// anything empty, too short, too long?
	if(strlen($email) < 6){
		header("Location: $url".'?err=1');exit(NULL);
	}
	if(strlen($username) < 6){
		header("Location: $url".'?err=2');exit(NULL);
	}
	if(strlen($username) > 10){
		header("Location: $url".'?err=3');exit(NULL);
	}

// valid email?
if(validate_user_email($email) !== TRUE){
	header("Location: $url".'?err=4');exit(NULL);
}


// user name already taken?
	$table 				= is_dbtable_there('feusers');
	$qStr 				="SELECT uid FROM $table WHERE uname = '$username'";	
	$result 			= mysql_query($qStr);
	$num 				= mysql_num_rows($result);
	if($num > 0)
	{
		header("Location: $url".'?err=5');exit(NULL);	
	}

// create password
	$pw = generateRandomString();


// db insert
	$pwdb			= md5(trim($pw));

	$table 			= is_dbtable_there('feusers');
	$now			= time();
	$sql 			= "INSERT INTO $table (uname,pw,email,since) VALUES ('$username','$pwdb','$email',CURDATE())";	
	$res 			= mysql_query($sql);


// email to new user
	//change.9
	$search		= array("[##header##]","[##pw##]","[##login_link##]","[##username##]");
	$replace 	= array(email_header(),$pw,get_option('siteurl').'/'.$accountLog->post_name.'',$username);	 
	//\change.9	  
	email_new_user_welcome($email,$search,$replace);  
	  
	  
// email to shop owner
	$search		= array("[##header##]","[##username##]"); 		// ,"[##login_link##]"
	$replace 	= array(email_header(),$username);	  			// $OPTION['siteurl'].'/login'
	email_new_user_owner_notify($email,$search,$replace);  

// redirect user 
if($res == true){

       // Weiterleitung zur gesch&uuml;tzten Startseite
       if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
			if (php_sapi_name() == 'cgi') {
			 header('Status: 303 See Other');
			 }
			else {
			 header('HTTP/1.1 303 See Other');
			 }
        }


       // we send the users to different pages acc. to user level
       if($res == true){
		$url = get_permalink( $accountLog->ID );
		$url = get_option('home').'/'.$accountLog->post_name.'?reg=ok';
		header("Location: $url");
       }
       else{
		header('Location: http://'.$hostname.($path == '/' ? '' : $path));
       }
       exit();
       }
	
?>