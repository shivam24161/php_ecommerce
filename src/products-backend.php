<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php

// fetch query
include("database.php");
if(isset($_POST['readrecord'])){
    $data = '<table class="table table-striped" style="border-collapse:collapse;">
    <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Product Category</th>
        <th>Product sale price</th>
        <th>Product List Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>';

    $displayquery="select * from `products`";
    $result=mysqli_query($conn,$displayquery);
    if(mysqli_num_rows($result) > 0){
        $number = 1;
        while($row = mysqli_fetch_array($result)){
            $data .="<tr>
          <td>".$number."</td>
          <td>".$row['product_name']."</td>
          <td><img src='"."images/".$row['product_image']."'</td>
          <td>".$row['product_category']."</td>
          <td>".$row['product_sale_price']."</td>
          <td>".$row['product_list_price']."</td>
          <td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#edit-modal' onclick=editProduct(".$row["product_id"].")>Edit</button></td>
          <td><button class='btn btn-danger' onclick='deleteProduct(".$row["product_id"].")'>Delete</button></td>
         
   </tr>";
   $number++;
        }
    }
    $data .= "</table>";
    echo $data;
}
// Delete Products
if(isset($_POST['deleteid'])){
    $product_id=$_POST['deleteid'];
    $deleteQuery="delete from products where product_id='$product_id'";
    mysqli_query($conn,$deleteQuery);
}
// Update Products
if(isset($_POST["product_id"])){
    $product_id=$_POST["product_id"];
    $product_name=$_POST["product_name"];
    $product_image=$_POST["product_image"];
    $product_category=$_POST["product_category"];
    $product_salePrice=$_POST["product_salePrice"];
    $product_listPrice=$_POST["product_listPrice"];
    $query = "UPDATE products SET product_name='$product_name', product_image='$product_image',product_category = '$product_category',product_sale_price = '$product_salePrice',product_list_price = '$product_listPrice' where product_id = '$product_id'";
    mysqli_query($conn,$query);
}
?>
</body>

</html>