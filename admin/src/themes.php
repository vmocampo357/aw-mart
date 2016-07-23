<?php
$Smarty->assign("count",ProductFactory::GetAllProducts());
$Smarty->display('themes-list.tpl');
?>