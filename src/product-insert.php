<?php
    include "database.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image =  mysqli_real_escape_string($conn, $_POST['image']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $salePrice = mysqli_real_escape_string($conn, $_POST['salePrice']);
    $listPrice = mysqli_real_escape_string($conn, $_POST['listPrice']);
    
    if(mysqli_query($conn,"INSERT INTO products(product_id,product_name,product_image,product_category,product_sale_price,product_list_price) VALUES(null,'$name','$image','$category','$salePrice','$listPrice')")){
        echo "1";
    }
    else{
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>