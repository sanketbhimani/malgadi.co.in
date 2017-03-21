<?PHP

include 'connection.php';
include('mail/class.phpmailer.php');

$connection=new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
$statement=$connection->prepare("select * from users where email=?");

if($statement->execute(array($_POST['email']))){
    if(!$row=$statement->fetch(PDO::FETCH_OBJ)){
        header("Location:forgotpassword.php?msg=Invalid email id");
        die();
    }else{
        $password=$row->password;
        
        $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->IsHTML(false);
            $mail->Username = "snk.bhimani.jnd@gmail.com";
            $mail->Password = "SNK.bhimani3";
            $mail->SetFrom("snk.bhimani.jnd@gmail.com");
            $mail->Subject = "Password request for malgadi account";
            $mail->Body = "Password of your malgadi account registered with email ".$_POST['email']." is : ".$password;
            $mail->AddAddress($_POST['email']);
            $mail->Send();
            
            header("Location:forgotpassword.php?msg=Your password has been sent to your registered email account");
            die();
    }
}

?>