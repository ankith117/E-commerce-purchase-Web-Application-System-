<?php include_once("header.html");?>


<?php
$m=0;
if (isset($_GET["msg"]) && $_GET["msg"] == 'a') {
  $m=1;
}

if ($_GET["msg"] == 'b') {
  $m=2;
}

if ($_GET["msg"] == 'c') {
  $m=3;
}

if ($_GET["msg"] == 'd') {
  $m=4;
}

if ($_GET["msg"] == 'e') {
  $m=5;
}

if ($_GET["msg"] == 'f') {
  $m=6;
}

if ($_GET["msg"] == 'g') {
  $m=7;
}

if ($_GET["msg"] == 'h') {
  $m=8;
}

if ($_GET["msg"] == 'i') {
  $m=9;
}
session_start();

?>

<div class="container">
  <div class="row">
  <form action="" method='post' >

<?php
  if($m==7){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" checked> Shirts
  <input type="radio" name="itc" value="Jeans"> Jeans
  <input type="radio" name="itc" value="Shoes"> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" checked> Men
  <input type="radio" name="itsc" value="Women"> Women
  <input type="radio" name="itsc" value="Kids"> Kids

    </div>';
    }

    if($m==1){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" > Shirts
  <input type="radio" name="itc" value="Jeans"> Jeans
  <input type="radio" name="itc" value="Shoes" checked> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" checked> Men
  <input type="radio" name="itsc" value="Women"> Women
  <input type="radio" name="itsc" value="Kids"> Kids

    </div>';
    }

    if($m==2){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" > Shirts
  <input type="radio" name="itc" value="Jeans"> Jeans
  <input type="radio" name="itc" value="Shoes" checked> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" > Men
  <input type="radio" name="itsc" value="Women" checked> Women
  <input type="radio" name="itsc" value="Kids"> Kids

    </div>';
    }

    if($m==3){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" checked> Shirts
  <input type="radio" name="itc" value="Jeans"> Jeans
  <input type="radio" name="itc" value="Shoes" checked> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" > Men
  <input type="radio" name="itsc" value="Women"> Women
  <input type="radio" name="itsc" value="Kids" checked> Kids

    </div>';
    }

    if($m==4){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" > Shirts
  <input type="radio" name="itc" value="Jeans" checked> Jeans
  <input type="radio" name="itc" value="Shoes"> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" checked> Men
  <input type="radio" name="itsc" value="Women"> Women
  <input type="radio" name="itsc" value="Kids"> Kids

    </div>';
    }

    if($m==5){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" > Shirts
  <input type="radio" name="itc" value="Jeans" checked> Jeans
  <input type="radio" name="itc" value="Shoes"> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" > Men
  <input type="radio" name="itsc" value="Women" checked> Women
  <input type="radio" name="itsc" value="Kids"> Kids

    </div>';
    }

    if($m==6){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" > Shirts
  <input type="radio" name="itc" value="Jeans" checked> Jeans
  <input type="radio" name="itc" value="Shoes"> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" > Men
  <input type="radio" name="itsc" value="Women"> Women
  <input type="radio" name="itsc" value="Kids" checked> Kids

    </div>';
    }

    if($m==8){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" checked> Shirts
  <input type="radio" name="itc" value="Jeans"> Jeans
  <input type="radio" name="itc" value="Shoes"> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" > Men
  <input type="radio" name="itsc" value="Women" checked> Women
  <input type="radio" name="itsc" value="Kids"> Kids

    </div>';
    }

    if($m=='g'){
  echo '<div class="form-group">


   <p>Category: </p> <input type="radio" name="itc" value="Shirts" checked> Shirts
  <input type="radio" name="itc" value="Jeans"> Jeans
  <input type="radio" name="itc" value="Shoes"> Shoes
    </div>

    <div class="form-group">
   <p>Sub Category: </p> <input type="radio" name="itsc" value="Men" > Men
  <input type="radio" name="itsc" value="Women"> Women
  <input type="radio" name="itsc" value="Kids" checked> Kids

    </div>';
    }
