<?php /* Smarty version 3.1.27, created on 2016-06-04 16:56:52
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\products\modals.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:201835752ec34bba0a2_09348520%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cea9549b2533f9694c6b3b5c174c7e2b75936526' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\products\\modals.tpl',
      1 => 1465052157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201835752ec34bba0a2_09348520',
  'variables' => 
  array (
    'taxonomy_tree' => 0,
    'branch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5752ec34c082b9_64898942',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5752ec34c082b9_64898942')) {
function content_5752ec34c082b9_64898942 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '201835752ec34bba0a2_09348520';
?>
<div class="modal fade" id="addTaxonomy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Taxonomy</h4>
      </div>
      <div class="modal-body">
          <h3>Taxonomy Type:</h3>
          <select id="first-taxonomy-dropdown" class="form-control">
            <option value="0">Choose a taxonomy type</option>
            <?php
$_from = $_smarty_tpl->tpl_vars['taxonomy_tree']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['branch'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['branch']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['branch']->value) {
$_smarty_tpl->tpl_vars['branch']->_loop = true;
$foreach_branch_Sav = $_smarty_tpl->tpl_vars['branch'];
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['branch']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['branch']->value['title'];?>
</option>
            <?php
$_smarty_tpl->tpl_vars['branch'] = $foreach_branch_Sav;
}
?>
          </select>
          <ul id="taxonomy-child-dropdowns"></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary trigger-add-final-taxonomy">Save to Product</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addAttribute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Attribute</h4>
      </div>
      <div class="modal-body">
          <h3>Attribute Type:</h3>       
          <input type="text" style="display:block !important;" class="typeahead" id="choose-top-attribute" />             
          <hr />
          <div id="children-attributes" style="display:none;">
            <a class="btn btn-primary trigger-add-child-attribute" href="javascript:void(0);">Add <span name="linked-parent-attribute-name"></span>(s)</a>
            <ul>

            </ul>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary trigger-add-final-attribute">Save to Product</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addPrice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Price</h4>
      </div>
      <div class="modal-body">
          <!--<h3>Item ID (SKU):</h3>       
          <input id="current-price-sku" type="text" class="form-control" />!-->
          <h3>Item Size (value):</h3>       
          <input id="current-price-size" type="text" class="form-control" />
          <h3>Item Size (unit):</h3>       
          <select id="current-price-unit" class="form-control">
            <option value="Inch">Inch(es)</option>
            <option value="Plates">Plate(s)</option>
            <option value="Ounces">Ounce(s)</option>
            <option value="Feet">Feet</option>
            <option value="CM">Cm/Centimeters</option>
            <option value="MM">Mm/Millimeters</option>
          </select>
          <h3>Quantity Prices:</h3>  
          <a class="btn btn-primary trigger-new-quantity" href="javascript:void(0);">Add Quantity</a>
          <hr />          
          <div id="current-price-quantities" class="quantities">
            <ul>
              <li>
                <input type="text" placeholder="Quantity range" class="form-control qty-range" />
                <input type="text" placeholder="Price for range" class="form-control qty-price" />
              </li>
            </ul>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary trigger-add-final-size">Save to Product</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editPrice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Size/Prices</h4>
      </div>
      <div class="modal-body">
          <!--<h3>Item ID (SKU):</h3>       
          <input id="current-price-sku" type="text" class="form-control" />!-->
          <h3>Item Size (value):</h3>       
          <input id="edit-price-size" type="text" class="form-control" />
          <h3>Item Size (unit):</h3>       
          <select id="edit-price-unit" class="form-control">
            <option value="Inch">Inch(es)</option>
            <option value="Plates">Plate(s)</option>
            <option value="Ounces">Ounce(s)</option>
            <option value="Feet">Feet</option>
            <option value="CM">Cm/Centimeters</option>
            <option value="MM">Mm/Millimeters</option>
          </select>
          <h3>Quantity Prices:</h3>  
          <a class="btn btn-primary trigger-new-edit-quantity" href="javascript:void(0);">Add Quantity</a>
          <hr />          
          <div id="edit-price-quantities" class="quantities">
            <ul>
              <li>
                <input type="text" placeholder="Quantity range" class="form-control qty-range" />
                <input type="text" placeholder="Price for range" class="form-control qty-price" />
              </li>
            </ul>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="editing-size-id" value="" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary trigger-edit-final-size">Save to Product</button>
      </div>
    </div>
  </div>
</div><?php }
}
?>