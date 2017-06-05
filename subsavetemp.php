<?php

session_start();

$baid = $_POST["baid"];
$said = $_POST["said"];
$subm = $_POST["subm"];



$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$subcart=array_count_values($_SESSION['subcart']);



$uid=$_SESSION['uid'];
$subid=$_SESSION['subid'];
$oid=$_SESSION['oid'];

if($_SESSION['subbaid']!=$baid){

   $sb= "UPDATE `subscription template` SET `baid`=$baid WHERE `subid`=$subid";
      $rb=$conn->query($sb);

}

if($_SESSION['subsaid']!=$said){


   $ss= "UPDATE `subscription template` SET `said`=$said WHERE `subid`=$subid";
      $rs=$conn->query($ss);

}

if($_SESSION['subtid']!=$subm){


   $st= "UPDATE `subscription template` SET `templateid`=$subm WHERE `subid`=$subid";
      $rt=$conn->query($st);

}

$sd= "DELETE FROM `subscription line items` WHERE `subid`=$subid";
      $rd=$conn->query($sd);


foreach ($subcart as $key => $value) {

for($i=0;$i<$value;$i++){
$sql1= "INSERT INTO `subscription line items`(`sub line id`, `subid`, `orderid`, `sku`, `sublstatus`) VALUES ('NULL',$subid,$oid,$key,'Order Placed')";

      $result2=$conn->query($sql1);
      }

}

if($_SESSION['subtid']!=$subm){


if($subm==1){



     $sqle1="ALTER EVENT `".$subid."step1` ON SCHEDULE EVERY 2 MINUTE";
     $re1=$conn->query($sqle1);

     $sqle2="ALTER EVENT `".$subid."step2` ON SCHEDULE EVERY 2 MINUTE";
     $re2=$conn->query($sqle2);

     $sqle3="ALTER EVENT `".$subid."step3` ON SCHEDULE EVERY 2 MINUTE";
     $re3=$conn->query($sqle3);

     $sqle4="ALTER EVENT `".$subid."step4` ON SCHEDULE EVERY 2 MINUTE";
     $re4=$conn->query($sqle4);

     $sqle5="ALTER EVENT `".$subid."step5` ON SCHEDULE EVERY 2 MINUTE";
     $re5=$conn->query($sqle5);

     }

     if($subm==2){



     $sqle1="ALTER EVENT `".$subid."step1` ON SCHEDULE EVERY 4 MINUTE";
     $re1=$conn->query($sqle1);

     $sqle2="ALTER EVENT `".$subid."step2` ON SCHEDULE EVERY 4 MINUTE";
     $re2=$conn->query($sqle2);

     $sqle3="ALTER EVENT `".$subid."step3` ON SCHEDULE EVERY 4 MINUTE";
     $re3=$conn->query($sqle3);

     $sqle4="ALTER EVENT `".$subid."step4` ON SCHEDULE EVERY 4 MINUTE";
     $re4=$conn->query($sqle4);

     $sqle5="ALTER EVENT `".$subid."step5` ON SCHEDULE EVERY 4 MINUTE";
     $re5=$conn->query($sqle5);

     }

     if($subm==3){



     $sqle1="ALTER EVENT `".$subid."step1` ON SCHEDULE EVERY 6 MINUTE";
     $re1=$conn->query($sqle1);

     $sqle2="ALTER EVENT `".$subid."step2` ON SCHEDULE EVERY 6 MINUTE";
     $re2=$conn->query($sqle2);

     $sqle3="ALTER EVENT `".$subid."step3` ON SCHEDULE EVERY 6 MINUTE";
     $re3=$conn->query($sqle3);

     $sqle4="ALTER EVENT `".$subid."step4` ON SCHEDULE EVERY 6 MINUTE";
     $re4=$conn->query($sqle4);

     $sqle5="ALTER EVENT `".$subid."step5` ON SCHEDULE EVERY 6 MINUTE";
     $re5=$conn->query($sqle5);

     }

}


header("Location: subtempdone.php");
    exit;
?>