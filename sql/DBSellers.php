<?php

class DBSellers {

    public static function login($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_seller) FROM sellers WHERE "
                . "username = ? AND password = ?");
        $stmt->bindValue(1, $uname);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }

    public static function getSellers() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM sellers");
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public static function getSellerInfo($uname) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_seller) FROM sellers WHERE "
            . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }

    public static function updateSellerInfo($uname) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_seller) FROM sellers WHERE "
            . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }

}

