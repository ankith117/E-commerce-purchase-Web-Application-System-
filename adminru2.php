<?php include_once("header.html");?>


<?php

session_start();
$ls=$_SESSION["status"];

?>

<div class="container">
  <div class="row">
  <form action="" method='post' >

<?php

  echo '<div class="form-group">


   <p>Status </p> <input type="radio" name="ls" value="Return Initiated"'; if($ls=="Return Initiated"){echo' checked';}echo'> Return Initiated
  <input type="radio" name="ls" value="Return Received"'; if($ls=="Return Received"){echo' checked';}echo'> Return Received

    </div>';


?>


 <button type="submit" class="btn">Update</button>
</form>


</div>
</div>

<?php
      $lid=$_SESSION['lid'];
      $ls=$_POST['ls'];


      function check($question){
        return (!isset($question) || trim($question)==='');
     }

      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $change=0;
      $f=0;
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      if(!check($ls)){
       $sql1= "SELECT * FROM `line items` WHERE `line id`=$lid";
      $result1=$conn->query($sql1);
      $row1= mysqli_fetch_array($result1);
      $ols=$row1["status"];

      if($ls!=$ols){

      $sql= "UPDATE `line items` SET `status`='$ls' WHERE `line id`=$lid";
      $result=$conn->query($sql);
      $_SESSION['status']=$ls;
      $change=1;

      }else{
      $f=1;
      }
      }

      if($f==1){
      echo '<div><h4 style="margin-left: 55px;">No changes made!</h4></div>';
      }



     if($change !=0){
      echo "Updated details of the Item: <br />";
      $sql= "SELECT * FROM `line items` WHERE `line id`=$lid";
      $result=$conn->query($sql);
      $row= mysqli_fetch_array($result);
      $oid=$row["Orderid"];
      if($ls=="Return Received"){
      $sku=$row["SKU"];
      $sql2= "SELECT * FROM `item catalog` WHERE `sku`=$sku";
      $result2=$conn->query($sql2);
      $row2= mysqli_fetch_array($result2);
      $q=$row2["quantity"];
      $q=$q+1;

      $sql1= "UPDATE `item catalog` SET `quantity`=$q WHERE `sku`=$sku";
      $result1=$conn->query($sql1);
      $sql3= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
      $result3=$conn->query($sql3);
      $c= mysqli_num_rows($result3);
      $k=0;
      while($row3=mysqli_fetch_array($result3)){

      $ls3=$row3["status"];
      if($ls3=="Return Received"){
      $k=$k+1;
      }

      }

      if($c==$k){
      $sql4= "UPDATE `order` SET `Status`='Return Received' WHERE `orderid`=$oid";
      $result4=$conn->query($sql4);
      }
      }
      if($ls=="Return Initiated"){
      $sku=$row["SKU"];
      $sql2= "SELECT * FROM `item catalog` WHERE `sku`=$sku";
      $result2=$conn->query($sql2);
      $row2= mysqli_fetch_array($result2);
      $q=$row2["quantity"];
      $q=$q-1;
      $sql1= "UPDATE `item catalog` SET `quantity`=$q WHERE `sku`=$sku";
      $result1=$conn->query($sql1);
      $sql3= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
      $result3=$conn->query($sql3);
      $c= mysqli_num_rows($result3);
      $k=0;
      while($row3=mysqli_fetch_array($result3)){

      $ls3=$row3["status"];
      if(($ls3=="Return Received")||($ls3=="Return Initiated")){
      $k=$k+1;
      }

      }

      if($c==$k){
      $sql4= "UPDATE `order` SET `Status`='Return Initiated' WHERE `orderid`=$oid";
      $result4=$conn->query($sql4);
      }
      }

      echo '
      <table class="table table-striped">
      <tr>
      <th>Order ID</th>
      <th>Line ID</th>
      <th>UID</th>
      <th>SKU</th>
      <th>Status</th>
      </tr>';





      echo'  <tr>
           <td>' . $row["Orderid"]. '</td>
           <td>' .$lid . '</td>
           <td>' .$_SESSION["uid"]. '</td>
           <td>' . $row["SKU"]. '</td>
           <td>'.$row["status"].'</td>
          </tr>';



       echo "</table>



       ";

}


  ?>

  <a href='admin.php' class='alert alert-info btn btn-info' style="margin-bottom: 65px; margin-left: 55px;" >ADMIN CONTROL DESK</a>
<?php include_once("footer1.html");?>

$sqlb= "SELECT * FROM `billing address` WHERE `uid`=$uid";
    $resultb=$conn->query($sqlb);

    echo'

   <form>


  <div class="form w3-text-white">
  <h1>Choose Payment Card </h1>';

while($rowb= mysqli_fetch_array($resultb)){



   echo '<input type="radio" name="baid" value="'.$rowb["baid"].'"> s';

}
    echo '</div>';



