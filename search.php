<?php
session_start();
?>

<?php include_once("header.html");?>

<html>
  <head>
    <script>
      $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });
      </script>
    </head>
  <body>


<?php
    $city = $_GET["city"];
    $checkin = $_GET["checkin"];
    $checkout = $_GET["checkout"];
    $number_req = $_GET["number"];
    $roomtype= $_GET["roomtype"];
    $username = "username";
    $password = "";
    $dbname = "project";
    $conn = new mysqli("localhost", $username, $password, $dbname);
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }


    //$sql1="SELECT hotel_id FROM hotel WHERE city='$city' AND roomtype='$roomtype'";


    $sql= "select * from hotel where city='$city' and roomtype='$roomtype'";
    $result=$conn->query($sql);

    //$sql1= "SELECT name,address,price FROM hotel where city='$city' and (single_max > (SELECT count(*) FROM `bookings` where hotel_id=1 and (checkin='2016-11-22' and checkout='2016-11-23')))";





// Set session variables
      $_SESSION["checkin"] = $checkin;
      $_SESSION["checkout"] = $checkout;
      $_SESSION["number"]=$number_req;
      $_SESSION["roomtype"]=$roomtype;
      $_SESSION["city"]=$city;

    echo "<html>";
    echo  "<head>";

    echo  "<link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css' rel='stylesheet'>";
    echo "<link href='style2.css' rel='stylesheet'";




    echo "</head>";
    echo "<body style='height:1000px'>";
    echo "<div class='container'>";
    echo "<hgroup class='mb20'>
   <h1>Search Results</h1>

 </hgroup>";

    while($row= mysqli_fetch_array($result)) {
      $hotelid=$row['hotel_id'];
      $type = $row['roomtype'];
      $price=$row['price'];
      $name=$row['name'];
      $address=$row['address'];
      $city=$row['city'];
      $number=$row['number'];
      $pic=$row['image'];



      $sql2="select sum(number) as c from bookings where checkin <= '$checkout' AND checkout >='$checkin' AND hotel_id='$hotelid'";
      $result2 = $conn->query($sql2);

      while($row = mysqli_fetch_array($result2)){
        $count=$row["c"];
      }

      if(($count+$number_req) < $number){

      $quer="booking.php?hotelid=".$hotelid;
      $msg="For more insights, click here!!";

      echo '<section class="col-xs-12 col-sm-6 col-md-12">
     		<article class="search-result row">
     			<div class="col-xs-12 col-sm-12 col-md-3">
     				<a href="#" title="Lorem ipsum" class="thumbnail"><img src='.$pic.' alt="Lorem ipsum" /></a>
     			</div>
     			<div class="col-xs-12 col-sm-12 col-md-2">
     				<ul class="meta-search">
     					<li>Area: <span>'.$address.'</span></li>
     					<li>City: <span>'.$city.'</span></li>
     					<li>Ratings: <span><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></span></li>
     				</ul>
     			</div>
     			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
     				<h3><a href="#" title="">'.$name.'</a></h3>
     				<h5>Hyatt Hotels Corporation is an American multinational franchiser of hotels and vacation properties.  As of September 30, 2016, Hyatt has 679 properties in 54 countries. In 2016, Fortune magazine listed Hyatt as the 47th-best U.S. company to work for.</h5>
            <span class="plus" data-toggle="modal" data-target="#delux">'.$msg.'<i class="glyphicon glyphicon-plus" ></i>


            </span>
            <div class="modal fade" id="delux" role="dialog">.<div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">'.$name.' - '.$type.'</h4>
                    </div>
                    <div class="modal-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <li data-target="#myCarousel" data-slide-to="1"></li>
             <li data-target="#myCarousel" data-slide-to="2"></li>
             <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
             <div class="item active">
               <img width="100%" src="hd.jpg" alt="hyatt">
             </div>

             <div class="item">
               <img width="100%" src="hd2.jpg" alt="Chania">
             </div>

             <div class="item">
               <img width="100%" src="hd3.jpg" alt="Flower">
             </div>

             <div class="item">
               <img width="100%" src="hd4.jpg" alt="Flower">
             </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
            </a>
            </div>
                    </div>
                    <div class="modal-footer">
                      <h4 class="pull-left">$ '.$price.'  </h4>
                      <a href='.$quer.' class="btn btn-default" >BOOK NOW</a>
                    </div>
                  </div>

                </div>

              </div>






     			</div>
     			<span class="clearfix borda"></span>
     		</article>
     	</section> ';






      }
    }

    //$result2 = $conn->query($sql2);


    echo "</div>";
    echo "</body>";
    echo "</html>";


    $conn.close();
?>

</body>
</html>
