<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBAdmins.php';

try {
    if (DBAdmins::login($_POST["uadmin"], $_POST["password"])) {
        session_regenerate_id(true);
        $_SESSION["logged_in"] = true;
        $_SESSION["admin"] = $_POST["uadmin"];

        $items = DBSellers::getSellers();

        echo View::render("view/admin/layout.php", $items, false);
    } else {
        echo View::render("view/admin/login_page.php", ["failedAttempt" => "Napačni podatki."], true);
    }
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}
