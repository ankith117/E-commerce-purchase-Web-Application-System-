<?php
      $sku= $_POST['sku'];



      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $change=0;
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      $flag=0;

      $sql2= "SELECT * FROM `item catalog` WHERE `sku`=$sku";
      $r2=$conn->query($sql2);
      $c  = mysqli_num_rows($r2);

      $sql1= "DELETE FROM `item catalog` WHERE `sku`=$sku";
      $result2=$conn->query($sql1);


      if($c==0) {

      header("Location: admind.php?msg=f");
      exit;

      }

      else{

      header("Location: admind.php?msg=d");
      exit;

      }



?>
