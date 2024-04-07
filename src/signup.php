<?php
if(isset($_SESSION['email']))
header('location:products.php');
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign-Up</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
          
                          <!-- <form class="mx-1 mx-md-4" method="post" action="serverSignup.php"> -->
            
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter the Full Name" required/>
                                <label class="form-label" for="form3Example1c">Your Full Name</label>
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter the Email" required/>
                                <label class="form-label" for="form3Example3c">Your Email</label>
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter the password" required/>
                                <label class="form-label" for="form3Example4c">Password</label>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fa fa-address-card fa-lg me-3 fa-fw" aria-hidden="true"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Your address" required/>
                                <label class="form-label" for="form3Example4cd">Address</label>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-map-pin fa-lg me-3 fa-fw" aria-hidden="true"></i>
                             
                              <div class="form-outline flex-fill mb-0">
                                <input type="number" name="pincode" id="pincode" class="form-control" placeholder="Enter 6-digit Pincode" required/>
                                <label class="form-label" for="form3Example4cd">Pincode</label>
                              </div>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button name="register" class="btn btn-primary btn-lg" id="register">Register</button>
                            </div>
                            <div>Already Have an account ?
                              <a href="login.php" class="forgot-password text-decoration-none">
                                  Sign-in Here
                              </a>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                          <img src="https://st2.depositphotos.com/3837271/6941/i/950/depositphotos_69417709-stock-photo-text-sign-up.jpg"
                          class="img-fluid" alt="Sample image">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </body>
    <script>
      $(document).ready(function(){
        $("#register").on("click",function(){
          var name=$("#name").val();
          var email=$("#email").val();
          var password=$("#password").val();
          var address=$("#address").val();
          var pincode=$("#pincode").val();
          if(!isNaN(name) || !isNaN(address) || isNaN(pincode)){
            alert("Please provide valid input");
          }
          else{
          $.ajax({
            url:"serverSignup.php",
            data:{name:name,email:email,password:password,address:address,pincode:pincode},
            type:"POST",
            success:function(result){
              alert(result)
              window.location='login.php'
            }
          })
        }
        })
      })
    </script>
</html>