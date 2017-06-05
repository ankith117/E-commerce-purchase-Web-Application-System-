<?php
session_start();

      $bsa=$_POST['bsa'];
      $bc=$_POST['bc'];
      $bs=$_POST['bs'];
      $bz=$_POST['bz'];
      $ccn=$_POST['ccn'];
      $cvv=$_POST['cvv'];
      $cem=$_POST['cem'];
      $cey=$_POST['cey'];
      $uid=$_SESSION["uid"];



      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";

      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }








  $sql2= "INSERT INTO `billing address`(`baid`, `street name`, `city`, `state`, `zip`, `credit card number`, `CVV`, `expiry month`, `expiry year`, `uid`) VALUES ('NULL','$bsa','$bc','$bs','$bz','$ccn','$cvv','$cem','$cey','$uid')";

  $r2 = $conn->query($sql2);




    header("Location: addc.html");
    exit;








  ?>