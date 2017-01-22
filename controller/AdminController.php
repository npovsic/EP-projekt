<?php

require_once("View.php");
require_once("sql/InitDB.php");
require_once("sql/DBSellers.php");
require_once("sql/DBAdmins.php");
require_once ("actions/Hash.php");

class AdminController {

    public static function index() {

    }

    public static function login_page() {
        if(isset($_SESSION["admin"])) {
            $items = DBSellers::getSellers();
            echo View::render("view/admin/layout.php", $items, false);
        } else {
            echo View::render("view/admin/login_page.php", null, false);
        }
    }

    public static function login() {
        if(isset($_SESSION["admin"])) {
            $items = DBSellers::getSellers();
            echo View::render("view/admin/layout.php", $items, false);
        } else {
            $data = filter_input_array(INPUT_POST, self::getLoginRules());
            if (self::checkArray($data)) {
                require('actions/login_admin.php');
            }
            else {
                echo View::render("view/admin/login_page.php", ["failedAttempt" => "Izpolnite vsa polja."], true);
            }
        }
    }

    public static function edit_admin_page() {
        if(isset($_SESSION["admin"])) {
            $items = DBAdmins::getAdminInfo("admin");
            echo View::render("view/admin/edit_admin.php", $items, false);
        } else {
            View::redirect(ADMIN_URL);
        }
    }

    public static function edit_admin() {
        if(isset($_SESSION["admin"])) {
            $data = filter_input_array(INPUT_POST, self::getEditAdminRules());
            var_dump($data);
            if (self::checkArray($data)) {
                require('actions/edit_admin.php');
                View::redirect(BASE_URL."admin");
            }
            else {
                $items = DBAdmins::getAdminInfo("admin");
                echo View::render("view/admin/edit_admin.php", ["variables" => $items, "failedAttempt" => "Izpolnite vsa polja."], true);
            }
        } else {
            View::redirect(ADMIN_URL);
        }
    }

    public static function add_seller_page() {
        if(isset($_SESSION["admin"])) {
            echo View::render("view/admin/add_seller.php", null, false);
        } else {
            View::redirect(ADMIN_URL);
        }
    }

    public static function add_seller() {
        if(isset($_SESSION["admin"])) {
            $data = filter_input_array(INPUT_POST, self::getAddSellerRules());
            if (self::checkArray($data)) {
                require('actions/add_seller.php');
            }
            else {
                echo View::render("view/admin/add_seller.php", ["failedAttempt" => "Izpolnite vsa polja."], true);
            }
        } else {
            View::redirect(ADMIN_URL);
        }
    }

    public static function edit_seller_page($id) {
        if(isset($_SESSION["admin"])) {
            $items = DBSellers::getSellerInfo($id);
            echo View::render("view/admin/edit_seller.php", $items, false);
        } else {
            View::redirect(ADMIN_URL);
        }
    }

    public static function edit_seller($id) {
        if(isset($_SESSION["admin"])) {
            $data = filter_input_array(INPUT_POST, self::getEditSellerRules());
            if (self::checkArray($data)) {
                require('actions/edit_seller.php');
                View::redirect(BASE_URL."admin");
            }
            else {
                $items = DBSellers::getSellerInfo($id);
                echo View::render("view/admin/edit_seller.php", ["variables" => $items, "failedAttempt" => "Izpolnite vsa polja."], true);
            }
        } else {
            View::redirect(ADMIN_URL);
        }
    }

    private static function getEditAdminRules() {
        return [
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
            'first_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'last_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL
        ];
    }

    private static function getAddSellerRules() {
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

    private static function getEditSellerRules() {
        return [
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
            'first_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'last_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL,
            'address' => FILTER_SANITIZE_SPECIAL_CHARS,
            'city' => FILTER_SANITIZE_SPECIAL_CHARS,
            'country' => FILTER_SANITIZE_SPECIAL_CHARS,
            'active_seller' => array('filter'    => FILTER_VALIDATE_INT,
                'options'   => array('min_range' => 0, 'max_range' => 1)
            ),
        ];
    }

    private static function getLoginRules() {
        return [
            'uadmin' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
    }

    private static function checkArray($array) {
        foreach ($array as $key => $value) {
            if ($key != "password" && $key != "active_seller") {
                if (empty($value) || $value === false) {
                    return false;
                }
            }
        }
        return true;
    }
}
