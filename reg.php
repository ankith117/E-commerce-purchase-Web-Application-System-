<?php
      $fname= $_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $uname=$_POST['uname'];
      $pass=$_POST['pass'];
      $ssa=$_POST['ssa'];
      $sc=$_POST['sc'];
      $ss=$_POST['ss'];
      $sz=$_POST['sz'];
      $bsa=$_POST['bsa'];
      $bc=$_POST['bc'];
      $bs=$_POST['bs'];
      $bz=$_POST['bz'];
      $ccn=$_POST['ccn'];
      $cvv=$_POST['cvv'];
      $cem=$_POST['cem'];
      $cey=$_POST['cey'];



      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";

      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      function check($question){
        return (!isset($question) || trim($question)==='');
     }


      if((!check($uname))&&(!check($fname))&&(!check($lname))&&(!check($email))&&(!check($pass))){


$sql= "select * from user where username='$uname'";
$r = $conn->query($sql);
$count  = mysqli_num_rows($r);
if($count==0) {

 $sql1= "insert into user values ('NULL','$uname', '$pass', '$email', '$fname', '$lname')";
      $result2=$conn->query($sql1);

  if($result2) {

  $sql1= "SELECT `uid` FROM `user` WHERE `username`='$uname'";
  $r1 = $conn->query($sql1);
  $result= mysqli_fetch_array($r1);
  $uid=$result["uid"];


  $sql2= "INSERT INTO `billing address`(`baid`, `street name`, `city`, `state`, `zip`, `credit card number`, `CVV`, `expiry month`, `expiry year`, `uid`) VALUES ('NULL','$bsa','$bc','$bs','$bz','$ccn','$cvv','$cem','$cey','$uid')";

  $r2 = $conn->query($sql2);


  $sql3= "INSERT INTO `shipping address`(`said`, `street name`, `city`, `state`, `zip`, `uid`) VALUES ('NULL','$ssa','$sc','$ss','$sz','$uid')";
  $r3 = $conn->query($sql3);

    header("Location: login1.php");
    exit;
}


} else {
    header("Location: login2.php?msg=f");
    exit;
}


}else {
    header("Location: login2.php?msg=e");
    exit;
}





  ?>