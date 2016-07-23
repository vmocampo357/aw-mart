
{include file='inc/header.tpl'}
<div class="container-fluid">

	{if $count != 0}
	<form class="page-info">
		<input type="hidden" name="total-count" value="{$count}" />
		<input type="hidden" name="current-page" value="1" />
		<input type="hidden" name="order-by" value="id" />
		<input type="hidden" name="order" value="DESC" />
	</form>
	{/if}

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Products <small>manage your store's products</small>
            </h1>            
            <a class="btn btn-primary" href="{$SITE_URL}/products/save">Add Product</a>
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
				{foreach $taxOptions as $o}
					<option value="{$o.taxonomy_id}">{$o.taxonomy_label}</option>
				{/foreach}
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
			        	{if $count == 0}			        		
			        	<tr>
			        		<td colspan="8">No products found!</td>
			        	</tr>
			        	{/if}		        	
			        </tbody>
			    </table>
			</div>
			<!-- Table !-->
			<nav id="pagination-target"></nav>			
        </div>
    </div>

</div>
<!-- /.container-fluid -->
{literal}
<script id="product-list-template" type="text/x-handlebars-template">
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
				        <a href="{/literal}{$SITE_URL}{literal}/products/save?id={{this.data.ID}}">Edit</a>
				    </li>
					<li>
				        <a class="trigger-product-delete" data-id="{{this.data.ID}}" href="#">Deactivate</a>
				    </li>									    
				</ul>
			</div>
		</td>
	</tr>
{{/each}}
</script>
{/literal}

<input type="hidden" id="identifier" value="product-list" />
{include file='inc/footer.tpl'}


