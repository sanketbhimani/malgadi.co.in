<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}

include '../connection.php';
$connection=new PDO("mysql:host=$host;dbname=$db",$uname,$pass);

if(!isset($_GET['id'])){
    header('Location:view_other_expenses.php');
    die();
}

$statement=$connection->prepare("SELECT * FROM other_expenses WHERE id=?");
if($statement->execute(array($_GET['id']))){
    if($row=$statement->fetch(PDO::FETCH_OBJ)){
        $name=$row->name;
        $id=$row->id;
        $description=$row->description;
        $amount=$row->amount;
        $date=$row->date;
    }else{
        echo "Data you have requested is not available!";
        echo "<a href='view_other_expenses.php'>Back</a>";
        die();
    }
        
}
?>
<html>
    <head>
        <title>Edit Expenses</title>
    <script type="text/javascript">
            function validateForm(){
                if(document.myform.name.value == ""){
                    document.getElementById('nameError').innerHTML="Please enter name";
                    return false;
                }else{
                    document.getElementById('nameError').innerHTML="";
                }
                
                if(document.myform.description.value==""){
                    document.getElementById('descriptionError').innerHTML="Please provide description";
                    return false;
                }else{
                    document.getElementById('descriptionError').innerHTML="";
                }
                
                if(document.myform.date.value==""){
                    document.getElementById('dateError').innerHTML="Please enter date";
                    return false;
                }else{
                    document.getElementById('dateError').innerHTML="";
                }
                
                if(document.myform.amount.value==""){
                    document.getElementById('amountError').innerHTML="Please Enter Amount";
                    return false;
                }else if(isNaN(document.myform.amount.value)){
                    document.getElementById('amountError').innerHTML="Please enter valid amount";
                    return false;
                }else{
                    document.getElementById('amountError').innerHTML="";
                }
                return true;
            }
    
        </script>
    </head>
    <body>
    <center>
        <h1>Malgadi.co.in Admin</h1>
    </center>
    <h2>Edit expenses..</h2>
    <a href="view_other_expenses.php">Back</a>
    <hr>
    <form name="myform" onsubmit="return(validateForm());" method="post" action="updateexpenses.php">
        <input type="hidden" name="id" value=<?PHP echo $id ?>>
        <input type="hidden" name="searchKey" value=<?PHP echo $_GET['searchKey'] ?>>
        <input type="hidden" name="start_date" value=<?PHP echo $_GET['start_date'] ?>>
        <input type="hidden" name="end_date" value=<?PHP echo $_GET['end_date'] ?>>
        <?PHP
            if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
        <table>
            <tr>
                <td>Name</td><td><input type="text" id="name" name="name" placeholder="Enter Name of Person" value=<?PHP echo $name; ?> ></td><td><p id="nameError"></p></td>
            </tr>
            <tr>
                <td>Description</td><td><textarea id="description"  name="description" placeholder="Enter description of expenses" rows="5" cols="50"><?PHP echo $description; ?></textarea></td><td><p id="descriptionError"></p></td>
            </tr>
            <tr>
                <td>Amount</td><td><input type="text" id="amount" name="amount" value=<?PHP echo $amount; ?> placeholder="Cost of expenses" ></td><td><p id="amountError"></p></td>
            </tr>
            <tr>
                <td>Date(yyyy-mm-dd)</td><td><input type="text" id="date" name="date" value=<?PHP echo $date; ?>></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Update">
    </form> 
    </body>
</html>


