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

}

