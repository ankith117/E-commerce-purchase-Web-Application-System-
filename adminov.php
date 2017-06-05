<?php include_once("header.html");?>

<?php
$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT * FROM `shipment`";
      $result=$conn->query($sql);
      $sql1= "SELECT * FROM `order`";
      $result1=$conn->query($sql1);



echo '
      <table class="table table-striped">
      <tr>
      <th>Order ID</th>
      <th>Order Status</th>
      <th>Order Date</th>
      <th>Shipping ID</th>
      <th>Shipping Status</th>
      <th>User ID</th>
      </tr>';

while($row= mysqli_fetch_array($result)) {
$row1= mysqli_fetch_array($result1);

if($row1["orderid"]==$row["orderid"]){

echo'  <tr>
           <td>' . $row1["orderid"]. '</td>
           <td>' . $row1["Status"]. '</td>
           <td>' . $row1["Date"]. '</td>
           <td>' . $row["shipid"]. '</td>
           <td>' . $row["Status"]. '</td>
           <td>' . $row["uid"]. '</td>
          </tr>

      ';
 }

 }

 echo "</table>

 <a href='admin.php' class='alert alert-info btn btn-info' >ADMIN CONTROL DESK</a>
 ";


?>


<?php include_once("footer1.html");?>
<html>




<body>




</body>
</html>
