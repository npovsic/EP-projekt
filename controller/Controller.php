<?php

require_once("View.php");
require_once("sql/InitDB.php");


class ItemController {


    public static function index() {
        $db = InitDB::getInstance();

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

    public static function details_page($id) {
        $db = InitDB::getInstance();

        $sql = "SELECT * FROM articles WHERE article_id=".$id;

        $sth = $db->prepare($sql);
        $sth->execute();

        $result = $sth->fetchAll();

        echo View::render("view/article_details.php", $result[0], true);
    }

    public static function cart() {
        echo View::render("view/cart_page.php", null, false);
    }

    public static function checkout() {
        echo View::render("view/checkout_page.php", null, false);
    }

    public static function wip() {
        echo View::render("view/wip.php", null, false);
    }

    public static function login() {
        $data = filter_input_array(INPUT_POST, self::getLoginRules());
        require('actions/login.php');
    }
    public static function logout() {
        session_destroy();
        header("Location: ../index.php");
    }

    public static function register() {
        $data = filter_input_array(INPUT_POST, self::getRegisterRules());
        require('actions/register.php');
    }

    public static function search($query) {
        require('actions/search.php');
    }

    private static function getLoginRules() {
        return [
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
    }

    private static function getRegisterRules() {
        return [
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
            'first_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'last_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_SPECIAL_CHARS,
            'address' => FILTER_SANITIZE_SPECIAL_CHARS,
            'city' => FILTER_SANITIZE_SPECIAL_CHARS,
            'country' => FILTER_SANITIZE_SPECIAL_CHARS
        ];
    }

}
