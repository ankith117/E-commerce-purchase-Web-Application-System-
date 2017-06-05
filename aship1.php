<?php
session_start();
$f=0;
if (isset($_GET["msg"]) && $_GET["msg"] == 'pi') {
  $f=1;
}
if ($_GET["msg"] == 'pa') {
  $f=2;
}
if ($_GET["msg"] == 's') {
  $f=3;
}

$shipid=$_SESSION["shid"];
$ships=$_SESSION["shipstatus"];




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
  color: #1ab188;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  color: #179b77;
}

.form {
  background:  rgba(19, 35, 47, 0.7);
  padding: 50px;
  max-width: 800px;
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

  </style>


</head>

<body <?php if($f==1){
          echo 'onload="move()">';
          }

          if($f==2){
          echo 'onload="move1()">';
          }

          if($f==3){
          echo 'onload="move2()">';
          }

          ?>
  <div class="form">
      <h1><a href="index.php"><i class="fa fa-user-circle-o w3-text-white"></i></a> Shipping Details</h1>





          <h3 class="w3-text-white">Your Shipping ID:</h3>
          <h5 class="w3-text-white">ID: <?php echo $shipid ?></h5>
          <br>
          <h2 class="w3-text-white">Shipping status:</h2>

          <?php

          if($f==1){
          echo '<h1>'.$ships.'!</h1>
          <div class="w3-progress-container w3-round-xxlarge w3-xlarge" style="background:  rgba(192,192,192,0.1)">
            <div id="myBar" class="w3-progressbar w3-round-xlarge w3-teal" style="width:10%">
              <div id="p" class="w3-center w3-text-white">0%</div>
            </div>
          </div><br><br>';
          }

          if($f==2){
          echo '<h1>'. $ships .'! </h1>
          <div class="w3-progress-container w3-round-xxlarge w3-xlarge" style="background:  rgba(192,192,192,0.1)">
            <div id="myBar" class="w3-progressbar w3-round-xlarge w3-teal" style="width:10%">
              <div id="p" class="w3-center w3-text-white">0%</div>
            </div>
          </div><br><br>';
          }

          if($f==3){
          echo '<h1>'. $ships .'! </h1>
          <div class="w3-progress-container w3-round-xxlarge w3-xlarge" style="background:  rgba(192,192,192,0.1)">
            <div id="myBar" class="w3-progressbar w3-round-xlarge w3-teal" style="width:10%">
              <div id="p" class="w3-center w3-text-white">0%</div>
            </div>
          </div>
          <br><br>';
          }

          ?>





</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

    <script>
function move() {
  var elem = document.getElementById("myBar");
  var width = 10;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 33) {
      clearInterval(id);
    } else {
      width++;
      elem.style.width = width + '%';
      document.getElementById("p").innerHTML = width * 1  + '%';
    }
  }


}

function move1() {
  var elem = document.getElementById("myBar");
  var width = 10;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 67) {
      clearInterval(id);
    } else {
      width++;
      elem.style.width = width + '%';
      document.getElementById("p").innerHTML = width * 1  + '%';
    }
  }


}

function move2() {
  var elem = document.getElementById("myBar");
  var width = 10;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++;
      elem.style.width = width + '%';
      document.getElementById("p").innerHTML = width * 1  + '%';
    }
  }


}
</script>

</body>
</html>
