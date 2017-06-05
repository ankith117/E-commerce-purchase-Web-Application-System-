<?php
  session_start();
  $u=$_SESSION['u'];

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

}


.form {
  background:  rgba(19, 35, 47, 0.7);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
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

  color: #ffffff;
  font-weight: 300;
  margin: 0 0 0px;
}

h4 {
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 20px;
}

p {
  border-style: solid;
  padding: 5px;
  border-width: 1px;
  border-color: white;
  color: #ffffff;
  font-weight: 300;
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

input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
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
  font-size: 1.5rem;
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

.forgot {
  margin-top: -20px;
  text-align: right;
}

  </style>


</head>

<body>
  <div class="form">



        <div id="login">
            <div>
          <h1 class="w3-center" style="font-size: 50px"><a href="lindex.php"><i class="fa fa-user-circle-o w3-text-white"></i></a> Hi <?php echo $u ?>!</h1>
            </div>
            <br>
            <div class="w3-center">
            <h3 class="w3-text-white"> Previous Order Detials: </h3>
            <hr>

            <?php
            $username = "user";
            $password = "abcd";
            $dbname = "projectdb";
            $conn = new mysqli("localhost", $username, $password, $dbname);
            if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
            }

            $uid=$_SESSION['uid'];

            $sql= "SELECT * FROM `shipment` WHERE `uid`=$uid";
            $result=$conn->query($sql);
            while($row= mysqli_fetch_array($result)){

            $oid=$row["orderid"];
            $shid=$row["shipid"];

            echo '<h6 class="w3-text-white">Order ID: '.$oid.'</h6>

            <h6 class="w3-text-white">Shipping ID: '.$shid.'</h6>
            <hr>';
            }


            $sql1= "SELECT * FROM `subscription template` WHERE `uid`=$uid";
            $result1=$conn->query($sql1);
            $c  = mysqli_num_rows($result1);
            if($c!=0){

            echo '<h3 class="w3-text-white"> Subscription Template ID: </h3><hr>';

            while($row1= mysqli_fetch_array($result1)){

            $oid=$row1["orderid"];
            $subid=$row1["subid"];

            echo '<h6 class="w3-text-white">Order ID: '.$oid.'</h6>
                 <h6 class="w3-text-white">Subscription Template ID: '.$subid.'</h6>
                 <hr>';
            }
            }


            ?>
                </div><br>


          <a href="javascript:void(0)" class="w3-padding" onclick="document.getElementById('vo').style.display='block'"><button class="button button-block"/>View order</button></a>
          <a href="javascript:void(0)" class="w3-padding" onclick="document.getElementById('ship').style.display='block'"><button class="button button-block"/>Track order</button></a>
          <?php

          if($c!=0){

          echo '<a href="javascript:void(0)" class="w3-padding" onclick="'; echo "document.getElementById('sub').style.display='block'";echo'"><button class="button button-block"/>Edit Subscription template</button></a>';
          }

          ?>


            <form action="updel.php" method="post">

          <button class="button button-block"/>Update/Delete Profile</button>

          </form><br>

            <form action="logout.php" method="post">

          <button class="button button-block"/>Log Out <i class="fa fa-power-off w3-text-white"></i></button>

          </form>

        </div>

        <!-- tab-content -->

</div> <!-- /form -->

<div id="ship" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('ship').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <span><h1 class="w3-wide w3-text-black" style="margin-left: 70px;"> Track Order</h1></span>
      <p class="w3-text-black">Please enter your Order ID</p>
      <form action="ltrack.php" method="post">
      <p><input class="w3-input w3-border w3-text-black" name="oid" type="text" placeholder="Order ID"></p>
      <button type="submit" class="w3-btn w3-padding-large w3-green w3-text-white w3-margin-bottom" onclick="document.getElementById('ship').style.display='none'">Track Order</button>
      </form>
    </div>
  </div>
</div>

<div id="vo" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('vo').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <span><h1 class="w3-wide w3-text-black" style="margin-left: 70px;"> View Order</h1></span>
      <p class="w3-text-black">Please enter your Order ID</p>
      <form action="checkvo.php" method="post">
      <p><input class="w3-input w3-border w3-text-black" name="oid" type="text" placeholder="Order ID"></p>
      <button type="submit" class="w3-btn w3-padding-large w3-green w3-text-white w3-margin-bottom" onclick="document.getElementById('vo').style.display='none'">View Order</button>
      </form>
    </div>
  </div>
</div>

<div id="sub" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('sub').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <span><h1 class="w3-wide w3-text-black" style="margin-left: 70px;"> Edit Subscription Template</h1></span>
      <p class="w3-text-black">Please enter your Subscription template ID</p>
      <form action="subtedit.php" method="post">
      <p><input class="w3-input w3-border w3-text-black" name="subid" type="text" placeholder="Subscription Template ID"></p>
      <button type="submit" class="w3-btn w3-padding-large w3-green w3-text-white w3-margin-bottom" onclick="document.getElementById('sub').style.display='none'">Edit Template</button>
      </form>
    </div>
  </div>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>
</html>
