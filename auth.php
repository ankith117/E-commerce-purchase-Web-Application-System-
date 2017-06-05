<?php
session_start();



$name = $_POST["form-username"];
$pass = $_POST["form-password"];


$username = "user";
$password = "";
$dbname = "project";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


$sql= "select * from user where name='$name' and password='$pass'";
$result = $conn->query($sql);

$count  = mysqli_num_rows($result);
if($count==0) {

    header("Location: login.php?msg=fail");

    exit;
} else {
    $_SESSION["username"] = $name;
    header("Location: index.php");
    exit;
}


?>