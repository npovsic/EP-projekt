<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBAdmins.php';

try {
    if (DBAdmins::login($_POST["uadmin"], $_POST["password"])) {
        session_regenerate_id(true);
        $_SESSION["logged_in"] = true;
        $_SESSION["admin"] = $_POST["uadmin"];

        $text = "[".date('d/m/Y h:i:s a', time())."] - logged in: ".$_SESSION["admin"];
        include ACTIONS_URL.'log.php';

        View::redirect(ADMIN_URL);
    } else {
        echo View::render("view/admin/login_page.php", ["failedAttempt" => "Napačni podatki."], true);
    }
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}
