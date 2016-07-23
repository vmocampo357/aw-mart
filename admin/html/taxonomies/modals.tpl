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
</div>