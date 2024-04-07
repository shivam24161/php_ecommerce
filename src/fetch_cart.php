<?php
session_start();
$total_price = 0;
$total_item = 0;
$output = '
<div class="table-responsive" id="order_table">
	<table class="table table-bordered table-striped">
		<tr>  
            <th>Product Name</th>  
            <th>Quantity</th>  
            <th>Price</th>  
            <th>Total</th>  
            <th>Action</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		<tr>
			<td>'.$values["product_name"].'</td>
			<td>'.$values["product_quantity"].'</td>
			<td align="right">&#8377 '.$values["product_price"].'</td>
			<td align="right">&#8377 '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
			<td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
		</tr>
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
		$_SESSION['product_name']=$values['product_name'];
		$_SESSION['product_quantity']=$values['product_quantity'];
		$_SESSION['product_price']=$values['product_price'];
		$_SESSION['total_price']=$total_price;
	}
	$output .= '
	<tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">&#8377 '.number_format($total_price, 2).'</td>  
        <td></td>  
    </tr>
	';
}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Your Cart is Empty!
    	</td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'Rs.' . number_format($total_price, 2),
	'total_item'		=>	$total_item
);	
echo json_encode($data);
?>