
{include file='inc/header.tpl'}
{include file='products/modals.tpl'}
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Product Details
            </h1> 
            {if $has_message}
            <div class="alert alert-{$message_type} alert-dismissable" role="alert">
            	{$message}
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
           	</div>  
           	{/if}         
            <a class="btn btn-default" href="{$SITE_URL}/products">Back to Products</a>            
        </div>
    </div>
    <br />

    <form id="main-product-form" method="POST" action="">

	    <!-- Form for adding product !-->
	    <div class="row">
	    	<div class="col-md-9">
	    	 	<h3>Product Name</h3>
	    		<input value="{$product->product_name}" name="details[product-name]" type="text" class="form-control" />
	    		<h3>Product SKU</h3>
	    		<input value="{$product->product_sku}" name="details[product-sku]" type="text" class="form-control" />
	    		<h3>Max Engraving Lines (before fee)</h3>
	    		<input value="{$product->product_max_engraving}" name="details[max-engraving]" type="number" class="form-control" />
	    		<h3>Product Short Description</h3>
	    		<textarea name="details[product-description]" class="form-control" style="height:150px;">{$product->product_description}</textarea>
				<h3>Product Full Description</h3>
	    		<textarea name="meta[extended-description]" class="form-control tiny-baby" style="height:350px;">{$product->product_html_description}</textarea>  
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
										{if $product->product_featured_image}
											style="background-image:url({$product->product_featured_image})"
										{/if}
										class="standard-img-placeholder" id="edit-product-image-placeholder"></div>
										<input type="hidden" name="product_featured_image" value="{$product->product_featured_image}" />
										<input type="hidden" name="product_thumbnail_image" value="{$product->product_thumbnail_image}" />
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
						{assign var=taxonomies value=$product->allTaxonomies()}
						{if $taxonomies}
							{foreach $taxonomies as $tax}
								<div class='edit-product-breadcrumb' data-id="{$tax->ID}">
									<a data-id="{$tax->ID}" class="trigger-remove-taxonomy-from-product" href="javascript:void(0);">
									<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
									</a>
									{$tax->theBreadcrumb()}
								</div>
							{/foreach}
						{/if}
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
						{assign var=attributes value=$product->allAttributes()}
						{if $attributes}
							{foreach $attributes as $att}
								<div class='edit-product-breadcrumb' data-id="{$att->ID}">
									<a data-id="{$att->ID}" class="trigger-remove-attribute-from-product" href="javascript:void(0);">
									<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
									</a>
									{$att->theBreadcrumb()}
								</div>
							{/foreach}
						{/if}						
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
						{assign var=productSizes value=$product->createPriceArray($smarty.request.id)}
						{foreach $productSizes as $size}
							<div class='edit-product-breadcrumb' data-id="{$size['sid']}">
								<a data-id="{$size['sid']}" class="trigger-remove-size-from-product" href="javascript:void(0);">
									<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
								</a>
								<a data-id="{$size['sid']}" class="trigger-edit-price" href="javascript:void(0);">
									<i style="color:blue;" class="fa fa-fw fa-edit"></i>
								</a>
								<span>{$size.size}</span>
								<span>{$size.unit}</span>
							</div>
						{/foreach}		
					</div>
				</div>	        		        
	    	</div>	        
	    </div>
	    <br />      

	    <input type="hidden" name="do" value="save-product-details" />
	    <input type="hidden" id="product-id" value="{$smarty.request.id}" />

	<!-- Full product form. !-->
	</form>

</div>

<input type="hidden" id="identifier" value="edit-product" />

{literal}
<script id="taxonomy-select-template" type="text/x-handlebars-template">
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
</script>
<script id="attribute-line-template" type="text/x-handlebars-template">

	<div class='edit-product-breadcrumb' data-id="{{id}}">
		<a data-id="{{id}}" href="javascript:void(0);" class="trigger-remove-attribute-from-product">
		<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
		</a>
		{{{breadcrumb}}}
	</div>

</script>
<script id="taxonomy-line-template" type="text/x-handlebars-template">

	<div class='edit-product-breadcrumb' data-id="{{id}}">
		<a data-id="{{id}}" href="javascript:void(0);" class="trigger-remove-taxonomy-from-product">
		<i style="color:red;" class="fa fa-fw fa-minus-circle"></i>
		</a>
		{{{breadcrumb}}}
	</div>

</script>
{/literal}

<!-- /.container-fluid -->
{include file='inc/footer.tpl'}


