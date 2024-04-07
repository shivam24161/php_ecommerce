<?php
session_start();
$con=mysqli_connect("mysql-server","root","secret","store");
if(mysqli_connect_error()){
    echo "<script>alert('Database not connected');</script>";
    exit();
}
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];

    $query1="INSERT INTO orders(order_id,name,email,address,order_date,delivery_date,status) VALUES (null,'$name','$email','$address',now(),'30-08-2022','processed')";
    if(mysqli_query($con,$query1))
    {
        $order_id=mysqli_insert_id($con);
        $query2="INSERT INTO order_items(order_id,item_name,price,quantity) VALUES(?,?,?,?)";
        $stmt=mysqli_prepare($con,$query2);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"isii",$order_id,$item_name,$price,$quantity);
            foreach($_SESSION["shopping_cart"]  as $key => $val)
            {
                $item_name=$val['product_name'];
                $price=$val['product_price'];
                $quantity=$val['product_quantity'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION["shopping_cart"]);
            echo "Order placed successfully";
        }
        else{
            echo "<script>alert('query prepare error');</script>";
        }
    }
    else{
        echo "<script>alert('Sql error');</script>";
    }
}
?>