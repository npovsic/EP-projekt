<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBUsers.php';
$failedAttempt = false;

if (isset($_POST["uname"]) && isset($_POST["password"])) {
    try {
        if (DBUsers::login($_POST["uname"], $_POST["password"])) {
            session_regenerate_id(true);
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $_POST["uname"];
            View::redirect(BASE_URL);
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
    echo View::render("view/login_page.php", ["failedAttempt" => $failedAttempt], true);
}
