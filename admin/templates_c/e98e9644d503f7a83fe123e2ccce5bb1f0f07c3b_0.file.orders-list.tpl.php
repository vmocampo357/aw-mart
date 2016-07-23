<?php /* Smarty version 3.1.27, created on 2016-06-08 05:44:34
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\orders-list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6715575794a2bbc948_90745700%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e98e9644d503f7a83fe123e2ccce5bb1f0f07c3b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\orders-list.tpl',
      1 => 1465357469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6715575794a2bbc948_90745700',
  'variables' => 
  array (
    'count' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_575794a2c1a565_15892502',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_575794a2c1a565_15892502')) {
function content_575794a2c1a565_15892502 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6715575794a2bbc948_90745700';
?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="container-fluid">

	<?php if ($_smarty_tpl->tpl_vars['count']->value != 0) {?>
	<form class="page-info">
		<input type="hidden" name="total-count" value="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" />
		<input type="hidden" name="current-page" value="1" />
		<input type="hidden" name="order-by" value="id" />
		<input type="hidden" name="order" value="DESC" />
	</form>
	<?php }?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Orders <small>review your cart's orders</small>
            </h1>                       
        </div>
    </div>
    <br />
    <!-- /.row -->
    <div class="row">
		<div class="col-lg-12">
			<!-- Table !-->
			<div class="" style="min-height:400px;">
			    <table class="table table-bordered table-hover table-striped">
			        <thead>
			            <tr>
			                <th>ID</th>
			                <th>Purchase Order No.</th>
			                <th>Order Status</th>
			                <th>Order Total</th>			                
			                <th>Date Completed</th>
			                <th>Action Menu</th>
			            </tr>
			        </thead>
			        <tbody id="order-list-target">	
			        	<?php if ($_smarty_tpl->tpl_vars['count']->value == 0) {?>			        		
			        	<tr>
			        		<td colspan="8">No orders found!</td>
			        	</tr>
			        	<?php }?>		        	
			        </tbody>
			    </table>
			</div>
			<!-- Table !-->
			<nav id="pagination-target"></nav>			
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php echo '<script'; ?>
 id="order-list-template" type="text/x-handlebars-template">
{{#each orders}}
	<tr>
		<td>{{this.data.ID}}</td>
		<td>{{this.data.tpt_po_number}}</td>
		<td>{{this.data.tpt_order_status}}</td>
		<td>{{this.data.cart.total}}</td>
		<td>{{this.data.tpt_order_date}}</td>
		<td>
			<div class="dropdown">
				<a href="#" class="dropdown-toggle btn btn-warning" data-toggle="dropdown">Actions <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-left">
				    <li>
				        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/orders/read?id={{this.data.ID}}">View Order</a>
				    </li>													   
				</ul>
			</div>
		</td>
	</tr>
{{/each}}
<?php echo '</script'; ?>
>


<input type="hidden" id="identifier" value="order-list" />
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php }
}
?>