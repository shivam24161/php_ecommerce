<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="10" >  -->
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Store</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
  </head>
  <body>
<main>
  <header class="p-3 bg-dark text-white">  
    <div class="container-fluid">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="products.php" class="nav-link px-2 text-white">Products</a></li>
          <li><a href="about.php" class="nav-link px-2 text-white">About</a></li>
          <li><div class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
            Shop By Category
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="working.php">Electronics</a></li>
            <li><a class="dropdown-item" href="working.php">Fashion</a></li>
            <li><a class="dropdown-item" href="working.php">Furniture</a></li>
            <li><a class="dropdown-item" href="working.php">Home Appliances</a></li>
          </ul>
        </div></li>
        </ul>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search by Item Name" id="search" aria-label="Search">
        </form>
        <div >
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-shopping-cart text-light"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span></i></button>
          <?php if(isset($_SESSION['email']))
          echo "<button class='btn bg-dark text-white'>".$_SESSION['email']."</button>"
          ?>
        </div>
         
        <div class="text-end">
          <?php if(!isset($_SESSION['email']))
          echo "<a href='login.php' class='btn btn-outline-light me-1 mx-2'>Login</a>
                 <a href='signup.php' class='btn btn-warning'>Sign-up</a>"
          ?>
          <?php if(isset($_SESSION['email']))
          echo "<a href=\"logout.php\" class='btn btn-warning me-2'><i class='fas fa-sign-out-alt'></i></a>"; ?>
        </div>
        
      </div>
    </div>
  </header>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Items in the Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="popover_content_wrapper" >
				<span id="cart_details"></span>
				<div>
     
        <?php
          echo "<a href='checkout.php' class='btn btn-primary' id='check_out_cart'>
					<span>Proceed for Checkout</span>
					</a>";
          ?>
					<a href="#" class="btn btn-warning" id="clear_cart"> Clear
					</a>
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  
</html>
