<?php
$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$lid=$_Post["msg"];

$ls = $_POST["ls"];

$sql= "UPDATE `line items` SET `status`='$ls' WHERE `line id`=$lid";
      $result=$conn->query($sql);

echo $sql;
    ?>