<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBSellers.php';
$failedAttempt = false;

if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST['first_name'])
    && !empty($_POST['last_name']) && !empty($_POST['address']) && !empty($_POST['email'])
    && !empty($_POST['city']) && !empty($_POST['country'])) {
    try {
        if (DBUsers::check($_POST["username"]) && DBSellers::check($_POST["username"])) {
            if (DBUsers::register($_POST["username"], $_POST["password"], $_POST["first_name"], $_POST["last_name"],
                $_POST["address"], $_POST["email"], $_POST["city"], $_POST["country"])) {

                View::redirect(SELLER_URL."all-users");
            }
            else {
                $failedAttemptRegistration = true;
                echo View::render("view/seller/add_user.php", ["failedAttemptRegistration" => $failedAttemptRegistration], true);
            }
        }
        else {
            $failedAttemptRegistration = true;
            echo View::render("view/seller/add_user.php", ["failedAttemptRegistration" => $failedAttemptRegistration], true);
        }
    } catch (Exception $exc) {
        echo $exc->getMessage();
        exit(-1);
    }
}
else {
    $failedAttemptRegistration = true;
    echo View::render("view/seller/add_user.php", ["failedAttemptRegistration" => $failedAttemptRegistration], true);
}
