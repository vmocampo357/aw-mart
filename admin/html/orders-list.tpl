
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
                Orders <small>review your cart's orders</small>
            </h1>                       
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
			                <th>Purchase Order No.</th>
			                <th>Order Status</th>
			                <th>Order Total</th>			                
			                <th>Date Completed</th>
			                <th>Action Menu</th>
			            </tr>
			        </thead>
			        <tbody id="order-list-target">	
			        	{if $count == 0}			        		
			        	<tr>
			        		<td colspan="8">No orders found!</td>
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
<script id="order-list-template" type="text/x-handlebars-template">
{{#each orders}}
	<tr>
		<td>{{this.data.ID}}</td>
		<td>{{this.data.tpt_po_number}}</td>
		<td>{{this.data.tpt_order_status}}</td>
		<td>{{this.data.cart.total}}</td>
		<td>{{this.data.tpt_order_date}}</td>
		<td>
			<div class="dropdown">
				<a href="#" class="dropdown-toggle btn btn-warning" data-toggle="dropdown">Actions <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-left">
				    <li>
				        <a href="{/literal}{$SITE_URL}{literal}/orders/read?id={{this.data.ID}}">View Order</a>
				    </li>													   
				</ul>
			</div>
		</td>
	</tr>
{{/each}}
</script>
{/literal}

<input type="hidden" id="identifier" value="order-list" />
{include file='inc/footer.tpl'}


