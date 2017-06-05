<?php
$m=0;
if (isset($_GET["msg"]) && $_GET["msg"] == 'm') {
  $m=1;
}

session_start();

?>

<?php include_once("header.html");?>
<?php include_once("footer1.html");?>

<div class="container">
  <div class="row">

  <form action="adminru1.php" method="post" >

  <div class="form-group">
    <label class="sr-only" for="sku"></label>
      <input style="width:50%" type="text" name="lid" placeholder="Enter the Line id of the Return Initiated Item" class="admin-input form-control" id="admin-input">
    </div>

<button type="submit" class="btn">Find</button>
<span>
<?php

     if($m==1) {

      echo '<div><h4>Item not found</h4></div>';

      }

?>
</span>
</form>

<a href='admin.php' class='alert alert-info btn btn-info' >ADMIN CONTROL DESK</a>
</div>
</div>