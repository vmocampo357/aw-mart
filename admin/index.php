<?php
session_start();
/**
 * Author: Awards Mart
 * Company: Awards Mart Inc.
 * Date: 11-6-15
 * Index.php
 **/ 
 
# Errors
ini_set("display_errors",false);

# Initial Configuration
define( 'SITE_URL'	, 'http://www.awards-mart.com/admin' );
define( 'ABS_DIR'	, dirname(__FILE__) );
define( 'RES_DIR'	, SITE_URL."/res" );
define( 'IMG_DIR'	, RES_DIR."/images" );
define( 'CSS_DIR'	, RES_DIR."/css" );
define( 'JS_DIR'	, RES_DIR."/js" );

# DB Config
define( 'DB_HOST'	, 'localhost');
define( 'DB_NAME'	, 'i2086466_wp2');
define( 'DB_USER'	, 'i2086466_wp2');
define( 'DB_PASS'	, 'V]1[*p&aQYs~9fdiEq(68(.1');

# Include Classes & Functions
require_once( 'includes/classes.php' );
require_once( 'includes/functions.php' );

# Use one of the functions to decode which URL to go to
$requested_dir 	= @$_REQUEST['dir'];
$wanted 		= ABS_DIR."/".Input::RequestedDir($requested_dir);
$home 			= ABS_DIR."/src/login.php";//ABS_DIR."/src/home.php";
$dashboard		= ABS_DIR."/src/home.php";
$fallback 		= $home;

# Get access level from session
$access_level = $_SESSION["user"]["access_level"];

# If we don't have a requested
if($requested_dir == ""):
	$wanted = $home;
	if($access_level > 0):
		$wanted = $dashboard;
	endif;
else:
	$wanted = sprintf("%s/src/%s.php",ABS_DIR,$requested_dir);
endif;

# Get Smarty pre-render
require_once('includes/smarty_prerender.php');

# See if the wanted has API anywhere
$is_api = ( strpos($wanted,"api") !== false );

# Final Security Check
if($is_api):

	# Final Output
	if(file_exists($wanted)):
		require_once($wanted);
	else:
		require_once($fallback);
	endif;

else:

	if($access_level > 0):

		# Final Output
		if(file_exists($wanted)):
			require_once($wanted);
		else:
			require_once($fallback);
		endif;

	else:
		require_once($home);
	endif;

endif;

 
?>