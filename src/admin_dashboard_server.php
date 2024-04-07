<?php
include("database.php");
if(isset($_POST['readrecord'])){
    $data = '<h2 class="text-center text-warning bg-dark" >Last 5 Orders</h2>
    <table class="table table-striped" style="border-collapse:collapse;">
    <thead>
    <tr>
        <th>Order Id</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Order Date</th>
        <th>Delivery Date</th>
        <th>Pay Mode</th>
        <th>Status</th>
    </tr>
    </thead>';
    $displayquery="SELECT * FROM (
        SELECT * FROM `orders` ORDER BY order_date DESC LIMIT 5
     )Var1
        ORDER BY order_date DESC";
    $result=mysqli_query($conn,$displayquery);
        while($row = mysqli_fetch_assoc($result)){
            $data .="<tbody><tr>
          <td>".$row['order_id']."</td>
          <td>".$row['name']."</td>
          <td>".$row['email']."</td>
          <td>".$row['address']."</td>
          <td>".$row['order_date']."</td>
          <td>".$row['delivery_date']."</td>
          <td>Cash on delivery</td>
          <td>".$row['status']."</td></tr></tbody>";
  
}
$data .= "</table>";
echo $data;
}
if(isset($_POST['readrecord1'])){
    $data = '<h2 class="text-center text-warning bg-secondary">Last 5 Products</h2><table class="table table-striped" style="border-collapse:collapse;">
    <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Product Category</th>
        <th>Product sale price</th>
        <th>Product List Price</th>
    </tr>';
    $displayquery=" SELECT * FROM (
        SELECT * FROM `products` ORDER BY product_id DESC LIMIT 5
     )Var1
        ORDER BY product_id DESC";
        
    $result=mysqli_query($conn,$displayquery);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $data .="<tr>
          <td>".$row['product_id']."</td>
          <td>".$row['product_name']."</td>
          <td><img src='"."images/".$row['product_image']."'</td>
          <td>".$row['product_category']."</td>
          <td>".$row['product_sale_price']."</td>
          <td>".$row['product_list_price']."</td>
   </tr>";
        }
    }
    $data .= "</table>";
    echo $data;
}
if(isset($_POST['readrecord2'])){
    $data = '<h2 class="text-center text-warning bg-dark">Last 5 Users</h2><table class="table table-striped" style="border-collapse:collapse;">
    <tr>
        <th>User Id</th>
        <th>Full Name</th>
        <th>Email Address</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>Status</th>
    </tr>';
    $displayquery=" SELECT * FROM (
        SELECT * FROM `users` where email != 'admin@gmail.com' ORDER BY user_id DESC LIMIT 5
     )Var1
        ORDER BY user_id DESC";
    $result=mysqli_query($conn,$displayquery);
    if(mysqli_num_rows($result) > 0){
        $number = 1;
        while($row = mysqli_fetch_array($result)){
            $data .="<tr>
          <td>".$row['user_id']."</td>
          <td>".$row['full_name']."</td>
          <td>".$row['email']."</td>
          <td>".$row['address']."</td>
          <td>".$row['pincode']."</td>
          <td>".$row['status']."</td>
   </tr>";
        }
    }
    $data .= "</table>";
    echo $data;
}

?>