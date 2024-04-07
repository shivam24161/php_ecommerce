<?php
session_start();
if(isset($_POST["login"])){ 
$email=$_POST["email"];
$pass=$_POST["password"];
  $email=$_POST["email"];
  $pass=$_POST["password"];
if($email == "" || $pass == ""){
  echo "<script>alert('Please provide valid input')</script>";
  echo "<script>window.location='login.php'</script>";
}
else{
include 'config.php';
try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="select * from users";
    $show=$conn->query($sql);
    $all=$show->fetchAll(PDO::FETCH_ASSOC);
    $flag=0;
    foreach($all as $val){

        $checkEmail=$val['email'];
        $checkPassword=$val['password'];
        $role=$val['role'];
        if($email == $checkEmail && $pass == $checkPassword){
            $_SESSION['userid']=$val['user_id'];
            $_SESSION['address']=$val['address'];
            $_SESSION['pincode']=$val['pincode'];
            $_SESSION['email']=$val['email'];
            $flag = 1;
            if($role == 'admin'){
                $_SESSION['admin']=$val['email'];
                echo "<script>window.location='admin-dashboard.php'</script>";
            }
            echo "<script>window.location='products.php'</script>";
        }
    }
    if($flag == 0){
           echo "<script>alert('Details not matched');</script>";
           echo "<script>window.location='login.php'</script>";
    }
 }
 catch(PDOException $e){
     echo $e->getMessage();
 }
 $conn=null;
}
}
?>