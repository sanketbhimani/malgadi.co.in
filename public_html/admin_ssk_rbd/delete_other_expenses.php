<?php
  session_start();
  if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
 }
include '../connection.php';
$connection=new PDO("mysql:host=$host;dbname=$db",$uname,$pass);
if($connection==null){
    echo "ERROR WHILE CONNECTING TO DATABASE";
    die();
}

if(!isset($_GET['id'])){
    $path="Location:".$_SERVER['HTTP_REFERER'];
    header($path);
}

$statement=$connection->prepare("SELECT * FROM other_expenses WHERE id=?");
if($statement->execute(array($_GET['id']))){
    if($row=$statement->fetch(PDO::FETCH_OBJ)){
        
    }else{
        echo "Data you have requested is not available!";
        echo "<a href='view_other_expenses.php'>Back</a>";
        die();
    }
        
}

$statement=$connection->prepare("DELETE FROM other_expenses WHERE id=?");
if($statement->execute(array($_GET['id']))){
    $path="Location:view_other_expenses.php?searchKey=".$_GET['searchKey']."&start_date=".$_GET['start_date']."&end_date=".$_GET['end_date']."&msg=Record deleted successfully";
    header($path);
    die();
}  else {
    echo $statement->errorInfo();
}
?>