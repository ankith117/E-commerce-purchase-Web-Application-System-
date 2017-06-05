<?php
      $oid= $_POST['oid'];



      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $change=0;
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      $flag=0;

      $sql2= "SELECT * FROM `order` WHERE `orderid`=$oid";
      $r2=$conn->query($sql2);
      $c  = mysqli_num_rows($r2);

      $sql1= "DELETE FROM `order` WHERE `orderid`=$oid";
      $result2=$conn->query($sql1);


      if($c==0) {

      header("Location: adminod.php?msg=f");
      exit;

      }

      else{

      header("Location: adminod.php?msg=d");
      exit;

      }



?>