?>
  <div class="form-group">
    <label class="sr-only" for="h1">a</label>
      <input style="width:50%" type="text" name="itn" pattern="[A-Za-z\s]{1,50}" title="Enter alphabets" placeholder="<?php echo $_SESSION['itn'] ?>" class="h1 form-control" id="h1">
    </div>

    <div class="form-group">
      <label class="sr-only" for="h2"></label>
        <input style="width:100%" type="text" name="itd" pattern="[A-Za-z\s]{1,100}" title="Enter alphabets" placeholder="<?php echo $_SESSION['itd'] ?>" class="h2 form-control" id="h2">
      </div>

      <div class="form-group">
        <label class="sr-only" for="h3"></label>
          <input style="width:50%" type="text" name="itp" pattern="[0-9]+(\.[0-9]{0,2})" title="Enter Numeric Values" placeholder="<?php echo $_SESSION['itp'] ?>" class="h3 form-control" id="h3">
        </div>

        <div class="form-group">
          <label class="sr-only" for="h4"></label>
            <input style="width:50%" type="text" name="itq" pattern="[0-9]{1,10}" title="Enter Numeric Values" placeholder="<?php echo $_SESSION['itq'] ?>" class="h4 form-control" id="h4">
          </div>

          <div class="form-group">
          <label class="sr-only" for="h4"></label>
            <input style="width:50%" type="text" name="itpi" placeholder="<?php echo $_SESSION['itpi'] ?>" class="h4 form-control" id="h4">
          </div>

 <button type="submit" class="btn">Update</button>
</form>


</div>
</div>

<?php
      $sku=$_SESSION['sku'];
      $itc=$_POST['itc'];
      $itsc=$_POST['itsc'];
      $itn=$_POST['itn'];
      $itd=$_POST['itd'];
      $itp=$_POST['itp'];
      $itq=$_POST['itq'];
      $itpi=$_POST['itpi'];

      function check($question){
        return (!isset($question) || trim($question)==='');
     }

      $username = "user";
      $password = "abcd";
      $dbname = "projectdb";
      $change=0;
      $conn = new mysqli("localhost", $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      if(!check($itc)){
      $sql1= "UPDATE `item catalog` SET `Category`='$itc' WHERE `sku`=$sku";
      $result2=$conn->query($sql1);
      $_SESSION['itc']=$itc;
      $change=1;


      }

      if(!check($itsc)){
      $sql1= "UPDATE `item catalog` SET `Sub Category`='$itsc' WHERE `sku`=$sku";
      $result2=$conn->query($sql1);
      $_SESSION['itsc']=$itsc;
      $change=1;


      }



      if(!check($itn)){
      $sql1= "UPDATE `item catalog` SET `item name`='$itn' WHERE `sku`=$sku";
      $result2=$conn->query($sql1);
      $_SESSION['itn']=$itn;
      $change=1;


      }

      if(!check($itd)){
      $sql1= "UPDATE `item catalog` SET `item description`='$itd' WHERE `sku`=$sku";
      $result2=$conn->query($sql1);
      $_SESSION['itd']=$itd;
      $change=1;


      }

      if(!check($itp)){
      $sql1= "UPDATE `item catalog` SET `price`=$itp WHERE `sku`=$sku";
      $result2=$conn->query($sql1);
      $_SESSION['itp']=$itp;
      $change=1;


      }

      if(!check($itq)){
      $sql1= "UPDATE `item catalog` SET `quantity`=$itq WHERE `sku`=$sku";
      $result2=$conn->query($sql1);
      $_SESSION['itq']=$itq;
      $change=1;


      }

      if(!check($itpi)){
      $sql1= "UPDATE `item catalog` SET `Pic`='$itpi' WHERE `sku`=$sku";
      $result2=$conn->query($sql1);
      $_SESSION['itpi']=$itpi;
      $change=1;


      }


     if($change !=0){
      echo "Updated details of the Item: <br />";
      $sql= "SELECT * FROM `item catalog` WHERE `sku`=$sku";
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

  <a href='admin.php' class='alert alert-info btn btn-info' style="margin-bottom: 65px; margin-left: 55px;" >ADMIN CONTROL DESK</a>
<?php include_once("footer.html");?>