<?php /* Smarty version 3.1.27, created on 2015-11-18 04:20:10
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\themes-list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6146564bee6aaa3993_20705837%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3d64a61a6b1825f946f4bd6d02e9a34fbafa5c8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\themes-list.tpl',
      1 => 1447816800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6146564bee6aaa3993_20705837',
  'variables' => 
  array (
    'count' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564bee6aaf98a9_15390984',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564bee6aaf98a9_15390984')) {
function content_564bee6aaf98a9_15390984 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6146564bee6aaa3993_20705837';
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
               Themes <small>manage your store's themes tree</small>
            </h1>            
            <!--<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/products/save">Add Product</a>!-->
        </div>
    </div>
    <br />

</div>
<!-- /.container-fluid -->

<?php echo '<script'; ?>
 id="product-list-template" type="text/x-handlebars-template">
{{#each products}}
	<tr>
		<td>{{this.data.ID}}</td>
		<td>{{this.data.product_name}}</td>
		<td>{{this.data.product_description}}</td>
		<td>Attr</td>
		<td>Cate</td>
		<td><span class="badge">{{this.data.active}}</span></td>
		<td><span class="badge">{{this.data.featured}}</span></td>
		<td>
			<div class="dropdown">
				<a href="#" class="dropdown-toggle btn btn-warning" data-toggle="dropdown">Actions <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
				    <!--<li>
				        <a href="#">View</a>
				    </li>!-->
				    <li>
				        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/products/save?id={{this.data.ID}}">Edit</a>
				    </li>
					<li>
				        <a class="trigger-product-delete" data-id="{{this.data.ID}}" href="#">Deactivate</a>
				    </li>									    
				</ul>
			</div>
		</td>
	</tr>
{{/each}}
<?php echo '</script'; ?>
>


<input type="hidden" id="identifier" value="product-list" />
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php }
}
?>