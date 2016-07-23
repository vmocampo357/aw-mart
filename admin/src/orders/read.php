<?php

// Get an order by the UH ID not SESSION
$load_id = $_REQUEST["id"];
$order = OrderFactory::FindByStandardId($load_id);
$Smarty->assign("order",$order);
$Smarty->assign("customer",json_decode($order->data["tpt_order_contact_information"]));
$Smarty->display('orders/single.tpl');

?>