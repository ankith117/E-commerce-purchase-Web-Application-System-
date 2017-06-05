<?php include_once("header.html");?>

<?php
$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT * FROM `subscription template`";
      $result=$conn->query($sql);




echo '
      <table class="table table-striped">
      <tr>
      <th>Subscription Template ID</th>
      <th>Template ID</th>
      <th>Order ID</th>
      <th>User ID</th>
      <th>Business Address ID</th>
      <th>Shipping Address ID</th>
      </tr>';

while($row= mysqli_fetch_array($result)) {




echo'  <tr>
           <td>' . $row["subid"]. '</td>
           <td>' . $row["templateid"]. '</td>
           <td>' . $row["orderid"]. '</td>
           <td>' . $row["uid"]. '</td>
           <td>' . $row["baid"]. '</td>
           <td>' . $row["said"]. '</td>
          </tr>

      ';


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
