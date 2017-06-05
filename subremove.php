<?php

session_start();

$sku=$_GET["msg1"];

$subcart=$_SESSION["subcart"];
$key=array_search($sku,$subcart);
unset($subcart[$key]);
$_SESSION["subcart"]=$subcart;

header("Location: subtemp.php#cart");
    exit;




?>