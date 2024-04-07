<?php
include("database.php");
if(isset($_POST['readrecord'])){
    $data = '<div class="container-fluid mt-5">
    <div class="row">
    <div class="col-lg-12">
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
        <th>Orders</th>
    </tr>
    </thead><tbody>';
    $displayquery="select * from orders";
    $result=mysqli_query($conn,$displayquery);
        while($row = mysqli_fetch_assoc($result)){
            $data .="<tr>
          <td>".$row['order_id']."</td>
          <td>".$row['name']."</td>
          <td>".$row['email']."</td>
          <td>".$row['address']."</td>
          <td>".$row['order_date']."</td>
          <td>".$row['delivery_date']."</td>
          <td>Cash on delivery</td>
          <td>".$row['status']."</td>
          <td>
          <table class='table table-striped text-center'>
            <thead>
            <tr>
                <th scope='col'>Item Name</th>
                <th scope='col'>Price</th>
                <th scope='col'>Quantity</th> 
            </tr>
            </thead>
            <tbody>";
           
            $order_query="SELECT * from `order_items` where `order_id`='$row[order_id]'";
            $order_result=mysqli_query($conn,$order_query);
            while($order_fetch=mysqli_fetch_assoc($order_result))
            {
                $data .="<tr>
                <td>".$order_fetch['item_name']."</td>
                <td>".$order_fetch['price']."</td>
                <td>".$order_fetch['quantity']."</td>
                </tr>";
            }
            $data.="</tbody></table></td>";
        }
    $data .= "</tbody></table></div></div></div>";
    echo $data;
}
// Updating the order status in the database
if(isset($_POST["updateUserEmail"])){
    $update_status_id = $_POST["update_status_id"];
    $updateUserEmail = $_POST["updateUserEmail"];
    $updateUserStatus = $_POST["updateUserStatus"];
    $query = "UPDATE orders SET `status`='$updateUserStatus' WHERE order_id = '$update_status_id'";
    mysqli_query($conn,$query);    
}
?>