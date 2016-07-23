
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
               Themes <small>manage your store's themes tree</small>
            </h1>            
            <!--<a class="btn btn-primary" href="{$SITE_URL}/products/save">Add Product</a>!-->
        </div>
    </div>
    <br />

</div>
<!-- /.container-fluid -->
{literal}
<script id="product-list-template" type="text/x-handlebars-template">
{{#each products}}
	<tr>
		<td>{{this.data.ID}}</td>
		<td>{{this.data.product_name}}</td>
		<td>{{this.data.product_description}}</td>
		<td>Attr</td>
		<td>Cate</td>
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


