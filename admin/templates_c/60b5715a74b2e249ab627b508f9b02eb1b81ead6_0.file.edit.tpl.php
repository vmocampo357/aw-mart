<?php /* Smarty version 3.1.27, created on 2016-06-19 21:17:43
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/products/edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21293981657670bf7eeb4f8_82785278%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60b5715a74b2e249ab627b508f9b02eb1b81ead6' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/products/edit.tpl',
      1 => 1465743084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21293981657670bf7eeb4f8_82785278',
  'variables' => 
  array (
    'has_message' => 0,
    'message_type' => 0,
    'message' => 0,
    'SITE_URL' => 0,
    'product' => 0,
    'taxonomies' => 0,
    'tax' => 0,
    'attributes' => 0,
    'att' => 0,
    'productSizes' => 0,
    'size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57670bf80bcf86_96968633',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57670bf80bcf86_96968633')) {
function content_57670bf80bcf86_96968633 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21293981657670bf7eeb4f8_82785278';
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
                Product Details
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
/products">Back to Products</a>            
        </div>
    </div>
    <br />

    <form id="main-product-form" method="POST" action="">

	    <!-- Form for adding product !-->
	    <div class="row">
	    	<div class="col-md-9">
	    	 	<h3>Product Name</h3>
	    		<input value="<?php echo $_smarty_tpl->tpl_vars['product']->value->product_name;?>
" name="details[product-name]" type="text" class="form-control" />
	    		<h3>Product SKU</h3>
	    		<input value="<?php echo $_smarty_tpl->tpl_vars['product']->value->product_sku;?>
" name="details[product-sku]" type="text" class="form-control" />
	    		<h3>Max Engraving Lines (before fee)</h3>
	    		<input value="<?php echo $_smarty_tpl->tpl_vars['product']->value->product_max_engraving;?>
" name="details[max-engraving]" type="number" class="form-control" />
	    		<h3>Product Short Description</h3>
	    		<textarea name="details[product-description]" class="form-control" style="height:150px;"><?php echo $_smarty_tpl->tpl_vars['product']->value->product_description;?>
</textarea>
				<h3>Product Full Description</h3>
	    		<textarea name="meta[extended-description]" class="form-control tiny-baby" style="height:350px;"><?php echo $_smarty_tpl->tpl_vars['product']->value->product_html_description;?>
</textarea>  
	    		<input type="hidden" name="details[product-html-description]" value="" />  		
	    	</div>
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Product Information</h3>
					</div>
					<div class="panel-body">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<div 
										<?php if ($_smarty_tpl->tpl_vars['product']->value->product_featured_image) {?>
											style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['product']->value->product_featured_image;?>
)"
										<?php }?>
										class="standard-img-placeholder" id="edit-product-image-placeholder"></div>
										<input type="hidden" name="product_featured_image" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->product_featured_image;?>
" />
										<input type="hidden" name="product_thumbnail_image" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->product_thumbnail_image;?>
" />
										<input id="fileupload" type="file" name="files[]" multiple>
										<!--<input type="file" id="product-image" />!-->
									</td>
								</tr>
								<tr>
									<td><button class="btn btn-primary" href="#">Save Details</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>    		
	    	</div>    	
	    </div>
	    <!-- /.form for adding !-->
	    <br />

	    <!-- Page Heading -->
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">
	                Product Categories/Themes <small>Sports, Office, etc.</small>
	            </h1>                        
	        </div>
	        <div class="col-lg-12">        	
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary trigger-add-taxonomy" href="#">Add Taxonomy</a>
					</div>
					<div class="panel-body" id="inline-taxonomies">
						<?php $_smarty_tpl->tpl_vars['taxonomies'] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->allTaxonomies(), null, 0);?>
						<?php if ($_smarty_tpl->tpl_vars['taxonomies']->value) {?>
							<?php
$_from = $_smarty_tpl->tpl_vars['taxonomies']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tax'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tax']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tax']->value) {
$_smarty_tpl->tpl_vars['tax']->_loop = true;
$foreach_tax_Sav = $_smarty_tpl->tpl_vars['tax'];
?>
								<div class='edit-product-breadcrumb' data-id="<?php echo $_smarty_tpl->tpl_vars['tax']->value->ID;?>
">
									<a data-id="<?php echo $_smarty_tpl->tpl_vars['tax']->value->ID;?>
" class="trigger-remove-taxonomy-from-product" href="javascript:void(0);">
									<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
									</a>
									<?php echo $_smarty_tpl->tpl_vars['tax']->value->theBreadcrumb();?>

								</div>
							<?php
$_smarty_tpl->tpl_vars['tax'] = $foreach_tax_Sav;
}
?>
						<?php }?>
					</div>
				</div>	        	
	    	</div>	        
	    </div>
	    <br />   

	    <!-- Page Heading -->
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">
	                Product Attributes <small>Color, options, etc.</small>
	            </h1>                        
	        </div>
	        <div class="col-lg-12">	        
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary trigger-add-attribute" href="#">Add Attribute</a>
					</div>
					<div class="panel-body" id="inline-attributes">
						<?php $_smarty_tpl->tpl_vars['attributes'] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->allAttributes(), null, 0);?>
						<?php if ($_smarty_tpl->tpl_vars['attributes']->value) {?>
							<?php
$_from = $_smarty_tpl->tpl_vars['attributes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['att'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['att']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['att']->value) {
$_smarty_tpl->tpl_vars['att']->_loop = true;
$foreach_att_Sav = $_smarty_tpl->tpl_vars['att'];
?>
								<div class='edit-product-breadcrumb' data-id="<?php echo $_smarty_tpl->tpl_vars['att']->value->ID;?>
">
									<a data-id="<?php echo $_smarty_tpl->tpl_vars['att']->value->ID;?>
" class="trigger-remove-attribute-from-product" href="javascript:void(0);">
									<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
									</a>
									<?php echo $_smarty_tpl->tpl_vars['att']->value->theBreadcrumb();?>

								</div>
							<?php
$_smarty_tpl->tpl_vars['att'] = $foreach_att_Sav;
}
?>
						<?php }?>						
					</div>
				</div>	        		        
	    	</div>
	    </div>
	    <br />      

	    <!-- Page Heading -->
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">
	                Product Prices <small>Tables with the different quantity prices</small>
	            </h1>                        
	        </div>
	        <div class="col-lg-12">	        
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary trigger-add-price" href="#">Add Size</a>
					</div>
					<div class="panel-body" id="inline-prices">
						<?php $_smarty_tpl->tpl_vars['productSizes'] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->createPriceArray($_REQUEST['id']), null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['productSizes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['size'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['size']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['size']->value) {
$_smarty_tpl->tpl_vars['size']->_loop = true;
$foreach_size_Sav = $_smarty_tpl->tpl_vars['size'];
?>
							<div class='edit-product-breadcrumb' data-id="<?php echo $_smarty_tpl->tpl_vars['size']->value['sid'];?>
">
								<a data-id="<?php echo $_smarty_tpl->tpl_vars['size']->value['sid'];?>
" class="trigger-remove-size-from-product" href="javascript:void(0);">
									<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
								</a>
								<a data-id="<?php echo $_smarty_tpl->tpl_vars['size']->value['sid'];?>
" class="trigger-edit-price" href="javascript:void(0);">
									<i style="color:blue;" class="fa fa-fw fa-edit"></i>
								</a>
								<span><?php echo $_smarty_tpl->tpl_vars['size']->value['size'];?>
</span>
								<span><?php echo $_smarty_tpl->tpl_vars['size']->value['unit'];?>
</span>
							</div>
						<?php
$_smarty_tpl->tpl_vars['size'] = $foreach_size_Sav;
}
?>		
					</div>
				</div>	        		        
	    	</div>	        
	    </div>
	    <br />      

	    <input type="hidden" name="do" value="save-product-details" />
	    <input type="hidden" id="product-id" value="<?php echo $_REQUEST['id'];?>
" />

	<!-- Full product form. !-->
	</form>

</div>

<input type="hidden" id="identifier" value="edit-product" />


<?php echo '<script'; ?>
 id="taxonomy-select-template" type="text/x-handlebars-template">
{{#if children}}
	<li data-id="{{ID}}" class="dropdown-set" data-parent="{{taxonomy_parent}}">
		<select data-id="{{ID}}" name="" class="form-control taxonomy-dropdown">
			<option value="0">Choose below...</option>
			{{#each children}}
			<option data-parent="{{parent}}" value="{{id}}">{{title}}</option>
			{{/each}}
		</select>
	</li>
{{/if}}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 id="attribute-line-template" type="text/x-handlebars-template">

	<div class='edit-product-breadcrumb' data-id="{{id}}">
		<a data-id="{{id}}" href="javascript:void(0);" class="trigger-remove-attribute-from-product">
		<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
		</a>
		{{{breadcrumb}}}
	</div>

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 id="taxonomy-line-template" type="text/x-handlebars-template">

	<div class='edit-product-breadcrumb' data-id="{{id}}">
		<a data-id="{{id}}" href="javascript:void(0);" class="trigger-remove-taxonomy-from-product">
		<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
		</a>
		{{{breadcrumb}}}
	</div>

<?php echo '</script'; ?>
>


<!-- /.container-fluid -->
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php }
}
?>