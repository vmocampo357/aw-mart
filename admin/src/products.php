<?php
$Smarty->assign("count",ProductFactory::GetAllProducts());
$Smarty->assign("taxOptions",TaxonomyFactory::GetOptions());
$Smarty->display('products-list.tpl');
?>