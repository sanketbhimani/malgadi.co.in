<?php

session_start();

if(!isset($_GET['redirectURL'])){
    $_GET['redirectURL']="index.php";
    
}else{
    if($_GET['redirectURL'] != "chackout.php" ){
        $_GET['redirectURL']="index.php";
    }
}

if(!isset($_SESSION['user_email'])){
    $_SESSION['user_email']="guest@malgadi.co.in";
	$_SESSION['user_full_name']="Guest";
    header("Location:".$_GET['redirectURL']);
    die();
}else{
    header("Location:".$_GET['redirectURL']);
    die();
}

?>