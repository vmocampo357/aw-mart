<?php
$Smarty->assign("count",OrderFactory::GetAllOrders());
$Smarty->display('orders-list.tpl');
?>