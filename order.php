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

$cart=array_count_values($_SESSION['cart']);



$uid=$_SESSION['uid'];
date_default_timezone_set("America/Chicago");
$d= date('m-d-y');

$sql1= "INSERT INTO `order`(`orderid`, `uid`, `Date`, `Status`) VALUES ('NULL',$uid,'$d','Pending')";



if ($conn->query($sql1) === TRUE) {
    $oid = $conn->insert_id;
}

$_SESSION['oid']= $oid;
$oid=$_SESSION['oid'];

if($subm==0){

foreach ($cart as $key => $value) {

for($i=0;$i<$value;$i++){
$sql1= "INSERT INTO `line items`(`line id`, `Orderid`, `SKU`, `status`) VALUES ('NULL',$oid,$key,'Order Placed')";
      $result2=$conn->query($sql1);
      }
}

$uid=$_SESSION['uid'];

$sql1= "INSERT INTO `shipment`(`shipid`, `Status`, `orderid`, `said`, `baid`, `uid`) VALUES ('NULL','Picked',$oid,$said,$baid,$uid)";
      if ($conn->query($sql1) === TRUE) {
    $shid = $conn->insert_id;
}
$_SESSION['shid']= $shid;

header("Location: checkout.php");
    exit;

}

if($subm!=0){

$sqlsub= "INSERT INTO `subscription template`(`subid`, `templateid`, `orderid`, `uid`, `baid`, `said`, `order status`)
        VALUES ('null',$subm,$oid,$uid,$baid,$said,'Picked')";
      if ($conn->query($sqlsub) === TRUE) {
    $subid = $conn->insert_id;
}

$_SESSION['subid']= $subid;

foreach ($cart as $key => $value) {
for($i=0;$i<$value;$i++){
$sqlsub1= "INSERT INTO `subscription line items`(`sub line id`, `subid`, `orderid`, `sku`, `sublstatus`)
        VALUES ('null',$subid,$oid,$key,'Order Placed')";
      $result2=$conn->query($sqlsub1);
      }


}

date_default_timezone_set("America/Chicago");
$da= date('Y-m-d');
$t=localtime();

if($subm==1){



$sqle1="CREATE EVENT `".$subid."step1` ON SCHEDULE EVERY 2 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `order`(`orderid`, `uid`, `Date`, `Status`)
     VALUES ('null',$uid,DATE_FORMAT(NOW(),'%m-%d-%y'),'Pending')";
     $re1=$conn->query($sqle1);
     $t[0]=$t[0]+1;

     $sqle2="CREATE EVENT `".$subid."step2` ON SCHEDULE EVERY 2 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `subscription template`
     SET `orderid`=(SELECT MAX(`orderid`) FROM `order`) WHERE `subid`=$subid";

     $re2=$conn->query($sqle2);
     $t[0]=$t[0]+1;

     $sqle3="CREATE EVENT `".$subid."step3` ON SCHEDULE EVERY 2 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `shipment`(`Status`, `orderid`, `said`, `baid`, `uid`)
     SELECT `order status`, `orderid`, `said`, `baid`, `uid` FROM `subscription template` WHERE `subid`=$subid";
     $re3=$conn->query($sqle3);
      $t[0]=$t[0]+1;

     $sqle4="CREATE EVENT `".$subid."step4` ON SCHEDULE EVERY 2 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `subscription line items` SET
     `orderid`=(SELECT `orderid` FROM `subscription template` WHERE `subid`=$subid) WHERE subid=$subid";
     $re4=$conn->query($sqle4);
     $t[0]=$t[0]+1;

     $sqle5="CREATE EVENT `".$subid."step5` ON SCHEDULE EVERY 2 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `line items`(`Orderid`, `SKU`, `status`)
     SELECT `orderid`, `sku`, `sublstatus` FROM `subscription line items` WHERE subid=$subid";
     $re5=$conn->query($sqle5);

     }

     if($subm==2){



     $sqle1="CREATE EVENT `".$subid."step1` ON SCHEDULE EVERY 4 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `order`(`orderid`, `uid`, `Date`, `Status`)
     VALUES ('null',$uid,DATE_FORMAT(NOW(),'%m-%d-%y'),'Pending')";
     $re1=$conn->query($sqle1);
      $t[0]=$t[0]+1;

     $sqle2="CREATE EVENT `".$subid."step2` ON SCHEDULE EVERY 4 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `subscription template`
     SET `orderid`=(SELECT MAX(`orderid`) FROM `order`) WHERE `subid`=$subid";

     $re2=$conn->query($sqle2);
      $t[0]=$t[0]+1;

     $sqle3="CREATE EVENT `".$subid."step3` ON SCHEDULE EVERY 4 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `shipment`(`Status`, `orderid`, `said`, `baid`, `uid`)
     SELECT `order status`, `orderid`, `said`, `baid`, `uid` FROM `subscription template` WHERE `subid`=$subid";
     $re3=$conn->query($sqle3);
      $t[0]=$t[0]+1;

     $sqle4="CREATE EVENT `".$subid."step4` ON SCHEDULE EVERY 4 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `subscription line items` SET
     `orderid`=(SELECT `orderid` FROM `subscription template` WHERE `subid`=$subid) WHERE subid=$subid";
     $re4=$conn->query($sqle4);
     $t[0]=$t[0]+1;

     $sqle5="CREATE EVENT `".$subid."step5` ON SCHEDULE EVERY 4 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `line items`(`Orderid`, `SKU`, `status`)
     SELECT `orderid`, `sku`, `sublstatus` FROM `subscription line items` WHERE subid=$subid";
     $re5=$conn->query($sqle5);


     }

     if($subm==3){



     $sqle1="CREATE EVENT `".$subid."step1` ON SCHEDULE EVERY 6 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `order`(`orderid`, `uid`, `Date`, `Status`)
     VALUES ('null',$uid,DATE_FORMAT(NOW(),'%m-%d-%y'),'Pending')";
     $re1=$conn->query($sqle1);
      $t[0]=$t[0]+1;

     $sqle2="CREATE EVENT `".$subid."step2` ON SCHEDULE EVERY 6 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `subscription template`
     SET `orderid`=(SELECT MAX(`orderid`) FROM `order`) WHERE `subid`=$subid";

     $re2=$conn->query($sqle2);
      $t[0]=$t[0]+1;

     $sqle3="CREATE EVENT `".$subid."step3` ON SCHEDULE EVERY 6 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `shipment`(`Status`, `orderid`, `said`, `baid`, `uid`)
     SELECT `order status`, `orderid`, `said`, `baid`, `uid` FROM `subscription template` WHERE `subid`=$subid";
     $re3=$conn->query($sqle3);
      $t[0]=$t[0]+1;

     $sqle4="CREATE EVENT `".$subid."step4` ON SCHEDULE EVERY 6 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `subscription line items` SET
     `orderid`=(SELECT `orderid` FROM `subscription template` WHERE `subid`=$subid) WHERE subid=$subid";
     $re4=$conn->query($sqle4);
      $t[0]=$t[0]+1;


     $sqle5="CREATE EVENT `".$subid."step5` ON SCHEDULE EVERY 6 MINUTE STARTS '".$d." ".$t[2].":".$t[1].":".$t[0].".000000'
     ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `line items`(`Orderid`, `SKU`, `status`)
     SELECT `orderid`, `sku`, `sublstatus` FROM `subscription line items` WHERE subid=$subid";
     $re5=$conn->query($sqle5);
     }


}

header("Location: subcheckout.php");
    exit;
?>