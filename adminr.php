<?php include_once("header.html");?>

<?php
$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT * FROM `line items` WHERE `status`='Return Initiated'";
      $result=$conn->query($sql);


echo '<h1>Items</h1>';
echo '
      <table class="table table-striped">
      <tr>
      <th>Order ID</th>
      <th>Line ID</th>
      <th>UID</th>
      <th>SKU</th>
      <th>Status</th>
      </tr>';
      $f=0;

while($row= mysqli_fetch_array($result)) {

if(($oid!=$row["Orderid"])&&($f==1))
{$oid=$row["Orderid"];
$sql1= "SELECT * FROM `order` WHERE `orderid`=$oid";
      $result1=$conn->query($sql1);
      $row1= mysqli_fetch_array($result1);
      $uid=$row1["uid"];
}
if($f==0)
{$oid=$row["Orderid"];
$sql1= "SELECT * FROM `order` WHERE `orderid`=$oid";
      $result1=$conn->query($sql1);
       $row1= mysqli_fetch_array($result1);
      $uid=$row1["uid"];
$f=1;}

$lid=$row["line id"];



echo'  <tr>
           <td>' . $row["Orderid"]. '</td>
           <td>' .$lid . '</td>
           <td>' . $uid . '</td>
           <td>' . $row["SKU"]. '</td>
           <td>'.$row["status"].'</td>
          </tr>';


 }

 echo "</table>";

      $sql= "SELECT * FROM `order` WHERE `status`='Return Initiated'";
      $result=$conn->query($sql);

 echo '<h1>Orders</h1>';
 echo '
      <table class="table table-striped">
      <tr>
      <th>Order ID</th>

      <th>UID</th>

      <th>Status</th>
      </tr>';

      while($row= mysqli_fetch_array($result)) {



echo'  <tr>
           <td>' . $row["orderid"]. '</td>

           <td>' . $row["uid"] . '</td>
           <td>'.$row["Status"].'</td>
          </tr>';


 }

      echo "</table>";



 echo "<a href='admin.php' class='alert alert-info btn btn-info' >ADMIN CONTROL DESK</a>";




?>


<?php include_once("footer.html");?>
<html>




<body>




</body>
</html>
