<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBUsers.php';
$failedAttempt = false;

if (isset($_POST["username"]) &&
    isset($_POST["password"]) &&
    isset($_POST["first_name"]) &&
    isset($_POST["last_name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["address"]) &&
    isset($_POST["city"]) &&
    isset($_POST["country"]) &&
    isset($_POST['active_user']) &&
    (($_POST['active_user'] == 1) || ($_POST['active_user'] == 0))
) {
    try {
        if ($_SESSION['seller']) {
            DBUsers::editUser($id, $_POST);
            View::redirect(SELLER_URL."all-users");
        } else {
            $failedAttempt = true;
            echo View::render("view/login_page.php", ["failedAttempt" => $failedAttempt], true);
        }
    } catch (Exception $exc) {
        echo $exc->getMessage();
        exit(-1);
    }
}
else {
    echo View::render("view/seller/edit_user.php", ["variables" => $_POST, "failedAttempt" => "Fill out all fields."], true);
}
