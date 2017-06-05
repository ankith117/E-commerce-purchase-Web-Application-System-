<?php
  session_start();
  $u=$_SESSION['u'];

  $username = "user";
$password = "abcd";
$dbname = "projectdb";
$conn = new mysqli("localhost", $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT * FROM `item catalog` WHERE `Category`='Jeans' AND `Sub Category`='Kids'";
$result = $conn->query($sql);
$count  = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<title>C K G</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidenav a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1400px">

<!-- Sidenav/menu=================================================================================================== -->
<nav class="w3-sidenav w3-teal w3-collapse w3-top" style="z-index:3;width:250px;margin-left:0px;" id="mySidenav">
  <div class="w3-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-closebtn w3-hover-text-red"></i>
      <h3 class="w3-wide"><b>CKG</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-white" style="font-weight:bold">
    <a href="subindex.php">Shirts</a>
    <div class="w3-accordion">
      <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-text-white" id="myBtn">
        Jeans <i class="fa fa-caret-down w3-text-white w3-margin-left-min"></i>
      </a>
      <div id="demoAcc" class="w3-accordion-content w3-padding-large w3-medium">
        <a href="subjm.php">Men</a>
        <a href="subjw.php">Women</a>
        <a href="subjk.php" class="w3-black"><i class="fa fa-caret-right w3-margin-right"></i>Kids</a>
      </div>
    </div>
      <a href="subshm.php">Shoes</a>
    </div>

  <a href="#team" class="w3-padding">Contact</a>

  <a href="logout.php"  class="w3-padding">Log out <i class="fa fa-power-off w3-text-white"></i></a>
</nav>


<!-- Top menu on small screens=================================================================================================== -->
<header class="w3-container w3-top w3-hide-large w3-black w3-xlarge w3-padding-24">
  <span class="w3-left w3-wide">CKG</span>
  <a href="javascript:void(0)" class="w3-right w3-opennav" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT!=================================================================================================== -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>

  <!-- Top header ===================================================================================================-->
  <div class="w3-container w3-xlarge" style="background-color: black;margin:0px 0px 10px 0px;">
    <p class="w3-left w3-text-white">Jeans</p>
    <p class="w3-left w3-text-white" style="margin-left: 340px"><span> <?php echo $u ?> </span> <a href="profcheck.php"> <i class="fa fa-user"></i></a> </p>
    <p class="w3-right">
        <a href="#team"> <i class="fa fa-envelope w3-margin-right w3-text-white"></i></a>
      <a href="subtemp.php"><i class="fa fa-shopping-cart w3-margin-right w3-text-white"></i></a>

      <a title="Update/Delete" href="updel.php"> <i class="fa fa-user-plus w3-text-white"></i></a>
  </p>
  </div>

  <!-- Image header=================================================================================================== -->
  <div class="w3-display-container w3-container">
    <img src=kidjean.jpg alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-padding-xxlarge w3-text-white">
      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <h1 class="w3-hide-small">COLLECTION 2017</h1>
      <p><a href="#jeans" class="w3-btn w3-padding-large w3-large">SHOP NOW</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="jeans">
    <p><?php echo $count ?> items</p>
  </div>

  <!-- Product grid ===================================================================================================-->
   <div class="w3-row w3-white" >
    <?php
while($row= mysqli_fetch_array($result)) {

      $sku=$row["sku"];
      $itn=$row["item name"];
      $itd=$row["item description"];
      $itp=$row["price"];
      $itq=$row["quantity"];
      $itpi=$row["Pic"];

    echo'<div class="w3-col l3 s6">
      <div class="w3-container w3-left">
        <div class="w3-display-container">
        <img src='.$itpi.' style="width:100%;"';
        if($itq==0){ echo' class="w3-grayscale-min w3-opacity"';}
        echo'>
        <div class="w3-display-middle w3-display-hover">';
        if($itq==0){ echo'<button class="w3-btn">Out of Stock <i class="fa fa-frown-o"></i></button>';}
            else{ echo '<a href="subadd.php?msg1='.$sku.'&msg2=jk"><button class="w3-btn">Add to cart <i class="fa fa-shopping-cart"></i></button></a>';}
          echo '</div>
        </div>
        <h4>'.$itn.'<br></h4>
        <p class="w3-text-grey" style="font-size: 13px">'.$itd.'</p>
        <b>$'.$itp.'</b></p>
      </div>
      </div>';

}

?>
  </div>


  <!-- Subscribe section ===================================================================================================-->
  <div class="w3-container w3-black w3-padding-32">
    <!--<h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-btn w3-padding w3-red w3-margin-bottom">Subscribe</button>-->
  </div>
  <!-- Team section===================================================================================================-->
  <div class="w3-container w3-padding-32 " style="background-color: #3f3f3f" id="team">
  <h3 class="w3-center w3-text-white ">THE TEAM</h3>
  <p class="w3-center w3-large w3-text-white ">The ones who runs this company</p>
  <div class="w3-row-padding w3-grayscale-min" style="margin-top:64px">
    <div class="w3-col l4 m8 w3-margin-bottom">
      <div class="w3-card-12">
        <img src=ck-2.jpg alt="CK" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Chandhra Kiran</h3>
          <p class="w3-opacity">Chief Executive Officer</p>
          <p>Supervises and controls all the strategic and business aspects of the company.Responsible for giving proper strategic direction as well as creating a vision for success.</p>
          <p><a href="javascript:void(0)" onclick="document.getElementById('con').style.display='block'"><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></a></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom">
      <div class="w3-card-12">
        <img src=aa.jpg alt="aa" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Ankith</h3>
          <p class="w3-opacity">Software Developer</p>
          <p>Computer programmer playing key role in the design, installation, testing and maintenance of software systems. Programs created helps business be more efficient.</p>
          <p><a href="javascript:void(0)" onclick="document.getElementById('con').style.display='block'"><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></a></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom">
      <div class="w3-card-12">
        <img src=dg.jpg alt="Andham" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Deepak</h3>
          <p class="w3-opacity">Database Developer</p>
          <p>Evaluates and advices all technology components for database management systems and application implementing database for all levels of organisation.</p>
          <p><a href="javascript:void(0)" onclick="document.getElementById('con').style.display='block'"><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></a></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom" style="margin-left: 150px">
      <div class="w3-card-12">
        <img src=ns.jpg alt="ns" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Navya</h3>
          <p class="w3-opacity">Content Developer</p>
          <p>Responsible for creating original and creative content for websites,newletters,articles and advertising materials based on requirements of client/organization.</p>
          <p><a href="javascript:void(0)" onclick="document.getElementById('con').style.display='block'"><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></a></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom">
      <div class="w3-card-12">
        <img src=ab-1.jpg alt="Dan" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Abhigyna</h3>
          <p class="w3-opacity">Product Designer</p>
          <p>Uses design skills and technical knowledge to improve the way that existing products work and look and produce them at a lower cost and producing new products.</p>
          <p><a href="javascript:void(0)" onclick="document.getElementById('con').style.display='block'"><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></a></p>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Footer ===================================================================================================-->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>

          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-btn-block w3-padding w3-black">Send</button>

      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#team">About us</a></p>
        <p><a href="#team">Support</a></p>
        <p><a href="javascript:void(0)" onclick="document.getElementById('ship').style.display='block'">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#top">Return</a></p>
        <p><a href="#team">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> CKG</p>
        <p><i class="fa fa-fw fa-phone"></i> 0071239999</p>
        <p><i class="fa fa-fw fa-envelope"></i> contact@ckg.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">Thank you for Visiting!</div>

  <!-- End page content=================================================================================================== -->
</div>

<!-- Newsletter Modal ===================================================================================================-->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <h1 class="w3-wide" style="margin-left: 60px;">  Please Log in</h1>
      <a href="login1.php"><button type="button" class="w3-btn w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Log in <i class="fa fa-sign-in w3-text-white w3-medium"></i></button></a>
    </div>
  </div>
</div>

<div id="order" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('ship').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <h1 class="w3-wide" style="margin-left: 70px;"> View Order</h1>
      <p>Please enter your Order ID</p>
      <form action="checkvo.php" method="post">
      <p><input class="w3-input w3-border" name="oid" type="text" placeholder="Order ID"></p>
      <button type="submit" class="w3-btn w3-padding-large w3-green w3-text-white w3-margin-bottom" onclick="document.getElementById('order').style.display='none'">Track Order</button>
      </form>
    </div>
  </div>
</div>

<div id="ship" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('ship').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <h1 class="w3-wide" style="margin-left: 70px;"> Track Order</h1>
      <p>Please enter your Order ID</p>
      <form action="ltrack.php" method="post">
      <p><input class="w3-input w3-border" name="oid" type="text" placeholder="Order ID"></p>
      <button type="submit" class="w3-btn w3-padding-large w3-green w3-text-white w3-margin-bottom" onclick="document.getElementById('ship').style.display='none'">Track Order</button>
      </form>
    </div>
  </div>
</div>

<div id="con" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('con').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <h1 class="w3-wide" style="margin-left: 70px;"> Contact</h1>
      <p>Please drop your message below</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Message"></p>
      <a href="javascript:void(0)" onclick="document.getElementById('conmsg').style.display='block'"><button type="button" class="w3-btn w3-padding-large w3-green  w3-text-white w3-margin-bottom" onclick="document.getElementById('con').style.display='none'">Send</button></a>
    </div>
  </div>
</div>

<div id="conmsg" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('conmsg').style.display='none'" class="fa fa-remove w3-closebtn w3-xxlarge w3-hover-text-red w3-margin"></i>
      <h2 class="w3-wide" style="margin-left: 60px;"> Message has been sent.<br> Thank you!</h2>
      <a href="#"><button type="button" class="w3-btn w3-padding-large w3-green w3-text-white w3-margin-bottom" onclick="document.getElementById('conmsg').style.display='none'">Continue</button></a>
    </div>
  </div>
</div>

<script>
// Accordion
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>


