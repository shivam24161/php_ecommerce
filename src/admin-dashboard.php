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
        #table-container1{
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px 8px 10px #888888;
        }
        #table-container2{
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px 18px #888888;
        }
        #table-container{
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px 8px #888888;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h3 class="text-center bg-secondary">Dashboard Management</h3>
<!-- Displaying the Orders -->
<div id="table-container" class="container">
</div>

<div id="table-container1" class="container mt-5">
</diV>

<div id="table-container2" class="container mt-5">
</diV>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

<script>
// Function to display User data
function readRecords(){
    var readrecord = "readrecord";
    $.ajax({    
        type: "POST",
        url: "admin_dashboard_server.php",             
        data:{readrecord:readrecord},                  
        success: function(data){                  
            $("#table-container").html(data);
        }
    });
}
function readRecords1(){
    var readrecord1 = "readrecord1";
    $.ajax({    
        type: "POST",
        url: "admin_dashboard_server.php",             
        data:{readrecord1:readrecord1},                  
        success: function(data){                  
            $("#table-container1").html(data);
        }
    });
}
function readRecords2(){
    var readrecord2 = "readrecord2";
    $.ajax({    
        type: "POST",
        url: "admin_dashboard_server.php",             
        data:{readrecord2:readrecord2},                  
        success: function(data){                  
            $("#table-container2").html(data);
        }
    });
}
$(document).ready(function(){
        readRecords();  
        readRecords1();
        readRecords2();
});
</script>
</html>