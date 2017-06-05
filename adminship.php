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

      $sql= "SELECT * FROM `order` WHERE `orderid`=$oid";
      $row = $conn->query($sql);
      $result= mysqli_fetch_array($row);
      $c  = mysqli_num_rows($row);

      if($c==0) {

      header("Location: adminship3.php?msg=m");
      exit;

      }

      else {

      $_SESSION["oid"]= $_POST['oid'];

      $_SESSION["os"] = $result["Status"];
      $_SESSION["uid"] = $result["uid"];

      $sql= "SELECT * FROM `shipment` WHERE `orderid`=$oid";
      $row = $conn->query($sql);
      $result1= mysqli_fetch_array($row);

      $_SESSION["ships"] = $result1["Status"];
      $_SESSION["shid"] = $result1["shipid"];

      if(strcmp($_SESSION["ships"],"Picked")==0){

      if(strcmp($_SESSION["os"],"Pending")==0){

  header("Location: adminship1.php?msg=pi&o=pe");
  exit;
}
if(strcmp($_SESSION["os"],"Shipped")==0){

  header("Location: adminship1.php?msg=pi&o=s");
  exit;
}
if(strcmp($_SESSION["os"],"Invoiced")==0){

  header("Location: adminship1.php?msg=pi&o=i");
  exit;
}
if(strcmp($_SESSION["os"],"Return Initiated")==0){

  header("Location: adminship1.php?msg=pi&o=r");
  exit;
}
if(strcmp($_SESSION["os"],"Return Received")==0){

  header("Location: adminship1.php?msg=pi&o=rr");
  exit;
}
}

      if(strcmp($_SESSION["ships"],"Shipped")==0){

      if(strcmp($_SESSION["os"],"Pending")==0){

  header("Location: adminship1.php?msg=s&o=pe");
  exit;
}
if(strcmp($_SESSION["os"],"Shipped")==0){

  header("Location: adminship1.php?msg=s&o=s");
  exit;
}
if(strcmp($_SESSION["os"],"Invoiced")==0){

  header("Location: adminship1.php?msg=s&o=i");
  exit;
}
if(strcmp($_SESSION["os"],"Return Initiated")==0){

  header("Location: adminship1.php?msg=s&o=r");
  exit;
}
if(strcmp($_SESSION["os"],"Return Received")==0){

  header("Location: adminship1.php?msg=s&o=rr");
  exit;
}
}

if(strcmp($_SESSION["ships"],"Packed")==0){

      if(strcmp($_SESSION["os"],"Pending")==0){

  header("Location: adminship1.php?msg=pa&o=pe");
  exit;
}
if(strcmp($_SESSION["os"],"Shipped")==0){

  header("Location: adminship1.php?msg=pa&o=s");
  exit;
}
if(strcmp($_SESSION["os"],"Invoiced")==0){

  header("Location: adminship1.php?msg=pa&o=i");
  exit;
}
if(strcmp($_SESSION["os"],"Return Initiated")==0){

  header("Location: adminship1.php?msg=pa&o=r");
  exit;
}
if(strcmp($_SESSION["os"],"Return Received")==0){

  header("Location: adminship1.php?msg=pa&o=rr");
  exit;
}
}

      }


?>