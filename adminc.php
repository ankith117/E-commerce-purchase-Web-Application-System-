<?php include_once("header.html");?>



<div class="container">
  <div class="row">

<form method="post" action="">

<div class="form-group">
   <p>Category: </p> <input type="radio" name="itc" value="Shirts" checked> Shirts
  <input type="radio" name="itc" value="Jeans"> Jeans
  <input type="radio" name="itc" value="Shoes"> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" checked> Men
  <input type="radio" name="itsc" value="Women"> Women
  <input type="radio" name="itsc" value="Kids"> Kids

    </div>

  <div class="form-group">
    <label class="sr-only" for="h1"></label>
      <input style="width:50%" type="text" name="h1" pattern="[a-zA-Z\s]{1,50}" title="Enter alphabets" required autocomplete="off" placeholder="Enter Item name" class="h1 form-control" id="h1">
    </div>

    <div class="form-group">
      <label class="sr-only" for="h2"></label>
        <input style="width:100%" type="text" name="h2" pattern="[A-Za-z\s]{1,100}" title="Enter alphabets" required autocomplete="off" placeholder="Enter Item Description " class="h2 form-control" id="h2">
      </div>

      <div class="form-group">
        <label class="sr-only" for="h3"></label>
          <input style="width:50%" type="text" name="h3" pattern="[0-9]+(\.[0-9]{0,2})" title="Enter Numeric Values" required autocomplete="off" placeholder="Enter Price" class="h3 form-control" id="h3">
        </div>

        <div class="form-group">
          <label class="sr-only" for="h4"></label>
            <input style="width:50%" type="text" name="h4" pattern="[0-9]{1,10}" title="Enter Numeric Values" required autocomplete="off" placeholder="Enter Quantity" class="h4 form-control" id="h4">
          </div>

          <div class="form-group">
          <label class="sr-only" for="h4"></label>
            <input style="width:50%" type="text" name="itpi" required autocomplete="off" title="Enter Numeric Values" placeholder="Enter Picture name with .jpg extention" class="h4 form-control" id="h4">
          </div>

 <button type="submit" class="btn">Enter</button><br>
</form>

</div>
</div>

<div>

  <?php

      $itn=$_POST['h1'];
      $itd=$_POST['h2'];
      $itp=$_POST['h3'];
      $itq=$_POST['h4'];
      $itc=$_POST['itc'];
      $itsc=$_POST['itsc'];
      $itpi=$_POST['itpi'];

      function check($question){
        return (!isset($question) || trim($question)==='');
     }

      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }



      $sql1= "INSERT INTO `item catalog`(`sku`, `Category`, `Sub Category`, `item name`, `item description`, `price`, `quantity`, `Pic`) VALUES ('NULL','$itc','$itsc','$itn','$itd',$itp,$itq,'$itpi')";
      $result2=$conn->query($sql1);
      if($result2){





      echo "New Item details: <br />";
      $sql= "SELECT * FROM `item catalog` WHERE `item name`='$itn'";
      $result=$conn->query($sql);

      echo '
      <table class="table table-striped">
      <tr>
      <th>Item SKU</th>
      <th>Category</th>
      <th>Sub Category</th>
      <th>Name</th>
      <th>Description </th>
      <th>Price </th>
      <th>Quantity </th>
      <th>Picture </th>
      </tr>';

      while($row= mysqli_fetch_array($result)) {



      echo'  <tr>
           <td>' . $row["sku"]. '</td>
           <td>' . $row["Category"]. '</td>
           <td>' . $row["Sub Category"]. '</td>
           <td>' . $row["item name"] . '</td>
           <td>' . $row["item description"]. '</td>
           <td>' . $row["price"] . '</td>
           <td>' . $row["quantity"]. '</td>
           <td>' . $row["Pic"]. '</td>
          </tr>

      ';

       }

       echo "</table>
       ";

}

  ?>




</div>

  <a href='admin.php' class='alert alert-info btn btn-info' style="margin-bottom: 65px; margin-left: 55px;" >ADMIN CONTROL DESK</a>

  <?php include_once("footer.html");?>