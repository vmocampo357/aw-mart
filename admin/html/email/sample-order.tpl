{literal}
<style>
td{border:1px solid #cecece;}
</style>
{/literal}
<h1>A new website order!</h1>
<table>
{foreach $values->fields as $v}
	<tr>
		<th style="text-align:left;">{$v->label}</th>
		<td><p>{$v->value}</p></td>
	</tr>
{/foreach}
</table>
<h1>Order Details</h1>
<p>Purchase Order Number: {$ponumber}</p>
<table>
	<tr>
		<th style="text-align:left;">Product Name</th>
		<th style="text-align:left;">Selected Size</th>
		<th style="text-align:left;">Selected Attributes</th>		
		<th style="text-align:left;">Uploaded Files</th>		
		<th style="text-align:left;">Txt to engrave</th>				
		<th style="text-align:left;">Quantity</th>
		<th style="text-align:left;">Subtotal</th>
	</tr>
{foreach $cart.products as $p}
	<tr>
		<td>{$p.product->data.product_name}</td>
		<td>{$p.size}</td>
		<td>{$p.attlist}</td>
		<td>
			<p>{$p.text->uploaded_logo}</p>
			<p>{$p.text->uploaded_engraving}</p>
			<p>{$p.text->uploaded_excel}</p>
		</td>
		<td>{$p.text->customer_notes}</td>
		<td>{$p.quantity}</td>
		<td>{$p.total|number_format:2:",":"."}</td>
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
				<td>{$f.fee|number_format:2:",":"."}</td>
			</tr>
		{/foreach}							
	</tbody>
</table>

<h1>Order Final Total</h1>
{$cart.total|number_format:2:",":"."}