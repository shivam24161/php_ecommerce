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
    $data ="<div class='card mt-3'>";
    
    $displayquery="select * from `products`";
    $result=mysqli_query($conn,$displayquery);
    if(mysqli_num_rows($result) > 0){
        $number = 1;
        $data = "<div class='d-flex row'>";
        while($row = mysqli_fetch_array($result)){
           
        $data .= "<div class='col col-md-6 col-lg-6'><div class='card float-start' style='width:400px'>
        <img class='card-img-top' src='"."images/".$row['product_image']."' >
        <div class='card-body'>
        <h4 class='card-title'>".$row['product_name']."</h4>
        <p class='card-text'>".$row['product_sale_price']."</p>
        <button class='btn btn-danger' onclick='deleteProduct(".$row["product_id"].")'>Add to Cart</button></div>
        </div></div>";
        }
    }
    $data .= "</div>";
    echo $data;
}
if(isset($_POST['deleteid'])){
    $product_id=$_POST['deleteid'];
    $deleteQuery="delete from products where product_id='$product_id'";
    mysqli_query($conn,$deleteQuery);
}
?>
</body>

</html>