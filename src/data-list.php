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
<h3 class="text-center bg-secondary">User Management</h3>
<div class="h4" style="margin-left:7%">
<button class="btn bg-success" style="float:right; margin-right:7%;margin-bottom:1%;"
data-bs-toggle='modal' data-bs-target='#update_status_modal'>Update User Status</button>
</div>
<!--Change User Status Modal Begins -->
<div class="modal" id="update_status_modal">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		      	<!-- Modal Header -->
		      	<div class="modal-header">
			        <h4 class="modal-title">Change User Status</h4>
			        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
		      	</div>

		      	<!-- Modal body -->
		      	<div class="modal-body">
					  	<div class="form-group">
						    <label for="email">E-mail:</label>
						    <input class="form-control" type="text" id="update_status_email">
                        </div>
                        </br>  
					  	<div class="form-group">
						    <label>Update Status:</label>
                            <select id="update_status_status">
                            <option value="active"> Active</option>
                            <option value="inactive"> Inactive</option>
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
<!-- Edit user details modal begins  -->
<div class="modal" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User Details</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                    <input class="form-control" type="hidden" name="hidden_user_id">
                    <div class="form-group">
                        <label for="name">Update Name:</label>
                        <input class="form-control" type="text" name="name" id="update_name">
                    </div>
                    <div class="form-group">
                        <label for="email">Update E-mail:</label>
                        <input class="form-control" type="text" name="email" id="update_email">
                    </div>
                    <div class="form-group">
                        <label for="Address">Update Address:</label>
                        <input class="form-control" type="text" name="address" id="update_address">  
                    </div>
                    <div class="form-group">
                        <label for="Pincode">Update PinCode:</label>
            <input class="form-control" type="text" name="pincode" id="update_pincode">
                    </div>
            </br>
            <div class="form-group">
                        <label>Update Status:</label>
                        <select id="update_status">
                            <option value="active"> Active</option>
                            <option value="inactive"> Inactive</option>
                        </select>
                    </div>
            <br>
                    <button type="submit" class="btn btn-primary" id="btnUpdateSubmit" name="btnUpdateSubmit" onclick="updateUserDetail()" data-bs-dismiss="modal">Update</button>
                    <button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Displaying the User -->
<div class="container">
<div id="table-container"></div>
</diV>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

<script>
// Variable for storing the id 
var globalID;
// Function to display User data
function readRecords(){
    var readrecord = "readrecord";
    $.ajax({    
        type: "POST",
        url: "backend-script.php",             
        data:{readrecord:readrecord},                  
        success: function(data){                    
            $("#table-container").html(data);    
        }
    });
}
$(document).ready(function(){
        readRecords();  
});
// Delete User function
function deleteUser(deleteid){
    var conf=confirm("Are you sure");
    if(conf == true){
        $.ajax({
            url:"backend-script.php",
            type:"post",
            data:{deleteid:deleteid},
            success:function(data){
                readRecords();
            }
        });
    }
}
// Inserting details in the modal field
function editUser(id){
    $.post("backend-script.php",{
        id:id
    },function(data,status){
        var user = JSON.parse(data);
        $("#update_name").val(user.full_name);
        $("#update_email").val(user.email);
        $("#update_address").val(user.address);
        $("#update_pincode").val(user.pincode); 
        $("#update_status").val(user.status);
    });
    $("#edit-modal").modal("show");
    globalID = id;
}
// Update User details tn the database
function updateUserDetail(){
    var name1=$("#update_name").val();
    var email1=$("#update_email").val();
    var address1=$("#update_address").val();
    var pincode1=$("#update_pincode").val();
    var status1=$("#update_status").val();
    var hidden_user_id1 = globalID;
    if(name1 == "" || email1 == "" || address1 == "" || pincode1 == ""){
        alert("Please Provide input");
    }
    else if(!isNaN(name1) || isNaN(pincode1) || !isNaN(address1)){
        alert("Please Provide Valid Input");
    }else{
    $.post(
        "backend-script.php",
        {
            hidden_user_id1:hidden_user_id1,
            name1:name1,
            email1:email1,
            address1:address1,
            pincode1:pincode1,
            status1:status1
        },
        function(data,status){
            readRecords();
        })};
    globalID = 0;
}

// Updating user status in the database
function updateUserStatus(){
    var updateUserEmail = $("#update_status_email").val();
    var updateUserStatus = $("#update_status_status").val();
    if(updateUserEmail == "" || !isNaN(updateUserEmail)){
        alert("Please Provide Valid Input");
    }
    $.post("backend-script.php",
    {   
        updateUserEmail:updateUserEmail,
        updateUserStatus:updateUserStatus
    },
    function(data,status){
        readRecords();
    });
}


</script>
</html>