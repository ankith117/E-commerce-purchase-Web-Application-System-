<?php
session_start();

$oid= $_POST['oid'];

$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT * FROM `order` WHERE `orderid`=$oid";
$row = $conn->query($sql);
$result= mysqli_fetch_array($row);
$count  = mysqli_num_rows($row);
if($count==0) {

    header("Location: ltrackfail.html");
    exit;


}
else{

$sql1= "SELECT * FROM `shipment` WHERE `orderid`=$oid";
$row1 = $conn->query($sql1);
$result1= mysqli_fetch_array($row1);


$_SESSION["ostatus"] = $result["Status"];
$_SESSION["oid"] = $result["orderid"];
$_SESSION["shid"] = $result1["shipid"];
$_SESSION["shipstatus"] = $result1["Status"];



    header("Location: ship1.php");
    exit;

}


 ?>