<?php

require_once("View.php");

class ItemController {

    public static function index($db) {
        $sql = "SELECT * FROM merchandise";

        $items = array();

        foreach ($db->query($sql) as $row) {
            array_push($items, $row);
        }

        echo View::render("view/layout.php", $items, false);
    }

    public static function login() {
        echo View::render("view/login.php", null, false);
    }

    public static function register() {
        echo View::render("view/register.php", null, false);
    }

    public static function details_page($id) {
        echo View::render("view/article_details.php", ["id" => $id], true);
    }

    public static function wip() {
        echo View::render("view/wip.php", null, false);
    }

}
