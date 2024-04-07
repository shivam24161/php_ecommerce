<?php
    include "database.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
 
    if(mysqli_query($conn, "INSERT INTO usertable(name, email, city , country) VALUES('" . $name . "', '" . $email . "', '" . $city . "', '" . $country . "')")) {
    echo '1';
    } else {
       echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    if(isset($_POST['btnUpdateSubmit'])){
        if(isset($_POST['editid'])){
        $editid=$_POST['editid'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $city=$_POST['city'];
        $country=$_POST['country'];
      
        $editQuery = "UPDATE usertable SET name='".$name."', email='".$email."', city='".$city."', country ='".$country."' WHERE id='".$editid."'";
        mysqli_query($conn,$editQuery);
        }
      }

    if(isset($_POST['checkout'])){
    $_SESSION['product_name'];
		$_SESSION['product_quantity'];
		$_SESSION['product_price']=$values['product_price'];
		$_SESSION['total_price']=$total_price;
    }    
    mysqli_close($conn);
?>