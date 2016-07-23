<?php /* Smarty version 3.1.27, created on 2016-06-04 14:24:34
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\taxonomies\modals.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:143555752c882838dd3_24306284%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04c11dcad53b56fc6b5fec3c198d7e0738d69e9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\taxonomies\\modals.tpl',
      1 => 1465043072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143555752c882838dd3_24306284',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5752c8828775e4_73682683',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5752c8828775e4_73682683')) {
function content_5752c8828775e4_73682683 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '143555752c882838dd3_24306284';
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