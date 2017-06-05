<?php include_once("header.html");?>

<?php
$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT * FROM `item catalog`";
$result=$conn->query($sql);


echo '
<table class="table table-striped">
<tr>
<th>SKU </th>
<th>Category </th>
<th>Sub Category </th>
<th>Item name </th>
<th>Item description </th>
<th>Price </th>
<th>Quantity </th>

<th>Picture </th>
</tr>';

while($row= mysqli_fetch_array($result)) {



echo'  <tr>
     <td>' . $row["sku"]. '</td>
     <td>' . $row["Category"] . '</td>
     <td>' . $row["Sub Category"] . '</td>
     <td>' . $row["item name"] . '</td>
     <td>' . $row["item description"]. '</td>
     <td>$' . $row["price"] . '</td>
     <td>' . $row["quantity"] . '</td>


     <td>' . $row["Pic"] . '</td>
    </tr>

';

 }

 echo "</table>

 <a href='admin.php' class='alert alert-info btn btn-info' >ADMIN CONTROL DESK</a>
 ";


?>


<?php include_once("footer.html");?>
<html>




<body>




</body>
</html>
