<?php

$Smarty->assign("has_message",false);

if( isset($_REQUEST["trigger-login"]) && $_REQUEST["trigger-login"] == 1 ):

	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];

	if( $username != "" && $password != "" ):

		if($username == "awardsmart" && $password == "x226ss"):

			$_SESSION["user"] = array(
				"name"=>"Administrator"
			);

			$_SESSION["user"]["access_level"] = 150;

			header("Location: home");

		else:
			$Smarty->assign("has_message",true);
			$Smarty->assign("the_message","Could not log you in with those credentials!");
		endif;

	else:
		$Smarty->assign("has_message",true);
		$Smarty->assign("the_message","Please enter a username and password!");
	endif;

endif;

$Smarty->display('login.tpl');
?>