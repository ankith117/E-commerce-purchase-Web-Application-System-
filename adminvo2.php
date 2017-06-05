<?php include_once("header.html");?>


<?php

session_start();



      $oid=$_SESSION['oid'];





      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $change=0;
      $f=0;
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }


       $sql1= "SELECT * FROM `line items` WHERE `Orderid`=$oid";
      $result1=$conn->query($sql1);



      echo '
      <table class="table table-striped">
      <tr>
      <th>Order ID</th>
      <th>Line ID</th>
      <th>UID</th>
      <th>SKU</th>
      <th>Status</th>
      </tr>';



      while($row= mysqli_fetch_array($result1)){

      $ls=$row["status"];

      echo'  <tr>
           <td>' . $row["Orderid"]. '</td>
           <td>' .$row["line id"]. '</td>
           <td>' .$_SESSION["uid"]. '</td>
           <td>' . $row["SKU"]. '</td>';

           echo '<td>'.$ls.'</td>';

          echo '</tr>';


        }
       echo "</table>



       ";




  ?>

  <a href='admin.php' class='alert alert-info btn btn-info' style="margin-bottom: 65px; margin-left: 55px;" >ADMIN CONTROL DESK</a>
<?php include_once("footer1.html");?>