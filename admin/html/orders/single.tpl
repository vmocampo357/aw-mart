
{include file='inc/header.tpl'}
{include file='products/modals.tpl'}
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Order Details - {$order->data.tpt_po_number}
            </h1> 
            {if $has_message}
            <div class="alert alert-{$message_type} alert-dismissable" role="alert">
            	{$message}
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
           	</div>  
           	{/if}         
            <a class="btn btn-default" href="{$SITE_URL}/orders">Back to Orders</a>            
        </div>
    </div>
    <br />

    <form id="main-product-form" method="POST" action="">

	    <!-- Form for adding product !-->
	    <div class="row">
	    	<div class="col-md-4">
                <h3>Special Notes</h3>
                <table class="table">
                    <tr><th>Shipping and Billing Addresses the same?</th></tr>
                    <tr><td>{if $customer->values->same_addresses}YES{else}NO{/if}</td></tr>
                </table>
	    	 	<h3>Customer Details</h3>
                <table class="table">
	    		<tr>
                    <th>Field Name</th>
                    <th>Field Value</th>
                </tr>
                {foreach $customer->fields as $f}
                    <tr>
                        <td>{$f->label}</td>
                        <td>{$f->value}</td>
                    </tr>
                {/foreach}
                </table>
	    	</div>			    
            <div class="col-md-8">
                <h3>Purchase Details</h3>                
                <table class="table">
                    <tr>
                        <th>Product Name</th>
                        <th>Uploaded Files</th>
                        <th>Engrave Text</th>
                        <th>Addons</th>
                        <th>Selected Size</th>
                        <th>Subtotal</th>
                    </tr>
                {foreach $order->data.cart.products as $p}
                    <tr>
                        <td>{$p.product->data.product_name}</td>
                        <td>
                            {if $p.text}
                                <a target="_blank" href="{$p.text->uploaded_engraving}">Engraving</a><br />
                                <a target="_blank" href="{$p.text->uploaded_logo}">Logo</a><br />
                                <a target="_blank" href="{$p.text->uploaded_excel}">CSV/Excel</a>
                            {/if}
                        </td>
                        <td>{$p.text->customer_notes}</td>
                        <td>{$p.attlist}</td>
                        <td>{$p.size.label}</td>
                        <td>{$p.total}</td>
                    </tr>
                {/foreach}
                    <tr>
                        <td colspan="5"></td>
                        <th>Grand Total</th>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>{$order->data.cart.total}</td>
                    </tr>                    
                </table>
            </div>
	    </div>
	    <!-- /.form for adding !-->
	    <br />

	<!-- Full product form. !-->
	</form>

</div>

<input type="hidden" id="identifier" value="read-order" />

<!-- /.container-fluid -->
{include file='inc/footer.tpl'}


