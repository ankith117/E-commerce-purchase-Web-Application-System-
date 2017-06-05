<?php
session_start();

$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$oid=$_POST["oid"];
if(is_null($oid)){
$oid=$_SESSION["oid"];}
else{
$_SESSION["oid"]=$oid;}

$uid=$_SESSION["uid"];

$sql1= "SELECT * FROM `order` WHERE `orderid`=$oid and `uid`=$uid";
      $r=$conn->query($sql1);
      $count  = mysqli_num_rows($r);
      if($count==0){

    header("Location: nvorder.php");
    exit;
    }
    
    if($count!=0){

    header("Location: vorder.php");
    exit;

    }


?>