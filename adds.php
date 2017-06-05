<?php
session_start();
      $ssa=$_POST['ssa'];
      $sc=$_POST['sc'];
      $ss=$_POST['ss'];
      $sz=$_POST['sz'];
       $uid=$_SESSION["uid"];




      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";

      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }









  $sql3= "INSERT INTO `shipping address`(`said`, `street name`, `city`, `state`, `zip`, `uid`) VALUES ('NULL','$ssa','$sc','$ss','$sz','$uid')";
  $r3 = $conn->query($sql3);

    header("Location: addc.html");
    exit;





  ?>