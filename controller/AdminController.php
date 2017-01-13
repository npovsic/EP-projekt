<?php

require_once("View.php");
require_once("sql/InitDB.php");


class AdminController {

    public static function index() {
        $db = InitDB::getInstance();

        $sql = "SELECT * FROM sellers";

        $items = array();

        foreach ($db->query($sql) as $row) {
            array_push($items, $row);
        }

        echo View::render("view/admin/layout.php", $items, false);
    }

    public static function login() {
        if(isset($_SESSION["admin"])) {
            $db = InitDB::getInstance();

            $sql = "SELECT * FROM sellers";

            $items = array();

            foreach ($db->query($sql) as $row) {
                array_push($items, $row);
            }

            echo View::render("view/admin/layout.php", $items, false);
        } else {
            require('actions/login_admin.php');
        }
    }


    private static function getLoginRules() {
        return [
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
    }

}
