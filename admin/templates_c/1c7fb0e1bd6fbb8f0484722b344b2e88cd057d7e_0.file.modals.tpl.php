<?php /* Smarty version 3.1.27, created on 2016-06-19 21:14:06
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/taxonomies/modals.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:74714858357670b1e47cca3_37405440%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c7fb0e1bd6fbb8f0484722b344b2e88cd057d7e' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/taxonomies/modals.tpl',
      1 => 1465743085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74714858357670b1e47cca3_37405440',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57670b1e487180_39005982',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57670b1e487180_39005982')) {
function content_57670b1e487180_39005982 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '74714858357670b1e47cca3_37405440';
?>
<div class="modal fade" id="saveTaxonomy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Save Taxonomy Details</h4>
      </div>
      <div class="modal-body">
          <h3>Taxonomy Name:</h3>
          <input id="editing-taxonomy-name" type="text" class="form-control" placeholder="" />
		      <h3>Taxonomy Description:</h3>
          <input id="editing-taxonomy-description" type="text" class="form-control" placeholder="" />          
          <h3>Taxonomy Image:</h3>
          <img id="taxonomy-image-preview" src="http://placehold.it/300x300" height="300" />
          <input id="taxonomy-image-upload" type="file" name="files" />
          <!-- Hidden Inputs !-->
          <input id="current-taxonomy-id" type="hidden" value="" />
          <input id="current-parent-id" type="hidden" value="" />
          <input id="selected-taxonomy-image" type="hidden" value="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary trigger-save-taxonomy">Save Taxonomy</button>
      </div>
    </div>
  </div>
</div><?php }
}
?>