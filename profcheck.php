<?php
session_start();

$uid = $_SESSION["uid"];








$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}



    $sql= "SELECT * FROM `shipment` WHERE `uid`=$uid";
$row = $conn->query($sql);
$result= mysqli_fetch_array($row);
$count  = mysqli_num_rows($row);
if($count==0) {

    header("Location: nprofile.php?");
    exit;
}
else{

header("Location: profile.php");
    exit;
    }










?>