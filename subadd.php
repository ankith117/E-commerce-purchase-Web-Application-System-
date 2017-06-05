<?php

session_start();

$sku=$_GET["msg1"];

$subcart=$_SESSION["subcart"];
array_push($subcart,$sku);
$_SESSION["subcart"]=$subcart;

if($_GET["msg2"]=="jk"){

header("Location: subjk.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="sm"){

header("Location: subindex.php#jeans");
    exit;



}

if($_GET["msg2"]=="jm"){

header("Location: subjm.php#jeans");
    exit;
    }
    if($_GET["msg2"]=="jw"){

header("Location: subjw.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="shk"){

header("Location: subshk.php#jeans");
    exit;
    }

if($_GET["msg2"]=="shm"){

header("Location: subshm.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="shw"){

header("Location: subshw.php#jeans");
    exit;
    }


    if($_GET["msg2"]=="sk"){

header("Location: subsk.php#jeans");
    exit;
    }

    if($_GET["msg2"]=="sw"){

header("Location: subsw.php#jeans");
    exit;
    }

if($_GET["msg2"]=="jw"){

header("Location: subjw.php#jeans");
    exit;
    }


?>