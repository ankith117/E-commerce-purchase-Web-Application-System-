<?php

session_start();

     $sku= $_POST['sku'];


      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      $sql= "SELECT * FROM `item catalog` WHERE `sku`=$sku";
      $row = $conn->query($sql);
      $result= mysqli_fetch_array($row);
      $c  = mysqli_num_rows($row);

      if($c==0) {

      header("Location: adminu3.php?msg=m");
      exit;

      }

      else {

      $_SESSION["sku"]= $_POST['sku'];

      $_SESSION["itn"] = $result["item name"];
      $_SESSION["itd"] = $result["item description"];
      $_SESSION["itp"] = $result["price"];
      $_SESSION["itq"] = $result["quantity"];
      $_SESSION["itc"] = $result["Category"];
      $_SESSION["itsc"] = $result["Sub Category"];
      $_SESSION["itpi"] = $result["Pic"];

      if(strcmp($_SESSION["itc"],"Shoes")==0 && (strcmp($_SESSION["itsc"],"Men")==0 ) ){

  header("Location: adminu1.php?msg=a");
  exit;
}

      if(strcmp($_SESSION["itc"],"Shoes")==0 && (strcmp($_SESSION["itsc"],"Women")==0 ) ){

  header("Location: adminu1.php?msg=b");
  exit;
}

if(strcmp($_SESSION["itc"],"Shoes")==0 && (strcmp($_SESSION["itsc"],"Kids")==0 ) ){

  header("Location: adminu1.php?msg=c");
  exit;
}

if(strcmp($_SESSION["itc"],"Jeans")==0 && (strcmp($_SESSION["itsc"],"Men")==0 ) ){

  header("Location: adminu1.php?msg=d");
  exit;
}

if(strcmp($_SESSION["itc"],"Jeans")==0 && (strcmp($_SESSION["itsc"],"Women")==0 ) ){

  header("Location: adminu1.php?msg=e");
  exit;
}

if(strcmp($_SESSION["itc"],"Jeans")==0 && (strcmp($_SESSION["itsc"],"Kids")==0 ) ){

  header("Location: adminu1.php?msg=f");
  exit;
}

if(strcmp($_SESSION["itc"],"Shirts")==0 && (strcmp($_SESSION["itsc"],"Men")==0 ) ){

  header("Location: adminu1.php?msg=g");
  exit;
}

if(strcmp($_SESSION["itc"],"Shirts")==0 && (strcmp($_SESSION["itsc"],"Women")==0 ) ){

  header("Location: adminu1.php?msg=h");
  exit;
}

if(strcmp($_SESSION["itc"],"Shirts")==0 && (strcmp($_SESSION["itsc"],"Kids")==0 ) ){

  header("Location: adminu1.php?msg=i");
  exit;
}

      }


?>