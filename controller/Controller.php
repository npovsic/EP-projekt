<?php

require_once("View.php");

class ItemController {

    public static function index($db) {
        $sql = "SELECT * FROM articles";

        $items = array();

        foreach ($db->query($sql) as $row) {
            array_push($items, $row);
        }

        echo View::render("view/layout.php", $items, false);
    }

    public static function login_page() {
        echo View::render("view/login_page.php", null, false);
    }

    public static function register_page() {
        echo View::render("view/register_page.php", null, false);
    }

    public static function details_page($id) {
        echo View::render("view/article_details.php", ["id" => $id], true);
    }

    public static function wip() {
        echo View::render("view/wip.php", null, false);
    }

    public static function login() {
        $data = filter_input_array(INPUT_POST, self::getRules());
        require('actions/login.php');
    }

    public static function register() {
        require('actions/register.php');
    }

    private static function getRules() {
        return [
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
    }

}
