
{include file='inc/header.tpl'}
{include file='taxonomies/modals.tpl'}
<div class="container-fluid" style="min-height:800px">

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
                Taxonomies <small>manage your store's category and theme tree</small>
            </h1>            
            <!--<a class="btn btn-primary" href="{$SITE_URL}/products/save">Add Product</a>!-->
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
{literal}

<script id="taxonomy-tree-template" type="text/x-handlebars-template">
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
</script>
<script id="taxonomy-tree-sub-template" type="text/x-handlebars-template">
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
</script>

{/literal}

<input type="hidden" id="identifier" value="taxonomies" />
{include file='inc/footer.tpl'}


