<?php /* Smarty version 3.1.27, created on 2016-06-08 05:47:01
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\orders\single.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2124857579535cb0602_69531152%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bb122485688e855266c0a044709812fd3b2aa9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\orders\\single.tpl',
      1 => 1465357620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2124857579535cb0602_69531152',
  'variables' => 
  array (
    'order' => 0,
    'has_message' => 0,
    'message_type' => 0,
    'message' => 0,
    'SITE_URL' => 0,
    'customer' => 0,
    'f' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57579535d314a3_35551291',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57579535d314a3_35551291')) {
function content_57579535d314a3_35551291 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2124857579535cb0602_69531152';
?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ('products/modals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Order Details - <?php echo $_smarty_tpl->tpl_vars['order']->value->data['tpt_po_number'];?>

            </h1> 
            <?php if ($_smarty_tpl->tpl_vars['has_message']->value) {?>
            <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['message_type']->value;?>
 alert-dismissable" role="alert">
            	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
           	</div>  
           	<?php }?>         
            <a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/orders">Back to Orders</a>            
        </div>
    </div>
    <br />

    <form id="main-product-form" method="POST" action="">

	    <!-- Form for adding product !-->
	    <div class="row">
	    	<div class="col-md-4">
                <h3>Special Notes</h3>
                <table class="table">
                    <tr><th>Shipping and Billing Addresses the same?</th></tr>
                    <tr><td><?php if ($_smarty_tpl->tpl_vars['customer']->value->values->same_addresses) {?>YES<?php } else { ?>NO<?php }?></td></tr>
                </table>
	    	 	<h3>Customer Details</h3>
                <table class="table">
	    		<tr>
                    <th>Field Name</th>
                    <th>Field Value</th>
                </tr>
                <?php
$_from = $_smarty_tpl->tpl_vars['customer']->value->fields;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['f']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
$foreach_f_Sav = $_smarty_tpl->tpl_vars['f'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['f']->value->label;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['f']->value->value;?>
</td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['f'] = $foreach_f_Sav;
}
?>
                </table>
	    	</div>			    
            <div class="col-md-8">
                <h3>Purchase Details</h3>                
                <table class="table">
                    <tr>
                        <th>Product Name</th>
                        <th>Uploaded Files</th>
                        <th>Engrave Text</th>
                        <th>Addons</th>
                        <th>Selected Size</th>
                        <th>Subtotal</th>
                    </tr>
                <?php
$_from = $_smarty_tpl->tpl_vars['order']->value->data['cart']['products'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['p']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$foreach_p_Sav = $_smarty_tpl->tpl_vars['p'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['product']->data['product_name'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['p']->value['text']) {?>
                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['p']->value['text']->uploaded_engraving;?>
">Engraving</a><br />
                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['p']->value['text']->uploaded_logo;?>
">Logo</a><br />
                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['p']->value['text']->uploaded_excel;?>
">CSV/Excel</a>
                            <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['text']->customer_notes;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['attlist'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['size']['label'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['total'];?>
</td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>
                    <tr>
                        <td colspan="5"></td>
                        <th>Grand Total</th>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value->data['cart']['total'];?>
</td>
                    </tr>                    
                </table>
            </div>
	    </div>
	    <!-- /.form for adding !-->
	    <br />

	<!-- Full product form. !-->
	</form>

</div>

<input type="hidden" id="identifier" value="read-order" />

<!-- /.container-fluid -->
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php }
}
?>