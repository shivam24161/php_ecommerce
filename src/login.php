<?php
session_start();
if(isset($_SESSION['email']))
header('location:products.php');
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
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
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>
                          <form class="mx-1 mx-md-4" method="post" action="serverLogin.php">
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="email" name="email" id="form3Example3c" class="form-control" />
                                <label class="form-label" for="form3Example3c">Your Email</label>
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="password" name="password" id="form3Example4c" class="form-control" />
                                <label class="form-label" for="form3Example4c">Password</label>
                              </div>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                            </div>
                            <div> New User ?
                              <a href="signup.php" class="forgot-passwor text-decoration-none">
                                  Sign-up Here
                              </a>
                              <!-- Admin Modal Starts from here -->
                            <div class="modal" id="myModal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h5>Admin Login Panel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                  </div>
                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    <form method="post" action="serverAdmin.php">
                                   <div class="md-form mb-5">
                                        <i class="fas fa-envelope prefix grey-text"></i>
                                        <input type="text" name="adminUsername" id="username" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Enter Username</label>
                                      </div>

                                      <div class="md-form mb-4">
                                        <i class="fas fa-lock prefix grey-text"></i>
                                        <input type="password" name="adminPassword" id="password" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Enter Password</label>
                                      </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                      <button type="button" id="admin_modal" name="adminSubmit" class="btn btn-default btn-secondary">Login</button>
                                    </div>
                                  </div>
</form>
                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                  </div>

                                </div>
                              </div>
                            </div>
                            </div>
                          </form>
          
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
          
                          <img src="https://images.freeimages.com/images/premium/previews/3787/37871952-login-character-laptop-shows-website-sign-in-or-signin.jpg"
                          
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
</html>