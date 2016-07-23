<?php /* Smarty version 3.1.27, created on 2016-06-19 21:09:36
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/products-list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:74574282257670a108cbc42_14186998%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f67248098fa9ef27e07677f88e97935c0a57597' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/products-list.tpl',
      1 => 1465743080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74574282257670a108cbc42_14186998',
  'variables' => 
  array (
    'count' => 0,
    'SITE_URL' => 0,
    'taxOptions' => 0,
    'o' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57670a10936312_89817152',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57670a10936312_89817152')) {
function content_57670a10936312_89817152 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '74574282257670a108cbc42_14186998';
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
                Products <small>manage your store's products</small>
            </h1>            
            <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/products/save">Add Product</a>
        </div>
    </div>
    <br />
    <div class="row">    	
    	<div class="col-md-3">
    		<h5>Filter by name</h5>
    		<input type="text" class="form-control products-filter" filter-type="name" />
    	</div>
		<div class="col-md-3">
			<h5>Filter by category</h5>
			<!--<input type="text" class="form-control products-filter" filter-type="taxonomy" />!-->
			<select class="form-control products-filter" filter-type="taxonomy">
				<option value="">Any Category</option>
				<?php
$_from = $_smarty_tpl->tpl_vars['taxOptions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['o']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
$foreach_o_Sav = $_smarty_tpl->tpl_vars['o'];
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['taxonomy_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['taxonomy_label'];?>
</option>
				<?php
$_smarty_tpl->tpl_vars['o'] = $foreach_o_Sav;
}
?>
			</select>
    	</div>    	
    	<div class="col-md-3">	
    		<h5>Status</h5>
    		<!--<input type="text" class="form-control products-filter" filter-type="status" />!-->
    		<select class="form-control products-filter" filter-type="status">
				<option value="-1">Any Status</option>
				<option value="1">Discontinued</option>
				<option value="0">Active</option>
			</select>
    	</div>
    	<div class="col-md-3">	
    		<h5>&nbsp;</h5>
    		<a class="btn btn-success products-filter-activate" href="javascript:void(0);">Filter Products</a>
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
			                <th>Product Name</th>
			                <th>Product Description</th>
			                <!--<th>Product Attributes</th>
			                <th>Product Categories</th>!-->
			                <th>Active?</th>
			                <th>Featured?</th>
			                <th>Action Menu</th>
			            </tr>
			        </thead>
			        <tbody id="product-list-target">	
			        	<?php if ($_smarty_tpl->tpl_vars['count']->value == 0) {?>			        		
			        	<tr>
			        		<td colspan="8">No products found!</td>
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
 id="product-list-template" type="text/x-handlebars-template">
{{#each products}}
	<tr>
		<td>{{this.data.ID}}</td>
		<td>{{this.data.product_name}}</td>
		<td>{{this.data.product_description}}</td>
		<!--<td>Attr</td>
		<td>Cate</td>!-->
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