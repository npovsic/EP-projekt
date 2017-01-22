<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBUsers.php';
$failedAttemptRegistration = false;
$successAttemptRegistration = false;
$failedCaptchaRegistration = false;
$successActivationRegistration = false;


if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]){
	if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST['first_name'])
		&& !empty($_POST['last_name']) && !empty($_POST['address']) && !empty($_POST['email'])
			&& !empty($_POST['city']) && !empty($_POST['country'])) {
			    try {
			        if (DBUsers::check($_POST["username"]) && DBSellers::check($_POST["username"])) { 	
				        if (DBUsers::register($_POST["username"], $_POST["password"], $_POST["first_name"], $_POST["last_name"],
				        	$_POST["address"], $_POST["email"], $_POST["city"], $_POST["country"])) {
				        	$successAttemptRegistration = true;
				            echo View::render("view/login_page.php", ["successAttemptRegistration" => $successAttemptRegistration], true);
				        }else {
				            $failedAttemptRegistration = true;
				            echo View::render("view/login_page.php", ["failedAttemptRegistration" => $failedAttemptRegistration], true);
				        }
			    	}else {
				            $failedAttemptRegistration = true;
				            echo View::render("view/login_page.php", ["failedAttemptRegistration" => $failedAttemptRegistration], true);
				    }
			    } catch (Exception $exc) {
			        echo $exc->getMessage();
			        exit(-1);
			    }
	}
	else {
		$failedAttemptRegistration = true;	
	    echo View::render("view/login_page.php", ["failedAttemptRegistration" => $failedAttemptRegistration], true);
	}
}
else {
	$failedCaptchaRegistration = true;	
    echo View::render("view/login_page.php", ["failedCaptchaRegistration" => $failedCaptchaRegistration], true);
}
