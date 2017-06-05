<?php

session_start();

$sku=$_GET["msg1"];

$cart=$_SESSION["cart"];
$key=array_search($sku,$cart);
unset($cart[$key]);
$_SESSION["cart"]=$cart;

header("Location: cart.php#cart");
    exit;




?>