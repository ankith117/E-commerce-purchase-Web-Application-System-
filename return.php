<?php

session_start();

$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$lid=$_GET["msg1"];

$sql1= "UPDATE `line items` SET `status`='Return Initiated' WHERE `line id`=$lid";
    $result1=$conn->query($sql1);
    $sql= "SELECT * FROM `line items` WHERE `line id`=$lid";
      $result=$conn->query($sql);
      $row= mysqli_fetch_array($result);
      $oid=$row["Orderid"];

      $sql3= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
      $result3=$conn->query($sql3);
      $c= mysqli_num_rows($result3);
      $k=0;
      while($row3=mysqli_fetch_array($result3)){

      $ls3=$row3["status"];
      if(($ls3=="Return Received")||($ls3=="Return Initiated")){
      $k=$k+1;
      }

      }

      if($c==$k){
      $sql4= "UPDATE `order` SET `Status`='Return Initiated' WHERE `orderid`=$oid";
      $result4=$conn->query($sql4);
      }


header("Location: vorder.php#cart");
    exit;




?>