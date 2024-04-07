<?php
include "navbar.php";
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
<div class="bg-success"><h3 class="text-center">One Stop Solution</h3></div>
<div class="container-fluid">
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
          url: "homeServer.php",             
          data:{readrecord:readrecord},                  
          success: function(data){                    
              $("#table-container").html(data);    
            }
        });
    }
    $(document).ready(function(){
            readRecords();  
    });

    function deleteProduct(id){
        alert(id);
    }
  
</script>
</html>
