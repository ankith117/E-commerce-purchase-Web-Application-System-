<?php
   $flag=0;
   if(isset($_GET["msg"]) && $_GET["msg"] == 'fail' ) {
     $flag=1;
   }

   session_start();
?>


<!DOCTYPE html>
<html>
<title>Prototype1</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="s1.css">
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
    <a href="#">Shirts</a>
    <div class="w3-accordion">
      <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-text-white" id="myBtn">
        Jeans <i class="fa fa-caret-down w3-text-white w3-margin-left-min"></i>
      </a>
      <div id="demoAcc" class="w3-accordion-content w3-padding-large w3-medium">
        <a href="ptype1.html" class="w3-black"><i class="fa fa-caret-right w3-margin-right"></i>Men</a>
        <a href="wjeans.html">Woman</a>
        <a href="kjeans.html">Kids</a>
      </div>
    </div>
      <a href="#">Shoes</a>
    </div>

  <a href="#footer" class="w3-padding">Contact</a>
  <a href="javascript:void(0)" class="w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
  <a href="#footer"  class="w3-padding">Subscribe</a>
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
    <p class="w3-right">
        <a href="#team"> <i class="fa fa-envelope w3-margin-right w3-text-white"></i></a>
      <i class="fa fa-shopping-cart w3-margin-right w3-text-white"></i>

      <a href="login.php" id="loginform"> <i class="fa fa-sign-in w3-text-white"></i></a>
  </p>
  </div>

  <!-- Image header=================================================================================================== -->
  <div class="w3-display-container w3-container">
    <img src=leandro_maeder_for_heyu_jeans_fall_winter_2010_05-1.jpg alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-padding-xxlarge w3-text-white">
      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <h1 class="w3-hide-small">COLLECTION 2017</h1>
      <p><a href="#jeans" class="w3-btn w3-padding-large w3-large">SHOP NOW</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="jeans">
    <p>8 items</p>
  </div>

  <!-- Product grid ===================================================================================================-->
  <div class="w3-row w3-white">
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <img src="jeans1.jpg" style="width:100%;">
        <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
      </div>
      <div class="w3-container">
        <img src="jeans2.jpg" style="width:100%">
        <p>Mega Ripped Jeans<br><b>$19.99</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="jeans2.jpg" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-btn">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p>Mega Ripped Jeans<br><b>$19.99</b></p>
      </div>
      <div class="w3-container">
        <img src="jeans3.jpg" style="width:100%">
        <p>Washed Skinny Jeans<br><b>$20.50</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <img src="jeans3.jpg" style="width:100%">
        <p>Washed Skinny Jeans<br><b>$20.50</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="jeans4.jpg" style="width:100%">
          <span class="w3-tag w3-display-topleft">Sale</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-btn">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p>Vintage Skinny Jeans<br><b class="w3-text-red">$14.99</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <img src="jeans4.jpg" style="width:100%">
        <p>Vintage Skinny Jeans<br><b>$14.99</b></p>
      </div>
      <div class="w3-container">
        <img src="jeans1.jpg" style="width:100%">
        <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
      </div>
    </div>
  </div>

  <!-- Subscribe section ===================================================================================================-->
  <div class="w3-container w3-black w3-padding-32">
    <h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-btn w3-padding w3-red w3-margin-bottom">Subscribe</button>
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
          <h3>CK</h3>
          <p class="w3-opacity">CEO</p>

          <p><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom">
      <div class="w3-card-12">
        <img src=aa.jpg alt="aa" style="width:100%">
        <div class="w3-container w3-white">
          <h3>AA</h3>
          <p class="w3-opacity">Front End</p>

          <p><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom">
      <div class="w3-card-12">
        <img src=dg.jpg alt="Andham" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Deepak</h3>
          <p class="w3-opacity">Database Developer</p>

          <p><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom" style="margin-left: 150px">
      <div class="w3-card-12">
        <img src=ns.jpg alt="ns" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Navya</h3>
          <p class="w3-opacity">Javascript Developer</p>

          <p><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m8 w3-margin-bottom">
      <div class="w3-card-12">
        <img src=ab-1.jpg alt="Dan" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Abhigyna</h3>
          <p class="w3-opacity">Marketing</p>

          <p><button class="w3-btn-block"><i class="fa fa-envelope"></i> Contact</button></p>
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
        <form action="form.asp" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-btn-block w3-padding w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-xlarge w3-hover-text-indigo"></i>
        <i class="fa fa-instagram w3-xlarge w3-hover-text-purple"></i>
        <i class="fa fa-twitter w3-xlarge w3-hover-text-light-blue"></i>
        <i class="fa fa-pinterest w3-xlarge w3-hover-text-red"></i>
        <i class="fa fa-flickr w3-xlarge w3-hover-text-blue"></i>
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
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-closebtn w3-xlarge w3-hover-text-grey w3-margin"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-btn w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>

  $('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function(){
  $(this).css('background', '#1abc9c');
});

$('#loginform').click(function(){
  $('.login').fadeToggle('slow');
  $(this).toggleClass('green');
});



$(document).mouseup(function (e)
{
    var container = $(".login");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('#loginform').removeClass('green');
    }
});
</script>
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

