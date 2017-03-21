<?php

include 'connection.php';

$connection=new PDO("mysql:host=$host;dbname=$db",$uname,$pass);

if(!isset($_POST['redirectURL'])){
    $_POST['redirectURL']="index.php";
    
}else{
    if($_POST['redirectURL'] != "chackout.php" ){
        $_POST['redirectURL']="index.php";
    }
}

if($_POST['email'] == null || $_POST['password'] == null){
    header("Location:login.php?error=Invalid email id or password&redirectURL=".$_POST['redirectURL']);
    die();
}



$statement=$connection->prepare("select * from users where email=? and password=?");

if($statement->execute(array($_POST['email'],$_POST['password']))){
    if($row=$statement->fetch(PDO::FETCH_OBJ)){
        session_start();
        $_SESSION['user_email']=$row->email;
        $_SESSION['user_full_name']=$row->fname." ".$row->lname;
        header("Location:".$_POST['redirectURL']);
        die();
    }else{
        header("Location:login.php?error=Invalid email id or password&redirectURL=".$_POST['redirectURL']);
        die();
    }
}
?>

