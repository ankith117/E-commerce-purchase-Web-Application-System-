<?php include_once("header.html");?>


<?php
$m=0;
$o=0;
if (isset($_GET["msg"]) && $_GET["msg"] == 'pi') {
  $m=1;
}

if ($_GET["msg"] == 'pa') {
  $m=2;
}

if ($_GET["msg"] == 's') {
  $m=3;
}
if ($_GET["o"] == 'pe') {
  $o=1;
}
if ($_GET["o"] == 's') {
  $o=2;
}
if ($_GET["o"] == 'i') {
  $o=3;
}
if ($_GET["o"] == 'r') {
  $o=4;
}
if ($_GET["o"] == 'rr') {
  $o=5;
}
session_start();

?>

<div class="container">
  <div class="row">
  <form action="" method='post' >

<?php

    if($o==1){
  echo '<div class="form-group">


   <p>Status: </p> <input type="radio" name="os" value="Pending" checked> Pending
  <input type="radio" name="os" value="Shipped"> Shipped
  <input type="radio" name="os" value="Invoiced" > Invoiced
  <input type="radio" name="os" value="Return Initiated" > Return Initiated
  <input type="radio" name="os" value="Return Received" > Return Received
    </div>';
    }

    if($o==2){
  echo '<div class="form-group">


   <p>Status: </p> <input type="radio" name="os" value="Pending" > Pending
  <input type="radio" name="os" value="Shipped" checked> Shipped
  <input type="radio" name="os" value="Invoiced" > Invoiced
  <input type="radio" name="os" value="Return Initiated" > Return Initiated
  <input type="radio" name="os" value="Return Received" > Return Received
    </div>';
    }

    if($o==3){
  echo '<div class="form-group">


   <p>Status: </p> <input type="radio" name="os" value="Pending" > Pending
  <input type="radio" name="os" value="Shipped"> Shipped
  <input type="radio" name="os" value="Invoiced" checked> Invoiced
  <input type="radio" name="os" value="Return Initiated" > Return Initiated
  <input type="radio" name="os" value="Return Received" > Return Received
    </div>';
    }

    if($o==4){
  echo '<div class="form-group">


   <p>Status: </p> <input type="radio" name="os" value="Pending" > Pending
  <input type="radio" name="os" value="Shipped"> Shipped
  <input type="radio" name="os" value="Invoiced" > Invoiced
  <input type="radio" name="os" value="Return Initiated" checked> Return Initiated
  <input type="radio" name="os" value="Return Received" > Return Received
    </div>';
    }

    if($o==5){
  echo '<div class="form-group">


   <p>Status: </p> <input type="radio" name="os" value="Pending" > Pending
  <input type="radio" name="os" value="Shipped"> Shipped
  <input type="radio" name="os" value="Invoiced" > Invoiced
  <input type="radio" name="os" value="Return Initiated" > Return Initiated
  <input type="radio" name="os" value="Return Received" checked> Return Received
    </div>';
    }


    if($m==1){
  echo '<div class="form-group">


   <p>Status: </p> <input type="radio" name="ships" value="Picked" checked> Picked
  <input type="radio" name="ships" value="Packed"> Packed
  <input type="radio" name="ships" value="Shipped" > Shipped
    </div>';
    }

    if($m==2){
  echo '<div class="form-group">


   <p>Status </p> <input type="radio" name="ships" value="Picked" > Picked
  <input type="radio" name="ships" value="Packed" checked> Packed
  <input type="radio" name="ships" value="Shipped" > Shipped
    </div>';
    }

    if($m==3){
  echo '<div class="form-group">


   <p>Status </p> <input type="radio" name="ships" value="Picked" > Picked
  <input type="radio" name="ships" value="Packed" > Packed
  <input type="radio" name="ships" value="Shipped" checked > Shipped
    </div>';
    }

?>


 <button type="submit" class="btn">Update</button>
</form>


</div>
</div>

<?php
      $shid=$_SESSION['shid'];
      $ships=$_POST['ships'];
      $os=$_POST['os'];
      $oid=$_SESSION['oid'];
      $uid=$_SESSION['uid'];

      function check($question){
        return (!isset($question) || trim($question)==='');
     }

      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $change=0;
      $k=0;
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      if(!check($os)){
      $sql1= "SELECT * FROM `order` WHERE `orderid`=$oid";
      $result1=$conn->query($sql1);
      $row1= mysqli_fetch_array($result1);
      $oos=$row1["Status"];

      if($os!=$oos){

      $sql1= "UPDATE `order` SET `Status`='$os' WHERE `orderid`=$oid";
      $result2=$conn->query($sql1);
      $_SESSION['os']=$os;
      $change=1;
      $k=1;


      }
      }


      if(!check($ships)){
      $sql1= "UPDATE `shipment` SET `Status`='$ships' WHERE `shipid`=$shid";
      $result2=$conn->query($sql1);
      $_SESSION['ships']=$ships;
      $change=1;


      }




     if($change !=0){
     if(($os=="Return Received")&&($k==1)){
     $sql4= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
      $result4=$conn->query($sql4);
      while($row4= mysqli_fetch_array($result4)){
      $lid1=$row4["line id"];
      $ls=$row4["status"];
      if($ls!="Return Received"){
      $sql5= "UPDATE `line items` SET `status`='Return Received' WHERE `line id`=$lid1";
      $result5=$conn->query($sql5);
      $sku=$row4["SKU"];
      $sql6= "SELECT * FROM `item catalog` WHERE `sku`=$sku";
      $result6=$conn->query($sql6);
      $row6= mysqli_fetch_array($result6);
      $q=$row6["quantity"];
      $q=$q+1;
      $sql7= "UPDATE `item catalog` SET `quantity`=$q WHERE `sku`=$sku";
      $result7=$conn->query($sql7);
      }
      }
      }
      if(($os=="Return Initiated")&&($k==1)){
     $sql4= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
      $result4=$conn->query($sql4);
      while($row4= mysqli_fetch_array($result4)){
      $lid1=$row4["line id"];
      $ls=$row4["status"];
       if(($ls!="Return Received")&&($ls!="Return Initiated")){
      $sql5= "UPDATE `line items` SET `status`='Return Initiated' WHERE `line id`=$lid1";
      $result5=$conn->query($sql5);

      }
      }

     }
      echo "Updated details of the Item: <br />";
      $sql= "SELECT * FROM `shipment` WHERE `shipid`=$shid";
      $result=$conn->query($sql);
      $sql1= "SELECT * FROM `order` WHERE `orderid`=$oid";
      $result1=$conn->query($sql1);
      $row1= mysqli_fetch_array($result1);

      echo '
      <table class="table table-striped">
      <tr>
      <th>Order ID</th>
      <th>Order Status</th>
      <th>Shipping ID</th>
      <th>Shipping Status</th>
      <th>User ID</th>
      </tr>';

      while($row= mysqli_fetch_array($result)) {



      echo'  <tr>
           <td>' . $row1["orderid"]. '</td>
           <td>' . $row1["Status"]. '</td>
           <td>' . $row["shipid"]. '</td>
           <td>' . $row["Status"]. '</td>
           <td>' . $row["uid"]. '</td>
          </tr>

      ';

       }

       echo "</table>



       ";

}


  ?>

  <a href='admin.php' class='alert alert-info btn btn-info' style="margin-bottom: 20px; margin-left: 55px;" >ADMIN CONTROL DESK</a>
  <a href='atrack.php' class='alert alert-info btn btn-info' style="margin-bottom: 20px; margin-left: 30px;" >TRACK ORDER</a>
<?php include_once("footer1.html");?>