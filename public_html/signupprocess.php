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
echo(1);

if($_POST['fname'] == null || $_POST['lname'] == null || $_POST["email"] == null || $_POST["password"] == null || $_POST['cpassword'] == null || $_POST["mob_no"]==null){
    header("Location:signup.php?error=Please enter all field appropriately&redirectURL=".$_POST['redirectURL']);
    die();
}
echo(2);
//$email = test_input($_POST["email"]);
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  header("Location:signup.php?error=Email is invalid&redirectURL=".$_POST['redirectURL']);
  die();
}
echo(3);
if($_POST['password'] != $_POST['cpassword']){
    header("Location:signup.php?error=Password didn't match&redirectURL=".$_POST['redirectURL']);
    die();
}
echo(4);
if(is_nan($_POST['mob_no'])){
    header("Location:signup.php?error=Please enter 10 digit mobile number&redirectURL=".$_POST['redirectURL']);
    die();
}
echo(5);
if(strlen($_POST['mob_no']) != 10){
    header("Location:signup.php?error=Please enter 10 digit mobile number&redirectURL=".$_POST['redirectURL']);
    die();
}
echo(6);
$statement=$connection->prepare("select email from users where email=?");
if($statement->execute(array($_POST['email']))){
    if($row=$statement->fetch()){
        header("Location:signup.php?error=This email is not available Try another one&redirectURL=".$_POST['redirectURL']);
        die();
    }
}
echo(7);
$date=date('Y-m-d');
$statement=$connection->prepare("insert into users(fname,lname,email,password,phone_no,date) values(?,?,?,?,?,?)");
if($statement->execute(array($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['password'],$_POST['mob_no'],$date))){
    session_start();
    $_SESSION['user_email']=$_POST['email'];
    $_SESSION['user_full_name']=$_POST['fname']." ".$_POST['lname'];
    header("Location:".$_POST['redirectURL']);
    die();
}
print_r($statement->errorInfo());
echo(8);
?>
