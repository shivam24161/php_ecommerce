<?php
include('database_connection.php');
$query = "SELECT * FROM products ORDER BY product_id DESC";
$statement = $connect->prepare($query);
if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
		<div class="col col-md-6 col-lg-6" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
            	<img src="images/'.$row["product_image"].'" class="img-responsive" /><br />
            	<h4 class="text-info">'.$row["product_name"].'</h4>
            	<h4 class="text-danger">&#8377 '.$row["product_sale_price"] .'</h4>
				<span class="text-secondary">Please enter quantity below...</span>
            	<input type="text" name="quantity" id="quantity' . $row["product_id"] .'" class="form-control" value="1" />
            	<input type="hidden" name="hidden_name" id="name'.$row["product_id"].'" value="'.$row["product_name"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["product_id"].'" value="'.$row["product_sale_price"].'" />
            	<input type="button" name="add_to_cart" id="'.$row["product_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
		';
	}
	echo $output;
}
?>