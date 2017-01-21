<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBSellers.php';
try {
    if ($_SESSION['admin']) {
        DBSellers::addSeller($data);
        View::redirect(BASE_URL."admin");
    } else {
        echo View::render("view/login_page.php", ["failedAttempt" => true], true);
    }
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}
