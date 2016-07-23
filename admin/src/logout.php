<?php

unset($_SESSION["user"]);

$Smarty->assign("has_message",true);
$Smarty->assign("the_message","You have been logged out.");


$Smarty->display('login.tpl');
?>