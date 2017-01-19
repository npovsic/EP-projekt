<?php

require_once("View.php");
require_once("sql/InitDB.php");
require_once("sql/DBSellers.php");


class SellerController {

    public static function index() {
        if(isset($_SESSION["seller"])) {
            $items = DBArticles::getArticlesFromSeller($_SESSION["seller"]);
            echo View::render("view/seller/layout.php", $items, false);
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

    public static function add_article_page() {
        if(isset($_SESSION["seller"])) {
            echo View::render("view/seller/add_article.php", null, false);
        } else {
            View::redirect(BASE_URL);
        }
    }

    private static function getLoginRules() {
        return [
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
    }

}
