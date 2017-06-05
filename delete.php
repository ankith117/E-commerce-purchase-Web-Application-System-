<?php
session_start();



$name = $_POST["un"];
$pass = $_POST["pa"];







$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}



if(($_SESSION["u"]===$name)&&($_SESSION["p"]===$pass)) {

     $sql= "DELETE FROM `user` WHERE username='$name' and password='$pass'";
     $row = $conn->query($sql);
     session_destroy();
    header("Location: login1 copy 2.html");
    exit;

} else {
header("Location: updel2.php?msg=fail");
    exit;

}



 ?>