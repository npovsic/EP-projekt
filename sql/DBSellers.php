<?php

require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'InitDB.php';

class DBSellers {

    public static function login($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_user) FROM users WHERE "
                . "username = ? AND password = ?");
        $stmt->bindValue(1, $uname);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }

    public static function getUserInfo($uname) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_user) FROM users WHERE "
            . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }

    public static function updateUserInfo($uname) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_user) FROM users WHERE "
            . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }

}

