<?php
$Smarty->assign("count",ProductFactory::GetAllProducts());
$Smarty->display('categories-list.tpl');
?>