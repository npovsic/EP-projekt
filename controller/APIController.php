<?php

require_once("View.php");
require_once("sql/InitDB.php");
require_once("sql/DBArticles.php");


class APIController {


    public static function index() {
        $items = DBArticles::getActiveArticles();
        echo View::renderJSON($items);
    }

    public static function get_article($id) {
        try {
            $db = InitDB::getInstance();

            $sql = "SELECT * FROM articles WHERE article_id=".$id;

            $sth = $db->prepare($sql);
            $sth->execute();

            $result = $sth->fetchAll();

            echo View::renderJSON($result[0]);
        } catch (InvalidArgumentException $e) {
            echo View::renderJSON($e->getMessage(), 404);
        }
    }
}
