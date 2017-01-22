<?php

require_once("View.php");
require_once("sql/InitDB.php");
require_once("sql/DBSellers.php");
require_once ("actions/Hash.php");

class SellerController {

    public static function index() {
        if(isset($_SESSION["seller"])) {
            $items = DBArticles::getArticlesFromSeller($_SESSION["seller"]);
            echo View::render("view/seller/layout.php", $items, false);
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function edit_seller_page($id) {
        if(isset($_SESSION["seller"])) {
            $items = DBSellers::getSellerInfo($id);
            echo View::render("view/seller/edit_seller.php", $items, false);
        } else {
            View::redirect(ADMIN_URL);
        }
    }

    public static function edit_seller($id) {
        if(isset($_SESSION["seller"])) {
            $data = filter_input_array(INPUT_POST, self::getEditSellerRules());
            if (self::checkArray($data)) {
                require('actions/edit_seller.php');
                View::redirect(SELLER_URL);
            }
            else {
                $items = DBSellers::getSellerInfo($id);
                echo View::render("view/seller/edit_seller.php", ["variables" => $items, "failedAttempt" => "Izpolnite vsa polja."], true);
            }
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function edit_article_page($id) {
        if(isset($_SESSION["seller"])) {
            $items = DBArticles::getArticle($id);

            echo View::render("view/seller/edit_article.php", $items, false);
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function edit_article($id) {
        if(isset($_SESSION["seller"])) {
            require('actions/edit_article.php');
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function delete_article($id) {
        if(isset($_SESSION["seller"])) {
            require('actions/delete_article.php');
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function add_article_page() {
        if(isset($_SESSION["seller"])) {
            echo View::render("view/seller/add_article.php", null, false);
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function add_article() {
        if(isset($_SESSION["seller"])) {
            require('actions/add_article.php');
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function all_users() {
        if(isset($_SESSION["seller"])) {
            $items = DBUsers::getUsers();
            echo View::render("view/seller/all_users.php", $items, false);
        } else {
            require('actions/login_admin.php');
        }
    }

    public static function edit_user_page($id) {
        if(isset($_SESSION["seller"])) {
            $items = DBUsers::getUserInfo($id);
            echo View::render("view/seller/edit_user.php", $items, false);
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function edit_user($id) {
        if(isset($_SESSION["seller"])) {
            $data = filter_input_array(INPUT_POST, self::getEditUserRules());
            if (self::checkArray($data)) {
                require('actions/edit_user.php');
                View::redirect(SELLER_URL."all-users");
            }
            else {
                $items = DBUsers::getUserInfo($id);
                echo View::render("view/seller/edit_user.php", ["variables" => $items, "failedAttempt" => "Izpolnite vsa polja."], true);
            }
        } else {
            View::redirect(BASE_URL);
        }

        if(isset($_SESSION["seller"])) {
            require('actions/edit_user.php');
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function add_user_page() {
        if(isset($_SESSION["seller"])) {
            echo View::render("view/seller/add_user.php", null, false);
        } else {
            View::redirect(BASE_URL);
        }
    }

    public static function add_user() {
        if(isset($_SESSION["seller"])) {
            require('actions/add_user.php');
        } else {
            View::redirect(BASE_URL);
        }
    }

    private static function getEditSellerRules() {
        return [
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
            'first_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'last_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL,
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
            'country' => FILTER_SANITIZE_SPECIAL_CHARS,
            'active_user' => array('filter'    => FILTER_VALIDATE_INT,
                'options'   => array('min_range' => 0, 'max_range' => 1)
            ),
        ];
    }

    private static function checkArray($array) {
        foreach ($array as $key => $value) {
            if ($key != "password" && $key != "active_user") {
                if (empty($value) || $value === false) {
                    return false;
                }
            }
        }
        return true;
    }

}
