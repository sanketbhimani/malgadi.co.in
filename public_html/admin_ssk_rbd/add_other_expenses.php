<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}
?>
<html>
    <head>
        <title>Add Other Expenses</title>
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
    <h2>Add other expenses..</h2>
    <a href="home.php">Back</a>
    <hr>
    <form name="myform" onsubmit="return(validateForm());" method="post" action="addexpenses.php">
        <?PHP
            if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
        <table>
            <tr>
                <td>Name</td><td><input type="text" id="name" name="name" placeholder="Enter Name of Person" ></td><td><p id="nameError"></p></td>
            </tr>
            <tr>
                <td>Description</td><td><textarea id="description" name="description" placeholder="Enter description of expenses" rows="5" cols="50" ></textarea></td><td><p id="descriptionError"></p></td>
            </tr>
            <tr>
                <td>Amount</td><td><input type="text" id="amount" name="amount" placeholder="Cost of expenses" ></td><td><p id="amountError"></p></td>
            </tr>
            <tr>
                <td>Date(yyyy-mm-dd)</td><td><input type="text" id="date" name="date" value=<?PHP echo date('Y-m-d'); ?>></td><td><p id="dateError"></p></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Add">
    </form> 
    </body>
</html>


