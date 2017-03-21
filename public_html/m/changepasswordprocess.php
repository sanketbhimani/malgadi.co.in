<?php

include 'connection.php';
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location:login.php?error=You need to login first");
    die();
} else {
    if ($_SESSION['user_email'] === "guest@malgadi.co.in") {
        header("Location:login.php?error=You need to login first");
        die();
    }
}

$connection=new PDO("mysql:host=$host;dbname=$db",$uname,$pass);

$statement=$connection->prepare("select password from users where email=?");

if($statement->execute(array($_SESSION['user_email']))){
    if($row=$statement->fetch(PDO::FETCH_OBJ)){
        if($row->password != $_POST['oldpassword']){
            header("Location:changepassword.php?msg=Your old password is incorrect");
            die();
        }
    }
}

$length=  strlen($_POST['newpassword']);

if($length < 8 || $length > 15){
    header("Location:changepassword.php?msg=Password should be 8-15 characters long");
    die();
}

if($_POST['newpassword'] != $_POST['cpassword']){
    header("Location:changepassword.php?msg=Password didn't match");
    die();
}

$statement=$connection->prepare("update users set password=? where email=?");

if($statement->execute(array($_POST['newpassword'],$_SESSION['user_email']))){
    if($statement->rowCount() != 0){
        header("Location:changepassword.php?msg=Password has been changed successfully");
        die();
    }
}

?>

