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
if($_POST['name']== null || $_POST['description']==NULL||$_POST['amount']==null || $_POST['date']==null){
    $link="edit_other_expenses.php?msg=Please fill up all the details&id=".$row->id."&searchKey=".$_POST['searchKey']."&start_date=".$_POST['start_date']."&end_date=".$_POST['end_date'];
    header('Location:'.$link);
    die();
}

function validateDate($date){
    $tempDate=  explode('-', $date);
    $count= sizeof($tempDate);
    if($count != 3){
        return FALSE;
    }else{
        if(!checkdate($tempDate[1], $tempDate[2], $tempDate[0])){
            return FALSE;
        }
    }
    
    return TRUE;
}
$dateFlag=  validateDate($_POST['date']);
if($dateFlag==FALSE){
    $link="edit_other_expenses.php?msg=Please enter proper date&id=".$_POST['id']."&searchKey=".$_POST['searchKey']."&start_date=".$_POST['start_date']."&end_date=".$_POST['end_date'];
    header('Location:'.$link);
    die();
}

$preparedstatement=$connection->prepare("UPDATE other_expenses SET name=?,description=?,amount=?,date=? WHERE id=?");
if($preparedstatement->execute(array($_POST['name'],$_POST['description'],$_POST['amount'],$_POST['date'],$_POST['id']))){
    $link="view_other_expenses.php?msg=Record Updated Successfully&searchKey=".$_POST['searchKey']."&start_date=".$_POST['start_date']."&end_date=".$_POST['end_date'];
    header('Location:'.$link);
    die();
}else{
    $link="edit_other_expenses.php?msg=ERROR WHILE UPDATING DATABASE&id=".$row->id."&searchKey=".$_POST['searchKey']."&start_date=".$_POST['start_date']."&end_date=".$_POST['end_date'];
    header('Location:'.$link);
    die();
}
?>