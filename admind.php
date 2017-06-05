<?php include_once("header.html");?>
<?php include_once("footer1.html");?>

<?php
$m=0;
if (isset($_GET["msg"]) && $_GET["msg"] == 'd') {
  $m=1;
}

if ($_GET["msg"] == 'f') {
  $m=2;
}

?>


<div class="container">
  <div class="row">

<form method="post" action="admind1.php">

  <div class="form-group">
    <label class="sr-only" for="admin-input"></label>
      <input style="width:50%" type="text" name="sku" placeholder="Enter the Item SKU to be removed please!" class="admin-input form-control" id="admin-input">
    </div>


 <button type="submit" class="btn">DELETE</button>
</form>
<span>
<?php

     if($m==1) {

      echo '<div><h4>Item has been Deleted!</h4></div>';

      }

      if($m==2) {

      echo '<div><h4>Item not found!</h4></div>';

      }

?>
</span>
<a href='admin.php' class='alert alert-info btn btn-info' >ADMIN CONTROL DESK</a>
</div>
<div>

