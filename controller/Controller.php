<?php

require_once("View.php");
require_once("sql/InitDB.php");
require_once("sql/DBArticles.php");
require_once("sql/DBUsers.php");


class Controller {


    public static function index() {
        if(isset($_SESSION["admin"])) {
            View::redirect(BASE_URL . "admin");
        } else {
            $items = DBArticles::getArticles();
            echo View::render("view/layout.php", $items, false);
        }
    }

    public static function login() {
        require('actions/login.php');
//        echo View::render("view/login_page.php", null, false);
    }

    public static function rate() {
        echo "string";
        $rating = $_POST['rating_value'];
        $id = $_POST['id'];

        $result = DBArticles::rateArticle($id, $rating);

        echo View::render("view/article_details.php", $result[0], true);
    }

    public static function details_page($id) {
        $result = DBArticles::getArticle($id);
        echo View::render("view/article_details.php", $result[0], true);
    }
    public static function activation($id) {
        $result = DBUsers::activateUser($id);
        View::redirect("/login");    
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

    public static function logout() {
        session_destroy();
        View::redirect(BASE_URL);
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
