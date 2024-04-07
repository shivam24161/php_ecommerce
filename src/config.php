<?php
$host = "mysql-server";
$db = "store";
$username = "root";
$password = "secret";
$source_name="mysql:host=$host; dbname=$db";
$conn = new PDO($source_name,$username,$password);

?>