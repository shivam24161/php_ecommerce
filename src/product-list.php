<?php
session_start();
if(!isset($_SESSION['admin']))
header('location:index.php');
include "navbarAdmin.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style type="text/css">
        body {
            font-family: calibri;
        }
        .box {
            margin-bottom: 10px;
        }
        .box label {
            display: inline-block;
            width: 80px;
            text-align: right;
            margin-right: 10px;
        }
        .box input, .box textarea {
            border-radius: 3px;
            border: 1px solid #ddd;
            padding: 5px 10px;
        }
        .btn-submit {
            margin-left: 90px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="text-center h4 bg-secondary">Product Management</div>
<div class="float-left h5" style="margin-left:7%;">
<button class="btn bg-success float-end" style="margin-right:7%;margin-bottom:1%" data-bs-toggle="modal" data-bs-target="#add-modal">Add New Products</button> 
</div>
<!-- Modal Begins -->
<div class="modal" id="add-modal">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		      	<!-- Modal Header -->
		      	<div class="modal-header">
			        <h4 class="modal-title">Add More Products</h4>
			        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
		      	</div>
		      	<!-- Modal body -->
		      	<div class="modal-body">
		        		<input class="form-control" type="hidden" name="id">
				    	<div class="form-group">
						    <label for="name">Product Name</label>
						    <input class="form-control" type="text" id="name">
					  	</div>
					  	<div class="form-group">
						    <label for="image">Product Image</label>
						    <input class="form-control" type="text" id="image">
					  	</div>
                        </br>
                          <div class="form-group">
                          <label>Category</label>
                              <select id="category">
                                  <option value="electronics">electronics</option>
                                  <option value="fashion">fashion</option>
                                  <option value="home appliances">home appliances</option>
                                  <option value="furniture">furniture</option>
                                  <option value="jewellery">jewellery</option>
                              </select>
					  	</div>
                        </br>
					  	<div class="form-group">
						    <label for="sale_price">Product Sale Price</label>
						    <input class="form-control" type="text" id="salePrice">
					  	</div>
					  	<div class="form-group">
						    <label for="list_price">Product List Price</label>
                            <input class="form-control" type="text" id="listPrice">
					  	</div>
                        </br>
					  	<button type="submit" class="btn btn-primary" id="btnAdd" data-bs-dismiss="modal">Add</button>
					  	<button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Close</button>
		    </div>
		</div>
	</div>
</div>

<!-- Product Edit modal starts -->
<div class="modal" id="edit-modal">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		
		      	<div class="modal-header">
			        <h4 class="modal-title">Update Product Details</h4>
			        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
		      	</div>
                <div class="modal-body">
                    <input class="form-control" type="hidden" id="id">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input class="form-control" type="text" id="product_name">
                    </div>
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input class="form-control" type="text" id="product_image">
                    </div>
                    </br>
                        <div class="form-group">
                        <label>Category</label>
                            <select id="product_category">
                                <option value="electronics">electronics</option>
                                <option value="fashion">fashion</option>
                                <option value="home appliances">home appliances</option>
                                <option value="furniture">furniture</option>
                                <option value="jewellery">jewellery</option>
                            </select>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="sale_price">Product Sale Price</label>
                        <input class="form-control" type="text" id="product_salePrice">
                    </div>
                    <div class="form-group">
                        <label for="list_price">Product List Price</label>
                        <input class="form-control" type="text" id="product_listPrice">
                    </div>
                    </br>
                    <button type="submit" class="btn btn-primary" id="update_product" data-bs-dismiss="modal">Update</button>
                    <button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Close</button>

		      	</div>
		    </div>
	  	</div>
	</div>

<div class="container">
<div id="table-container"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
<script>
    // Function to display User data
    function readRecords(){
        var readrecord = "readrecord";
        $.ajax({    
          type: "POST",
          url: "products-backend.php",             
          data:{readrecord:readrecord},                  
          success: function(data){                    
              $("#table-container").html(data);    
            }
        });
    }
    $(document).ready(function(){
            readRecords();  
    });
    // Add new Product function
    $("#btnAdd").click(function() {
        var name = $("#name").val();
        var image = $("#image").val();
        var category = $("#category").val();
        var salePrice = $("#salePrice").val();
        var listPrice = $("#listPrice").val();
        if(name == "" || image == "" || category == "" || salePrice == "" || listPrice =="")
        {
            alert("Please fill all fields.");
            return false;
        }
        else if(!isNaN(name) || isNaN(salePrice) || isNaN(listPrice)){
            alert("Please Provide Valid Input");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "product-insert.php",
            data: {
                name: name,
                image:image,
                category:category,
                salePrice:salePrice,
                listPrice:listPrice
            },
            success: function(data){
                readRecords();
            }
            });        
        });
    // Delete product function
    function deleteProduct(deleteid){
        var conf=confirm("Are you sure");
        if(conf == true){
            $.ajax({
                url:"products-backend.php",
                type:"post",
                data:{deleteid:deleteid},
                success:function(data){
                  readRecords();
                }
            });
        }
    }
    // Edit function
    function editProduct(editid){
        const product_id=editid;
        $(document).ready(function(){
            $("#update_product").on("click",function(){
                console.log(product_id);
                var product_name=$("#product_name").val();
                var product_image=$("#product_image").val();
                var product_category=$("#product_category").val();
                var product_salePrice=$("#product_salePrice").val();
                var product_listPrice=$("#product_listPrice").val();
                $.ajax({
                    url:"products-backend.php",
                    type:"post",
                    data:{
                        product_id:product_id,
                        product_name:product_name,
                        product_image:product_image,
                        product_category:product_category,
                        product_salePrice:product_salePrice,
                        product_listPrice:product_listPrice
                    },
                    success:function(data){
                        readRecords();
                    }
                })
            })

        })
    }

</script>
</html>