<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBUsers.php';

try {
    if ($id = DBUsers::login($data["uname"], $data["password"])) {
        if (DBUsers::checkActivation($data["uname"], $data["password"])) {
            session_regenerate_id(true);
            $_SESSION["logged_in"] = true;
            $_SESSION["user"] = $data["uname"];
            $_SESSION["id"] = $id;
            View::redirect(BASE_URL);
        }
        else{
            echo View::render("view/login_page.php", ["failedActivation" => true], true);
        }
    } else if ($id = DBSellers::login($_POST["uname"], $_POST["password"])) {
        session_regenerate_id(true);
        $_SESSION["logged_in"] = true;
        $_SESSION["seller"] = $_POST["uname"];
        $_SESSION["id"] = $id;

        $text = "[".date('d/m/Y h:i:s a', time())."] - logged in: ".$_SESSION["seller"];
        include '/actions/log.php';

        View::redirect(BASE_URL . "seller");
    } else {
        echo View::render("view/login_page.php", ["failedAttempt" => true], true);
    }
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}

