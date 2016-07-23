<?php /* Smarty version 3.1.27, created on 2016-06-19 21:14:06
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/categories-list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:59969008057670b1e3f3205_10407859%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b61bd5a2740c418a3f2be3ce33ad94186095b91' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/categories-list.tpl',
      1 => 1465743079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59969008057670b1e3f3205_10407859',
  'variables' => 
  array (
    'count' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57670b1e46bf53_52918156',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57670b1e46bf53_52918156')) {
function content_57670b1e46bf53_52918156 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '59969008057670b1e3f3205_10407859';
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