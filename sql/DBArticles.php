<?php

class DBArticles {
    public static function getArticles() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM articles");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getActiveArticles() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM articles WHERE active_seller = 1 AND active_article = 1");
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

    public static function searchArticles($query) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM `e-store`.articles WHERE name LIKE ?");
        $stmt->bindValue(1, "%".$query."%");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function addArticle($data, $pictureName, $sellerId) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("INSERT INTO articles "
            . "(name, category, price, description, picture, weight, id_seller) "
            . "VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $data['name']);
        $stmt->bindValue(2, $data['category']);
        $stmt->bindValue(3, $data['price']);
        $stmt->bindValue(4, $data['description']);
        $stmt->bindValue(5, $pictureName);
        $stmt->bindValue(6, $data['weight']);
        $stmt->bindValue(7, $sellerId);
        $stmt->execute();
    }

    public static function editArticle($id, $data) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE articles "
            . "SET name = ?, category = ?, price = ?, description = ?, weight = ?, active_article = ? "
            . "WHERE id_article = ?");
        $stmt->bindValue(1, $data['name']);
        $stmt->bindValue(2, $data['category']);
        $stmt->bindValue(3, $data['price']);
        $stmt->bindValue(4, $data['description']);
        $stmt->bindValue(5, $data['weight']);
        $stmt->bindValue(6, $data['active_article']);
        $stmt->bindValue(7, $id);
        $stmt->execute();
    }

    public static function deleteArticle($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("DELETE from articles WHERE id_article = ? ");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public static function rateArticle($id, $rating) {
        $db = InitDB::getInstance();

        $stmtRating = $db->prepare("INSERT INTO ratings (id_user, id_article, rating) VALUES (?, ?, ?)");
        $stmtRating->bindValue(1, $_SESSION["id"]);
        $stmtRating->bindValue(2, $id);
        $stmtRating->bindValue(3, $rating);
        $stmtRating->execute();

        $stmt = $db->prepare("UPDATE articles SET rating_sum = rating_sum + ?, rating_count = rating_count + 1 WHERE id_article= ?");
        $stmt->bindValue(1, $rating);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }

    public static function didUserRateProduct($user_id, $article_id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM ratings WHERE id_user = ? AND id_article = ?");
        $stmt->bindValue(1, $user_id);
        $stmt->bindValue(2, $article_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll()[0]["rating"];
        } else {
            return false;
        }
    }
    public static function getForIds($ids) {
        $db = InitDB::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id_article, name, category, price, description, picture, weight, id_seller FROM articles 
            WHERE id_article IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = InitDB::getInstance();

        $statement = $db->prepare("SELECT id_article, name, category, price, description, picture, weight, id_seller FROM articles");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = InitDB::getInstance();

        $stmt = $db->prepare("SELECT id_article, name, category, price, description, picture, weight, id_seller FROM articles WHERE id_article = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $product = $stmt->fetch();

        if ($product != null) {
            return $product;
        } else {
            throw new InvalidArgumentException("No record with id $id");
        }
    }
}

