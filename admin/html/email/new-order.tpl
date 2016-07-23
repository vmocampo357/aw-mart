<h1>A new website order!</h1>
<table>
{foreach $values as $v}
	<tr>
		<th style="text-align:left;">{$v.label}</th>
		<td><p>{$v.value}</p></td>
	</tr>
{/foreach}
</table>
<h1>Special Notes</h1>
{if $is_same == "true"}
<strong>Billing and shipping addresses are the same!</strong><br /><br />
{/if}
<h1>Order Details</h1>
<p>Purchase Order Number: {$ponumber}</p>
<table>
	<tr>
		<th style="text-align:left;">Product Name</th>
		<th style="text-align:left;">Selected Size</th>
		<th style="text-align:left;">Selected Attributes</th>			
		<th style="text-align:left;">Txt to engrave</th>				
		<th style="text-align:left;">Quantity</th>
		<th style="text-align:left;">Subtotal</th>
	</tr>
{foreach $cart.products as $p}
	<tr>
		<td>{$p.product->data.product_name}</td>
		<td>{$p.size.label}</td>
		<td>{$p.attlist}</td>
		<td>{$p.text->customer_notes}</td>
		<td>{$p.quantity}</td>
		<td>{$p.total}</td>
	</tr>
{/foreach}
</table>

<h2>Fees</h2>
<table class="table">
	<thead>
	<tr>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>	
		<th>&nbsp;</th>						
		<th>Fee description</th>
		<th>Subtotal</th>
	</tr>
	</thead>
	<tbody>
		{foreach $cart.fees as $f}
			<tr>
				<td colspan="4">&nbsp;</td>
				<td>{$f.name}</td>									
				<td>{$f.fee}</td>
			</tr>
		{/foreach}							
	</tbody>
</table>

<h1>Order Final Total</h1>
<h2>{$cart.total}</h2>