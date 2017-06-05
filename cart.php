<?php

session_start();

   $uid=$_SESSION["uid"];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>

    *, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}

body {
background-color: black;
   background-image: url(bg7.png);
  font-family: 'Montserrat', sans-serif;
}

a {
  text-decoration: none;
  color: #1ab188;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  text-decoration: none;
}

.form {
  background:  rgba(19, 35, 47, 0.7);
  padding: 100px;
  max-width: 1000px;
  margin: 50px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #1ab188;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #ffffff;
}





.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}

.button-d1 {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #179b77;
}

.button-block {
  display: block;
  width: 100%;
}
.button-d {
  display: block;
  width: 100%;
  background: grey;
}
.forgot {
  margin-top: -20px;
  text-align: right;
}

select {
    width: 100%;
    font-size: 18px;
    padding: 20px 40px;
    border: solid-white;
    border-radius: 7px;
    background-color: rgba(19, 35, 47, 0.7);


}

  </style>


</head>

<body>

  <div class="form">
      <h1><a href="lindex.php"><i class="fa fa-user-circle-o w3-text-white"></i></a> Cart Items</h1>



<?php
$username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$cart=array_count_values($_SESSION['cart']);

if(empty($cart)){

echo '<h2 class="w3-text-white w3-center" id="cart">Your Cart is Empty</h2>';

}

else{

echo '<table class="w3-table w3-bordered w3-text-white">
<tr>
<th>Product</th>
<th>Item name</th>
<th>Price</th>
<th>Quantity</th>
<th>Total Price</th>

</tr>';




    foreach ($cart as $key => $value) {

    $sql= "SELECT * FROM `item catalog` WHERE `sku`=$key";
    $result=$conn->query($sql);

    $row= mysqli_fetch_array($result);
    $sku=$row["sku"];
      $itn=$row["item name"];
      $itd=$row["item description"];
      $itp=$row["price"];
      $itq=$row["quantity"];
      $itpi=$row["Pic"];
      $tp=$itp*$value;
      $ttp=$ttp+$tp;

      echo '<tr class="w3-text-white">
     <td><img src='.$itpi.' height="110px" width="110px"></td>
     <td>'.$itn.'</td>
     <td>$'.$itp.'</td>';
     if($itq>=$value){echo '<td>'.$value.'</td>';}
     else{echo '<td>'.$value.'<br><br><br><br> Available quantity = '.$itq.'<br><span class="w3-text-red">Please make necessary changes</span></td>';}
     echo '
     <td>$'.$tp.' <a href="remove.php?msg1='.$sku.'"><button class="w3-btn fa fa-remove  w3-closebtn w3-text-white w3-hover-text-red" style="background-color: rgba(19, 35, 47, 0.7)"></button></a></td>
    </tr>';
}
 $ss=$_SESSION["ss"];
 $sql1= "SELECT `tax%` FROM `sales tax` WHERE `state name`='$ss'";
    $result1=$conn->query($sql1);
    $row1= mysqli_fetch_array($result1);
    $tax=$row1["tax%"];
    $tax=($tax/100);
    $tax=($tax*$ttp);
    $fp=$ttp+$tax;
    $_SESSION["fp"]=$fp;


echo '<tr class="w3-text-white">
     <td></td>
     <td></td>
     <td></td>
     <td>Total price: <br> Tax: <br> Final Price:</td>
     <td> $'.$ttp.' <br> $'.$tax.' <br> $'.$fp.' </td>
    </tr>


</table>

<br>
<br>
<br>';



$sqlb= "SELECT * FROM `billing address` WHERE `uid`=$uid";
    $resultb=$conn->query($sqlb);


    echo'

   <form action="order.php" method="post">


  <div class="form w3-text-white">
  <h1>Choose Payment Card </h1>';

while($rowb= mysqli_fetch_array($resultb)){



   echo '<h4><input type="radio" name="baid" value="'.$rowb["baid"].'" checked> '.$rowb["credit card number"].'<br><br></h4>';

}
    echo '</div>';

    $sqls= "SELECT * FROM `shipping address` WHERE `uid`=$uid";
    $results=$conn->query($sqls);


    echo'




  <div class="form w3-text-white">
  <h1>Choose Shipping Address </h1>';

while($rows= mysqli_fetch_array($results)){



   echo '<input type="radio" name="said" value="'.$rows["said"].'" checked><br> '.$rows["street name"].'<br>'.$rows["city"].'<br>'.$rows["state"].'<br>'.$rows["zip"].'<br><hr>';

}
    echo '</div>';


echo'




  <div class="form w3-text-white">
  <h1>Subscription </h1>
  <select name="subm" class="w3-text-white">
            <option value="0" selected>Subscription Frequency</option>
            <option value="1" >2 months</option>
            <option value="2" >4 months</option>
            <option value="3" >6 months</option>
            </select>
            <br>
          </div>';





if($itq>=$value){
echo '<button type="submit" class="button button-block"/>Check out <span class="fa fa-shopping-cart w3-text-white"></span></button>';
}
else{
 echo'<a href="#"><button type="submit" class="button-d1 button-block button-d" disabled>Check out <span class="fa fa-shopping-cart w3-text-white"></span></button></a>';
}

}

?>
</form>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>
</html>
