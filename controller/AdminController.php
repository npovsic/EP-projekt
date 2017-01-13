<?php

require_once("View.php");
require_once("sql/InitDB.php");
require_once("sql/DBSellers.php");


class AdminController {

    public static function index() {

    }

    public static function login() {
        if(isset($_SESSION["admin"])) {
            $items = DBSellers::getSellers();
            echo View::render("view/admin/layout.php", $items, false);
        } else {
            require('actions/login_admin.php');
        }
    }

    public static function add_seller_page() {
        if(isset($_SESSION["admin"])) {
            echo View::render("view/admin/add_seller.php", null, false);
        } else {
            require('actions/login_admin.php');
        }
    }

    public static function add_seller() {
        if(isset($_SESSION["admin"])) {
            require('actions/add_seller.php');
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
