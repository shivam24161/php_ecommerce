<?php
session_start();
if(!isset($_SESSION['email']))
header('location:login.php');
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="css/demo.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
 <main>
  <div class="container-fluid">
    <h2 class="text-center bg-success">Checkout</h2>
</div>  
  <div class="container">
  <div class="row">
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
        <div class="mb-3">
          <label for="username">Name</label>
          <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted"></span></label>
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Cash on Delivery</label>
          </div>
          
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" id="checkout" name="checkout">Place Your Order</button>
        <a class="btn btn-warning btn-lg btn-block" href="products.php">Back</a>
      </form>
    </div>
  </div>

 </main>
<!-- Bootstrap 5 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
  <script>
     $(document).ready(function(){
        $("#checkout").on("click",function(){
          var name=$("#name").val();
          var email=$("#email").val();
          var address=$("#address").val();
          if(name == "" || email == "" || address == ""){
            alert("Please fill all the fields");
          }
          else if(!isNaN(name) || !isNaN(address)){
            alert("Please provide valid input");
          }
          else{
          $.ajax({
            url:"checkoutBackend.php",
            data:{name:name,email:email,address:address},
            type:"POST",
            success:function(result){
              alert(result);
              window.location='products.php';
            }
          })
        }
        })
      })
  </script>
</html>