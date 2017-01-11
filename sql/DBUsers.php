<?php

require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'InitDB.php';

class DBUsers {

    public static function login($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(user_id) FROM users WHERE "
                . "username = ? AND password = ?");
        $stmt->bindValue(1, $uname);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }

}

