<?php
include("database.php");
if(isset($_POST['readrecord'])){
    $data = '<table class="table table-striped" style="border-collapse:collapse;">
    <tr>
        <th>User Id</th>
        <th>Full Name</th>
        <th>Email Address</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>';

    $displayquery="select * from `users` where email != 'admin@gmail.com'";
    $result=mysqli_query($conn,$displayquery);
    if(mysqli_num_rows($result) > 0){
        $number = 1;
        while($row = mysqli_fetch_array($result)){
            $data .="<tr>
          <td>".$number."</td>
          <td>".$row['full_name']."</td>
          <td>".$row['email']."</td>
          <td>".$row['address']."</td>
          <td>".$row['pincode']."</td>
          <td>".$row['status']."</td>
          <td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#edit-modal' onclick=editUser(".$row["user_id"].")>Edit</button></td>
          <td><button class='btn btn-danger' onclick='deleteUser(".$row["user_id"].")'>Delete</button></td>
   </tr>";
   $number++;
        }
    }
    $data .= "</table>";
    echo $data;
}
// Deleting the User
if(isset($_POST['deleteid'])){
    $userid=$_POST['deleteid'];
    $deleteQuery="delete from users where user_id='$userid'";
    mysqli_query($conn,$deleteQuery);
}
// Inserting the user details back to the modal field
if(isset($_POST['id']) && isset($_POST['id']) != ""){
    $user_id=$_POST['id'];
    $query="SELECT * FROM users where user_id='$user_id'";
    if(!$result = mysqli_query($conn,$query)){
        exit(mysqli_error());
    }
    $response = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
    }
    else{
        $response['message']='Data not found';
    }
    echo JSON_encode($response);
}
else{
    $response['message']="Invalid request";
}
// Updating user details in the database
if(isset($_POST['hidden_user_id1'])){
    $hidden_user_id1=$_POST['hidden_user_id1'];
    $name1=$_POST['name1'];
    $email1=$_POST['email1'];
    $address1=$_POST['address1'];
    $pincode1=$_POST['pincode1'];
    $status1=$_POST['status1'];
    $query =" UPDATE `users` SET `full_name`='$name1',`email`='$email1',`address`='$address1',`pincode`='$pincode1',`status`='$status1' WHERE user_id='$hidden_user_id1'";
    mysqli_query($conn,$query);
}
// Updating the user status in the database
if(isset($_POST["updateUserEmail"])){
    $updateUserEmail = $_POST["updateUserEmail"];
    $updateUserStatus = $_POST["updateUserStatus"];
    $query = "UPDATE users SET `status`='$updateUserStatus' WHERE email = '$updateUserEmail'";
    mysqli_query($conn,$query);    
}
?>