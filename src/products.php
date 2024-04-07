<?php
session_start();
if(!isset($_SESSION['email']))
header('location:login.php');
include "navbar.php";
?>
<!DOCTYPE html>
<html>
	<head>	
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>
	<body>
            <div class="container">
            <div class="d-flex row mt-2" id="display_item">
			</div>
    </div>
		</div>
	</body>
</html>

<script>  
$(document).ready(function(){
load_product();
load_cart_data();

function load_product()
{
	$.ajax({
		url:"fetch_item.php",
		method:"POST",
		success:function(data)
		{
			$('#display_item').html(data);
		}
	});
}
function load_cart_data()
{
	$.ajax({
		url:"fetch_cart.php",
		method:"POST",
		dataType:"json",
		success:function(data)
		{
			$('#cart_details').html(data.cart_details);
			$('.total_price').text(data.total_price);
			$('.badge').text(data.total_item);
		}
	});
}

$('#cart-popover').popover({
	html : true,
	container: 'body',
	content:function(){
		return $('#popover_content_wrapper').html();
	}
});

$(document).on('click', '.add_to_cart', function(){
	var product_id = $(this).attr("id");
	var product_name = $('#name'+product_id+'').val();
	var product_price = $('#price'+product_id+'').val();
	var product_quantity = $('#quantity'+product_id).val();
	var action = "add";
	if(product_quantity > 0)
	{
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
			success:function(data)
			{
				load_cart_data();
				alert("Item has been Added into Cart");
			}
		});
	}
	else
	{
		alert("Please Enter Number of Quantity");
	}
});

$(document).on('click', '.delete', function(){
	var product_id = $(this).attr("id");
	var action = 'remove';
	if(confirm("Are you sure you want to remove this product?"))
	{
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{product_id:product_id, action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Item has been removed from Cart");
			}
		})
	}
	else
	{
		return false;
	}
});

$(document).on('click', '#clear_cart', function(){
	var action = 'empty';
	$.ajax({
		url:"action.php",
		method:"POST",
		data:{action:action},
		success:function()
		{
			load_cart_data();
			$('#cart-popover').popover('hide');
			alert("Your Cart has been clear");
		}
	});
});
});

</script>