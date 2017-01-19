<?php

class DBArticles {
    public static function getArticles() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM articles");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getArticle($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM articles WHERE "
            . "id_article = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function rateArticle($id, $rating) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE articles SET rating_sum = rating_sum + ?, rating_count = rating_count + 1 WHERE id_article= ?");
        $stmt->bindValue(1, $rating);
        $stmt->bindValue(2, $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

}

