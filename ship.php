<?php
session_start();


$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$uid=$_SESSION["uid"];

$sql= "SELECT * FROM `shipment` WHERE `uid`=$uid";
$row = $conn->query($sql);
$result= mysqli_fetch_array($row);
$_SESSION["shid"] = $result["shipid"];
$_SESSION["shipstatus"] = $result["Status"];
$s= $result["Status"];
if($s=="Picked") {

    header("Location: ship1.php?msg=pi");
    exit;
}

if($s=="Packed") {

    header("Location: ship1.php?msg=pa");
    exit;
}

if($s=="Shipped") {

    header("Location: ship1.php?msg=s");
    exit;
}


 ?>