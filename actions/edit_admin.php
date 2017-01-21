<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBSellers.php';
$failedAttempt = false;

if (isset($_POST["username"]) &&
    isset($_POST["password"]) &&
    isset($_POST["first_name"]) &&
    isset($_POST["last_name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["address"]) &&
    isset($_POST["city"]) &&
    isset($_POST["country"]) &&
    isset($_POST['active_seller']) &&
    (($_POST['active_seller'] == 1) || ($_POST['active_seller'] == 0))
) {
    try {
        if ($_SESSION['admin']) {
            DBSellers::editSeller($id, $_POST);
            View::redirect(BASE_URL."admin");
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
    echo View::render("view/admin/edit_seller.php", ["variables" => $_POST, "failedAttempt" => "Fill out all fields."], true);
}
