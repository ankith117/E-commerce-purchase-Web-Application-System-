<?php

session_start();

$subid=$_SESSION['subid'];



$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


      $sqle1="DROP EVENT IF EXISTS `".$subid."step1`";
     $re1=$conn->query($sqle1);

     $sqle2="DROP EVENT IF EXISTS `".$subid."step2`";
     $re2=$conn->query($sqle2);

     $sqle3="DROP EVENT IF EXISTS `".$subid."step3`";
     $re3=$conn->query($sqle3);

     $sqle4="DROP EVENT IF EXISTS `".$subid."step4`";
     $re4=$conn->query($sqle4);

     $sqle5="DROP EVENT IF EXISTS `".$subid."step5`";
     $re5=$conn->query($sqle5);

      $sql1= "DELETE FROM `subscription template` WHERE `subid`=$subid";
      $r=$conn->query($sql1);



header("Location: subtempdel.php");
    exit;



?>