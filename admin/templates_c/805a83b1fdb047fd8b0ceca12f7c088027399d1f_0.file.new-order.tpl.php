<?php /* Smarty version 3.1.27, created on 2016-06-11 16:32:49
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\email\new-order.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7980575c211172c0e0_97231159%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '805a83b1fdb047fd8b0ceca12f7c088027399d1f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\email\\new-order.tpl',
      1 => 1465655565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7980575c211172c0e0_97231159',
  'variables' => 
  array (
    'values' => 0,
    'v' => 0,
    'is_same' => 0,
    'ponumber' => 0,
    'cart' => 0,
    'p' => 0,
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_575c21117b0e00_94417004',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_575c21117b0e00_94417004')) {
function content_575c21117b0e00_94417004 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7980575c211172c0e0_97231159';
?>
<h1>A new website order!</h1>
<table>
<?php
$_from = $_smarty_tpl->tpl_vars['values']->value;
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
		<th style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['v']->value['label'];?>
</th>
		<td><p><?php echo $_smarty_tpl->tpl_vars['v']->value['value'];?>
</p></td>
	</tr>
<?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
</table>
<h1>Special Notes</h1>
<?php if ($_smarty_tpl->tpl_vars['is_same']->value == "true") {?>
<strong>Billing and shipping addresses are the same!</strong><br /><br />
<?php }?>
<h1>Order Details</h1>
<p>Purchase Order Number: <?php echo $_smarty_tpl->tpl_vars['ponumber']->value;?>
</p>
<table>
	<tr>
		<th style="text-align:left;">Product Name</th>
		<th style="text-align:left;">Selected Size</th>
		<th style="text-align:left;">Selected Attributes</th>			
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
		<td><?php echo $_smarty_tpl->tpl_vars['p']->value['size']['label'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['p']->value['attlist'];?>
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

<h2>Fees</h2>
<table class="table">
	<thead>
	<tr>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>	
		<th>&nbsp;</th>						
		<th>Fee description</th>
		<th>Subtotal</th>
	</tr>
	</thead>
	<tbody>
		<?php
$_from = $_smarty_tpl->tpl_vars['cart']->value['fees'];
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
				<td colspan="4">&nbsp;</td>
				<td><?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
</td>									
				<td><?php echo $_smarty_tpl->tpl_vars['f']->value['fee'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['f'] = $foreach_f_Sav;
}
?>							
	</tbody>
</table>

<h1>Order Final Total</h1>
<h2><?php echo $_smarty_tpl->tpl_vars['cart']->value['total'];?>
</h2><?php }
}
?>