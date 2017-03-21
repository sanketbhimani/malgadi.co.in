<?php

session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location:index.php");
    die();
} else {
    if ($_SESSION['user_email'] === "guest@malgadi.co.in") {
        header("Location:index.php");
        die();
    }
}

if (isset($_SESSION['user_email'])) {
    unset($_SESSION['user_email']);
    unset($_SESSION['user_full_name']);
    $_SESSION['user_email'] = null;
    $_SESSION['user_full_name'] = null;
    //session_destroy();
    header("Location:index.php");
    die();
}
?>
