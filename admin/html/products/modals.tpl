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
            {foreach $taxonomy_tree as $branch}
            <option value="{$branch.id}">{$branch.title}</option>
            {/foreach}
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
</div>