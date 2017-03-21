<?php
ob_start();
session_start();

if(!isset($_SESSION['no_of_items'])){
		if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']);
	die();
}else{
	header("location:index.php");
	die();
}
	}else{
		if($_SESSION['no_of_items']==0){
			
		header("location:something_went_wrong.php?a=1");
					die();
		}
	}
	
	
	if($_SESSION['total'] < 50){
		header("location:something_went_wrong.php?a=".$_SESSION['total']);
					die();
	}
	
	if($_SESSION['payment']=='cod'){
		header('location:buynow.php');
	}
	else if($_SESSION['payment']=='instamojo'){
		require("src/Instamojo.php");
		$api = new Instamojo\Instamojo('', '');
		try {
    $response = $api->paymentRequestCreate(array(
		"buyer_name" => $_SESSION['fname'],
        "purpose" => "malgadi order",
        "amount" => $_SESSION['total'],
        "send_email" => false,
		"phone" => $_SESSION['mnumber'],
		"allow_repeated_payments" => false,
        "email" => $_SESSION['email'],
        "redirect_url" => "http://malgadi.co.in/buynow.php"
        ));
	//$data=json_decode($response ,true);
	//print_r($response);
	$url = $response['longurl'];
	header("location:".$url);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
	header("location:something_went_wrong.php?a=3");
}
	}
	


?>
