<?php

session_start();

$sku=$_GET["msg1"];

$cart=$_SESSION["cart"];
array_push($cart,$sku);
$_SESSION["cart"]=$cart;

if($_GET["msg2"]=="jk"){

header("Location: ljk.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="sm"){

header("Location: lindex.php#jeans");
    exit;



}

if($_GET["msg2"]=="jm"){

header("Location: ljm.php#jeans");
    exit;
    }
    if($_GET["msg2"]=="jw"){

header("Location: ljw.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="shk"){

header("Location: lshk.php#jeans");
    exit;
    }

if($_GET["msg2"]=="shm"){

header("Location: lshm.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="shw"){

header("Location: lshw.php#jeans");
    exit;
    }


    if($_GET["msg2"]=="sk"){

header("Location: lsk.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="sw"){

header("Location: lsw.php#jeans");
    exit;
    }

if($_GET["msg2"]=="jw"){

header("Location: ljw.php#jeans");
    exit;
    }


?>