<?php

require_once("View.php");
require_once("sql/InitDB.php");
require_once("sql/DBArticles.php");
require_once("sql/DBUsers.php");
require_once ("actions/Hash.php");

class Controller {

    public static function index() {
        if(isset($_SESSION["admin"])) {
            View::redirect(BASE_URL . "admin");
        } else if(isset($_SESSION["seller"])) {
            View::redirect(BASE_URL . "seller");
        }
        else {
            $items = DBArticles::getActiveArticles();
            echo View::render("view/layout.php", $items, false);
        }
    }

    public static function login_page() {
        echo View::render("view/login_page.php", null, false);
    }

    public static function login() {
        $data = filter_input_array(INPUT_POST, self::getLoginRules());
        if (self::checkArray($data)) {
            require('actions/login.php');
        }
        else {
            echo View::render("view/login_page.php", ["failedAttempt" => true], true);
        }
    }

    public static function rate() {
        $rating = $_POST['rating_value'];
        $id = $_POST['id'];

        DBArticles::rateArticle($id, $rating);
    }

    public static function details_page($id) {
        $result = DBArticles::getArticle($id);

        $alreadyRated = false;

        if (isset($_SESSION["user"])) {
            $alreadyRated = DBArticles::didUserRateProduct($_SESSION["id"], $id);
        }

        echo View::render("view/article_details.php", ["result" => $result, "alreadyRated" => $alreadyRated], true);
    }

    public static function activation($id, $token) {
        $result = DBUsers::activateUser($id, $token);
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

    public static function edit_user_page($id) {
        $items = DBUsers::getUserInfo($id);
        echo View::render("view/edit_user.php", $items, false);
    }

    public static function edit_user($id) {
        $data = filter_input_array(INPUT_POST, self::getEditUserRules());
        if (self::checkArray($data)) {
            require('actions/edit_user.php');
            View::redirect(BASE_URL);
        }
        else {
            $items = DBUsers::getUserInfo($id);
            echo View::render("view/edit_user.php", $items, false);
        }
    }

    public static function user_orders($id) {
        $items = DBUsers::getUserInfo($id);
        echo View::render("view/edit_user.php", $items, false);
    }

    public static function search($query) {
        $items = DBArticles::searchArticles($query);
        echo View::render("view/search_page.php", ["variables" => $items, "query" => $query], true);
    }

    private static function getLoginRules() {
        return [
            'uname' => FILTER_SANITIZE_SPECIAL_CHARS,
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
            'phone_num' => array('filter' => FILTER_VALIDATE_REGEXP,
                'options'   => array('regexp' => '/^\+?(\d){3,9}$/')),
            'address' => FILTER_SANITIZE_SPECIAL_CHARS,
            'city' => FILTER_SANITIZE_SPECIAL_CHARS,
            'country' => FILTER_SANITIZE_SPECIAL_CHARS
        ];
    }

    private static function getEditUserRules() {
        return [
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL,
            'phone_num' => array('filter' => FILTER_VALIDATE_REGEXP,
                'options'   => array('regexp' => '/^\+?(\d){3,9}$/')),
            'address' => FILTER_SANITIZE_SPECIAL_CHARS,
            'city' => FILTER_SANITIZE_SPECIAL_CHARS,
            'country' => FILTER_SANITIZE_SPECIAL_CHARS
        ];
    }

    private static function checkArray($array) {
        foreach ($array as $key => $value) {
            if ($key != "password") {
                if (empty($value) || $value === false) {
                    return false;
                }
            }
        }
        return true;
    }
}
