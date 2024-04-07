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

<h3 class="text-center bg-secondary">Order Management</h3>
<div class="h4">
<button class="btn bg-success" style="float:right; margin-right:7%;"
data-bs-toggle='modal' data-bs-target='#update_status_modal'>Update Order Status</button>
</div>
<!--Change User Status Modal Begins -->
<div class="modal" id="update_status_modal">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		      	<!-- Modal Header -->
		      	<div class="modal-header">
			        <h4 class="modal-title">Change order Status</h4>
			        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
		      	</div>

		      	<!-- Modal body -->
		      	<div class="modal-body">
                        <div class="form-group">
                                    <label for="order id">Order Id:</label>
                                    <input class="form-control" type="text" id="update_status_id" placeholder="Enter Order Id">
                                </div>
					  	<div class="form-group">
						    <label for="email">E-mail:</label>
						    <input class="form-control" type="text" id="update_status_email" placeholder="Enter email Id">
                        </div>
                        </br>  
					  	<div class="form-group">
						    <label>Update Status:</label>
                            <select id="update_status_status">
                            <option value="cancel"> Cancel</option>
                            <option value="processed"> Processed</option>
                            <option value="delivered"> delivered</option>
                            </select>
					  	</div>
                        <br>
					  	<button type="submit" class="btn btn-primary" id="update_status_btn" onclick="updateUserStatus()" data-bs-dismiss="modal">Update</button>
					  	<button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Close</button>
					</form>

		      	</div>
		    </div>
	  	</div>
	</div>
<!-- Displaying the Orders -->
<div class="container-fluid">
<div id="table-container"></div>
</diV>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

<script>
// Function to display User data
function readRecords(){
    var readrecord = "readrecord";
    $.ajax({    
        type: "POST",
        url: "admin_order_server.php",             
        data:{readrecord:readrecord},                  
        success: function(data){                  
            $("#table-container").html(data);
        }
    });
}
$(document).ready(function(){
        readRecords();  
});
function updateUserStatus(){
    var update_status_id=$("#update_status_id").val();
    var updateUserEmail = $("#update_status_email").val();
    var updateUserStatus = $("#update_status_status").val();
    if(update_status_id == "" || updateUserEmail == "" || updateUserStatus == ""){
        alert("Please Provide Input");
    }
    else if(isNaN(update_status_id) || !isNaN(updateUserEmail) || !isNaN(updateUserStatus)){
        alert("Please provide valid input");
    }
    $.post("admin_order_server.php",
    {   update_status_id:update_status_id,
        updateUserEmail:updateUserEmail,
        updateUserStatus:updateUserStatus
    },
    function(data,status){
        readRecords();
    });
}
</script>
</html>