<?php

//ini_set("display_errors",true);

$order = new Order("7b66aa51647098b6f19c5ca4dc5fd09c");	
$response["data"]["result"] = $order->testFinal();

?>