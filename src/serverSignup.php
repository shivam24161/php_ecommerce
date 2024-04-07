<?php
if(isset($_POST["name"])){
$name=$_POST["name"];
$email=$_POST["email"];
$pass=$_POST["password"];
$address=$_POST["address"];
$pincode=$_POST["pincode"];
include 'config.php';
try{
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="create table if not exists users(
        user_id int AUTO_INCREMENT PRIMARY KEY not null,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL unique,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin','customer'),
        address VARCHAR(255) not null,
        pincode VARCHAR(255) NOT NULL,
        status ENUM('active','inactive')
)";

$conn->exec($sql);
$insert="INSERT INTO users(user_id,full_name,email,password,role,address,pincode,status) VALUES (null,'$name','$email','$pass','customer','$address','$pincode','active')";

$conn->exec($insert);
if($conn){
    echo "User account creation successfull";
}
}
 catch(PDOException $e){
     echo $e->getMessage();
 }
 $conn=null;
}
?>