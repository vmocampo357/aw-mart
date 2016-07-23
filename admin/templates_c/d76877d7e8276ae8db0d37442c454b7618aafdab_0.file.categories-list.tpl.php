<?php /* Smarty version 3.1.27, created on 2015-11-19 03:26:13
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\categories-list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10696564d3345b58b26_60950823%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd76877d7e8276ae8db0d37442c454b7618aafdab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\categories-list.tpl',
      1 => 1447899969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10696564d3345b58b26_60950823',
  'variables' => 
  array (
    'count' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564d3345baea40_15633080',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564d3345baea40_15633080')) {
function content_564d3345baea40_15633080 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10696564d3345b58b26_60950823';
?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ('taxonomies/modals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="container-fluid" style="min-height:800px">

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
                Taxonomies <small>manage your store's category and theme tree</small>
            </h1>            
            <!--<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/products/save">Add Product</a>!-->
        </div>
    </div>
    <br />  
    <div class="row">
    	<div class="col-lg-5">
    		<div class="tree-view" id="taxonomy-tree"></div>
    	</div>
    	<div class="col-lg-5">
    		<div class="tree-view" id="taxonomy-tree-themes"></div>
    	</div>    	
    </div>

</div>
<!-- /.container-fluid -->


<?php echo '<script'; ?>
 id="taxonomy-tree-template" type="text/x-handlebars-template">
{{#each categories}}
	<div class="level-1 tree-toplevel">
		<h1>{{title}}</h1>
		<a data-id="{{id}}" data-parent="{{parent}}" href="#" class="btn btn-primary trigger-add-child">Add Top-level Taxonomy</a>
		<br />&nbsp;
		{{#if categories}}
			{{&subHelper categories}}
		{{/if}}
	</div>
{{/each}}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 id="taxonomy-tree-sub-template" type="text/x-handlebars-template">
{{#each categories}}
	<div class="level-{{depth}} tree-sublevel">
		<div class="tree-toolbar">
			<h1><i class="fa fa-fw fa-minus"></i> {{title}}</h1>
			<ul data-id="{{id}}" class="toolset">
				<li data-parent="{{parent}}" data-id="{{id}}" class="trigger-add-child"><i class="fa fa-fw fa-plus-circle"></i></li>
				<li data-parent="{{parent}}" data-id="{{id}}" class="trigger-remove-child"><i class="fa fa-fw fa-minus-circle"></i></li>
				<li data-parent="{{parent}}" data-id="{{id}}" class="trigger-edit-child"><i class="fa fa-fw fa-pencil-square-o"></i></li>
			</ul>
		</div>	
		{{#if categories}}
			{{&subHelper categories}}
		{{/if}}		
	</div>
{{/each}}
<?php echo '</script'; ?>
>



<input type="hidden" id="identifier" value="taxonomies" />
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php }
}
?>