<?php
session_start();

$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

    $oid=$_SESSION["oid"];
    $sql2= "UPDATE `order` SET `Status`='Return Initiated' WHERE `orderid`=$oid";
    $result2=$conn->query($sql2);



    $sql= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
    $result=$conn->query($sql);
    while($row1= mysqli_fetch_array($result)){

    $lid=$row1["line id"];
    $ls=$row1["status"];
    if($ls!="Return Received"){

    $sql1= "UPDATE `line items` SET `status`='Return Initiated' WHERE `line id`=$lid";
    $result1=$conn->query($sql1);
    }

    }

    header("Location: vorder.php#cart");
    exit;




?>