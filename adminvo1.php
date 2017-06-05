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

      $sql= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
      $row = $conn->query($sql);
      $result= mysqli_fetch_array($row);
      $c  = mysqli_num_rows($row);

      if($c==0) {

      header("Location: adminvo.php?msg=m");
      exit;

      }

      else {




      $_SESSION['oid']=$oid;

      $sql1= "SELECT * FROM `order` WHERE `orderid`=$oid";
      $result1=$conn->query($sql1);
       $row1= mysqli_fetch_array($result1);
      $uid=$row1["uid"];
      $_SESSION["uid"] = $uid;



      header("Location: adminvo2.php");
      exit;
      }


?>