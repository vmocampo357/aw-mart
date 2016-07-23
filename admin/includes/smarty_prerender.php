<?php
# Set up SMARTY here, with vars and all.
$Smarty = new Smarty();
$Smarty
	->setTemplateDir(ABS_DIR."/html");
$Smarty->assign("has_message",false);	
$Smarty->assign("CSS_DIR"	,CSS_DIR);
$Smarty->assign("JS_DIR"	,JS_DIR);
$Smarty->assign("RES_DIR"	,RES_DIR);
$Smarty->assign("SITE_URL"	,SITE_URL);

?>