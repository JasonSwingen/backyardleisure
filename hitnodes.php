<?php
/*
Hitnodes testing tool. Any issues send to wfredrick@. Please delete this file when done testing. 
*/
	error_reporting(0);
	if ( ini_get('zlib.output_compression') ) {
		ini_set('zlib.output_compression', 'Off');
	}

	$dns_check = '';    //fill in the host to attempt DNS lookup
	                    //if the DNS lookup fails, 1000 will be added to the node number
	$dns_check_ip = ''; //fill in the IP to test for a specific result
	                    //if the DNS lookup does not return this IP, 1000 will be added to the node number

	$ini_check_setting = ''; //Fill these two in to check a PHP setting
	$ini_check_value   = ''; //if the setting is NOT set to this value, 1000 will be added to the node number

	$db_check_host = ''; //fill these in to test database connection
	$db_check_user = ''; //if the database connection fails, 1000 will be added to the node number
	$db_check_pass = '';

	function get_standard($a) { //convert all the on, true, 1 to standard boolean type for comparison
		switch ( strtolower($a) ) {
			case 'on':
			case 'yes':
			case 'true':
			case '1':
			case 1:
				return true; //if this is one of these strings return a boolean true

			case 'off':
			case 'no':
			case 'false':
			case '0':
			case '':
			case 0:
				return false;

			default:
				return $a;
		}
	}

	if ( $_SERVER["OS"] == "Windows_NT" ) {
		$hostname = strtolower($_SERVER["COMPUTERNAME"]);
	} else {
		$hostname = `hostname`;
		$hostnamearray = explode('.', $hostname);
		$hostname = $hostnamearray[0];
	}
	if ( !preg_match("/[0-9]{2,4}/", $hostname, $match) ) die("Failed to detect node");
	$node = $match[0];
	if ( preg_match("/^0/", $node) ) $node += 1000;

	$response = "<h1>" . $hostname . "</h1>"; //start of response

	if ( $dns_check != '' ) {
		$ip = gethostbyname($dns_check);
		if ( $ip == $dns_check ) {
			$node += 1000;
			$response .= $dns_check . " failed DNS<br>";
		} else {
			if ( $dns_check_ip != '' && $dns_check_ip != $ip ) {
				$node += 1000;
				$response .= $dns_check . " resolved to " . $ip . ", which does not match " . $dns_check_ip . "<br>";
			} else {
				$response .= $ip . "<br>";
			}
		}
	}

	if ( $ini_check_setting != '' ) {
		$ini_check_value_current = get_standard(ini_get($ini_check_setting));
		$ini_check_value = get_standard($ini_check_value);
		$response .= $ini_check_setting . "=" . $ini_check_value_current . "<br>";
		if ( $ini_check_value_current !== $ini_check_value ) {
			$node += 1000;
		}
	}

	if ( $db_check_host != '' && $db_check_user != '' && $db_check_pass != '' ) {
		$link = mysql_connect($db_check_host, $db_check_user, $db_check_pass);
		if(!$link) {
			$response .= mysql_error() . "<br>";
			$node += 1000;
		} else {
			$response .= "DBOK<br>";
		}
	}

	//header("Content-Length: " . $node);
	$response .= str_repeat('.', $node - strlen($response) - ($_SERVER['SERVER_PORT']=='80'?0:1));
	echo $response;
?>