<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}

include '../connection.php';
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
if(isset($_GET['start_date'])){
    if(!validateDate($_GET['start_date'])){
        $_GET['start_date']="2016-01-01";
    }
}else{
    $_GET['start_date']="2016-01-01";
}

if(isset($_GET['end_date'])){
    if(!validateDate($_GET['end_date'])){
        $_GET['end_date']=date('Y-m-d');
    }
}else{
    $_GET['end_date']=date('Y-m-d');
}

if(!isset($_GET['searchKey'])){
    $_GET['searchKey']="";
}
?>


<html>
    <head>
        <title>
            View Other Expenses
        </title>
    </head>
    <body>
        <center>
        <h1>Malgadi.co.in Admin</h1>
        </center>
        <h2>View other expenses..</h2>
        <a href="home.php">Back</a>
        <hr>
        <b>Filter:-</b><br>
        <form name="form1" action="view_other_expenses.php" method="get">
            
          
            <table>
                <tr>
                    <td>Search:</td><td>
                    <?PHP
                    echo "<input type='text' name='searchKey' placeholder='Keyword' value=".$_GET['searchKey'].">";
                    ?>
                    </td>
                </tr>
                <tr><td>Start Date:(yyyy-mm-dd)</td>
                    <td>
                        <?PHP
                            echo "<input type='text' name='start_date' value=".$_GET['start_date'].">";
                        ?>
                    </td></tr>
                <tr>
                    <td>End Date:(yyyy-mm-dd)</td>
                    <td>
                        <?PHP
                            echo "<input type='text' name='end_date' value=".$_GET['end_date'].">";
                        ?>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Search">
        </form><hr>
        <?PHP
        
            if(isset($_GET['msg'])){
                echo $_GET['msg']."<br>";
            }
        ?>
        <b>Results</b><br>


<?PHP
$connection=new PDO("mysql:host=$host;dbname=$db",$uname,$pass);
if($connection==null){
    echo "ERROR WHILE CONNECTING TO DATABASE";
    die();
}
            
echo "<table width=100% >";
echo "<tr><td><b>Name</b></td>";
echo "<td><b>Description</b></td>";
echo "<td><b>Amount</b></td>";
echo "<td><b>Date</b></td>";
$key="%".$_GET['searchKey']."%";
$total_amount=0;
$statement=$connection->prepare("SELECT * FROM other_expenses WHERE date >=? and date <= ? and (name like ? or description like ? )");
if($statement->execute(array($_GET['start_date'],$_GET['end_date'],$key,$key))){
    while($row=$statement->fetch(PDO::FETCH_OBJ)){
        $total_amount=$total_amount+$row->amount;
        echo "<tr>";
        echo "<td>".$row->name."</td>";
        echo "<td>".$row->description."</td>";
        echo "<td>".$row->amount."</td>";
        echo "<td>".$row->date."</td>";
        $link="edit_other_expenses.php?id=".$row->id."&searchKey=".$_GET['searchKey']."&start_date=".$_GET['start_date']."&end_date=".$_GET['end_date'];
        echo "<td><a href=\"$link\">Modify</a>";
        $link="delete_other_expenses.php?id=".$row->id."&searchKey=".$_GET['searchKey']."&start_date=".$_GET['start_date']."&end_date=".$_GET['end_date'];
        echo "<td><a href=\"$link\">Delete Record</a>";
        echo "</tr>";
    }
    
    echo "<b><right>Total amount:- $total_amount</right></b>"; 
}else{
    echo $statement->errorInfo();
    echo $statement->errorCode();
    
}
    echo "</table>";
?>

</body>
</html>