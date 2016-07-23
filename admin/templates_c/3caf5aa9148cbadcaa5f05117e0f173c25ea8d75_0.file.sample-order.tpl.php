<?php /* Smarty version 3.1.27, created on 2016-01-28 02:29:29
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\email\sample-order.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1743256a96ef9d4b7b7_81776519%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3caf5aa9148cbadcaa5f05117e0f173c25ea8d75' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\email\\sample-order.tpl',
      1 => 1453855225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1743256a96ef9d4b7b7_81776519',
  'variables' => 
  array (
    'values' => 0,
    'v' => 0,
    'cart' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a96efa0765c7_99844153',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a96efa0765c7_99844153')) {
function content_56a96efa0765c7_99844153 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1743256a96ef9d4b7b7_81776519';
?>

<style>
td{border:1px solid #cecece;}
</style>

<h1>A new website order!</h1>
<table>
<?php
$_from = $_smarty_tpl->tpl_vars['values']->value->fields;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
	<tr>
		<th style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['v']->value->label;?>
</th>
		<td><p><?php echo $_smarty_tpl->tpl_vars['v']->value->value;?>
</p></td>
	</tr>
<?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
</table>
<h1>Order Details</h1>
<table>
	<tr>
		<th style="text-align:left;">Product Name</th>
		<th style="text-align:left;">Selected Size</th>
		<th style="text-align:left;">Selected Attributes</th>		
		<th style="text-align:left;">Uploaded Files</th>		
		<th style="text-align:left;">Txt to engrave</th>				
		<th style="text-align:left;">Quantity</th>
		<th style="text-align:left;">Subtotal</th>
	</tr>
<?php
$_from = $_smarty_tpl->tpl_vars['cart']->value['products'];
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
		<td><?php echo $_smarty_tpl->tpl_vars['p']->value['size'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['p']->value['attlist'];?>
</td>
		<td>
			<p><?php echo $_smarty_tpl->tpl_vars['p']->value['text']->uploaded_logo;?>
</p>
			<p><?php echo $_smarty_tpl->tpl_vars['p']->value['text']->uploaded_engraving;?>
</p>
			<p><?php echo $_smarty_tpl->tpl_vars['p']->value['text']->uploaded_excel;?>
</p>
		</td>
		<td><?php echo $_smarty_tpl->tpl_vars['p']->value['text']->customer_notes;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['p']->value['quantity'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['p']->value['total'];?>
</td>
	</tr>
<?php
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>
</table>
<h1>Order Final Total</h1>
<?php echo $_smarty_tpl->tpl_vars['cart']->value['total'];

}
}
?>