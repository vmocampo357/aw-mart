<?php

# Include Smarty too.
include(ABS_DIR.'/includes/libs/smarty/Smarty.class.php');

# Includes a defined list of classes.
# No auto-loader because fuck it.
include(ABS_DIR.'/includes/libs/UploadHandler.php');
include(ABS_DIR.'/includes/libs/Input.class.php');

# Includes DB stuff
include(ABS_DIR.'/includes/libs/Database.class.php');

# Include Product Classes
include(ABS_DIR.'/includes/libs/taxonomies/Taxonomy.class.php');
include(ABS_DIR.'/includes/libs/taxonomies/TaxonomyFactory.class.php');

# Include Attribute classes
include(ABS_DIR.'/includes/libs/attributes/Attribute.class.php');
include(ABS_DIR.'/includes/libs/attributes/AttributeFactory.class.php');

# Include Product Classes
include(ABS_DIR.'/includes/libs/products/ProductSize.class.php');
include(ABS_DIR.'/includes/libs/products/Product.class.php');
include(ABS_DIR.'/includes/libs/products/ProductFactory.class.php');

# Include Cart
include(ABS_DIR.'/includes/libs/cart/Cart.class.php');
include(ABS_DIR.'/includes/libs/cart/OrderFactory.class.php');
include(ABS_DIR.'/includes/libs/cart/Order.class.php');
include(ABS_DIR.'/includes/libs/search/SearchQuery.class.php');

# Include IMPORT stuff
include(ABS_DIR.'/includes/libs/import/csv.php');

# Include E-mail stuff
include(ABS_DIR.'/includes/libs/phpmailer/PHPMailerAutoload.php');

?>