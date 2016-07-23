<?php
session_start();
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

echo json_encode($response);

?>