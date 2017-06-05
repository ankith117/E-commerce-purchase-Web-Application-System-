<?php

            $username = "user";
            $password = "abcd";
            $dbname = "projectdb";
            $conn = new mysqli("localhost", $username, $password, $dbname);
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
             }

session_start();

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
  color: #179b77;
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

      <ul class="tab-group">
          <li class="tab active"><a href="#card">Card</a></li>
        <li class="tab"><a href="#shipping">Shipping Address</a></li>

      </ul>

      <div class="tab-content">

        <div id="card">

            <form action="addc.php" method="post">

            <h1><a href="lindex.php"><i class="fa fa-user-circle-o w3-text-white"></i></a> Billing Address</h1>

          <div class="field-wrap">
            <label>
              Street Address<span class="req">*</span>
            </label>
            <input type="text" name="bsa" pattern="[A-Za-z0-9\s]{1,100}" title="Please enter Address (Max 100 characters)" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              City<span class="req">*</span>
            </label>
            <input type="text" name="bc" pattern="[A-Za-z]{1,50}" title="Please enter City name (Max 50 characters)" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <select name="bs" class="w3-text-white">
            <option value="" disabled selected>State</option>
            <?php

             $sql1= "SELECT * FROM `sales tax`";
             $result1=$conn->query($sql1);
             while($row= mysqli_fetch_array($result1)) {

            echo '<option value="'.$row["state name"].'">'.$row["state name"].'</option>';
            }

            ?>
            </select>
            <br>
          </div>

          <div class="field-wrap">
            <label>
              Zip<span class="req">*</span>
            </label>
            <input type="text" name="bz" pattern="[0-9].{4}" title="Please enter the 5-digit Zip code" required autocomplete="off"/>
          </div>

          <h1>Credit Card</h1>

          <div class="field-wrap">
            <label>
              Card number<span class="req">*</span>
            </label>
            <input type="text" name="ccn" pattern="[0-9].{15}" title="Please enter the 16-digit Card Number" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              cvv<span class="req">*</span>
            </label>
            <input type="password" name="cvv" pattern="[0-9].{2}" title="Please enter the 3-digit CVV" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <select name="cem" class="w3-text-white" required>
            <option value="" disabled selected>Card expiry month</option>
            <?php

             for($i=1;$i<=12;$i++){

            echo '<option value="'.$i.'">'.$i.'</option>';
            }

            ?>
            </select>
            <br>
          </div>

          <div class="field-wrap">
            <select name="cey" class="w3-text-white" required>
            <option value="" disabled selected>Card expiry year</option>
            <?php

             for($i=2017;$i<=2040;$i++){

            echo '<option value="'.$i.'">'.$i.'</option>';
            }

            ?>
            </select>
            <br>
          </div>








          <button class="button button-block" type="submit">Add card</button>

          </form>

        </div>

          <div id="shipping">


          <form action="adds.php" method="post">


          <h1><a href="lindex.php"><i class="fa fa-user-circle-o w3-text-white"></i></a> Shipping Address</h1>

          <div class="field-wrap">
            <label>
              Street Address<span class="req">*</span>
            </label>
            <input type="text" name="ssa" pattern="[A-Za-z0-9\s]{1,100}" title="Please enter Address (Max 100 characters)" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              City<span class="req">*</span>
            </label>
            <input type="text" name="sc" pattern="[A-Za-z]{1,50}" title="Please enter City name (Max 50 characters)" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <select name="ss" class="w3-text-white">
            <option value="" disabled selected>State</option>
            <?php
            $username = "user";
            $password = "abcd";
            $dbname = "projectdb";
            $conn = new mysqli("localhost", $username, $password, $dbname);
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
             }

             $sql= "SELECT * FROM `sales tax`";
             $result=$conn->query($sql);
             while($row= mysqli_fetch_array($result)) {

            echo '<option value="'.$row["state name"].'">'.$row["state name"].'</option>';
            }

            ?>
            </select>
            <br>
          </div>

          <div class="field-wrap">
            <label>
              Zip<span class="req">*</span>
            </label>
            <input type="text" name="sz" pattern="[0-9].{4}" title="Please enter the 5-digit Zip code" required autocomplete="off"/>
          </div>



          <button type="submit" class="button button-block"/>Add Address</button>

          </form>

        </div>


      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>
</html>
