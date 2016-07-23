<?php
/**
 * Author: Awards Mart
 * Company: Awards Mart Inc.
 * Date: 11-6-15
 * Index.php
 **/ 
 
# Errors
ini_set("display_errors",true);

# Initial Configuration
define( 'SITE_URL'	, 'http://mayordev.com/2016/shopping-cart-awards/admin' );
define( 'ABS_DIR'	, dirname(__FILE__) );
define( 'RES_DIR'	, SITE_URL."/res" );
define( 'IMG_DIR'	, RES_DIR."/images" );
define( 'CSS_DIR'	, RES_DIR."/css" );
define( 'JS_DIR'	, RES_DIR."/js" );

# DB Config
define( 'DB_HOST'	, 'awardscart.db.7195485.hostedresource.com');
define( 'DB_NAME'	, 'awardscart');
define( 'DB_USER'	, 'awardscart');
define( 'DB_PASS'	, 'Vndhost!23');

# Include Classes & Functions
require_once( 'includes/classes.php' );
require_once( 'includes/functions.php' );

# Use one of the functions to decode which URL to go to
$requested_dir 	= @$_REQUEST['dir'];
$wanted 		= ABS_DIR."/".Input::RequestedDir($requested_dir);
$home 			= ABS_DIR."/src/home.php";
$fallback 		= ABS_DIR."/src/404.php";

# If we don't have a requested
if($requested_dir == "")
	$wanted = $home;
else
	$wanted = sprintf("%s/src/%s.php",ABS_DIR,$requested_dir);

# Get Smarty pre-render
require_once('includes/smarty_prerender.php');

# Final Output
if(file_exists($wanted)):
	require_once($wanted);
else:
	require_once($fallback);
endif;
 
?>