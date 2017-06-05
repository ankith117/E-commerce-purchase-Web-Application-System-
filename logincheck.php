<?php
session_start();



$name = $_POST["form-username"];
$pass = $_POST["form-password"];

if(strcmp($name,"admin")==0 && (strcmp($pass,"admin1234")==0 ) ){

  header("Location: admin.php");
  exit;
}





$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}



$sql= "select * from user where username='$name' and password='$pass'";
$row = $conn->query($sql);
$result= mysqli_fetch_array($row);
$count  = mysqli_num_rows($row);
if($count==0) {

    header("Location: login1.php?msg=fail");
    exit;
} else {

    $_SESSION["uid"] = $result["uid"];
    $uid=$_SESSION["uid"];

    $_SESSION["u"] = $name;
    $_SESSION["p"] = $pass;
    $_SESSION["fn"] = $result["firstname"];
    $_SESSION["ln"] = $result["lastname"];
    $_SESSION["em"] = $result["emailid"];


    $_SESSION["cart"] = array();
    $_SESSION["subcart"] = array();


    $sql1= "SELECT * FROM `billing address` WHERE `uid`=$uid";
$row1 = $conn->query($sql1);
$result1= mysqli_fetch_array($row1);


$_SESSION["baid"] = $result1["baid"];
$_SESSION["bsa"] = $result1["street name"];
$_SESSION["bc"] = $result1["city"];
$_SESSION["bs"] = $result1["state"];
$_SESSION["bz"] = $result1["zip"];
$_SESSION["ccn"] = $result1["credit card number"];
    $_SESSION["cvv"] = $result1["CVV"];
    $_SESSION["cem"] = $result1["expiry month"];
    $_SESSION["cey"] = $result1["expiry year"];

$sql2= "SELECT * FROM `shipping address` WHERE `uid`=$uid";
$row2 = $conn->query($sql2);
$result2= mysqli_fetch_array($row2);

$_SESSION["said"] = $result2["said"];
$_SESSION["ssa"] = $result2["street name"];
$_SESSION["sc"] = $result2["city"];
$_SESSION["ss"] = $result2["state"];
$_SESSION["sz"] = $result2["zip"];


    header("Location: lindex.php");
    exit;
}



 ?>