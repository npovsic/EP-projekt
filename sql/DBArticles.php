<?php

class DBArticles {
    public static function getArticles() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM articles");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getArticlesFromSeller($username) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM articles JOIN sellers USING(id_seller) WHERE "
            . "username = ?");
        $stmt->bindValue(1, $username);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getArticle($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM articles JOIN sellers USING(id_seller) WHERE "
            . "id_article = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function addArticle() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("INSERT");
        $stmt->execute();
    }

    public static function editArticle($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public static function rateArticle($id, $rating) {
        $db = InitDB::getInstance();

        $stmtRating = $db->prepare("INSERT INTO ratings (username, id_article, rating) VALUES (?, ?, ?)");
        $stmtRating->bindValue(1, $_SESSION["username"]);
        $stmtRating->bindValue(2, $id);
        $stmtRating->bindValue(3, $rating);
        $stmtRating->execute();

        $stmt = $db->prepare("UPDATE articles SET rating_sum = rating_sum + ?, rating_count = rating_count + 1 WHERE id_article= ?");
        $stmt->bindValue(1, $rating);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }

    public static function didUserRateProduct($username, $article_id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM `e-store`.ratings WHERE username = ? AND id_article = ?");
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $article_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll()[0]["rating"];
        } else {
            return false;
        }
    }

}

