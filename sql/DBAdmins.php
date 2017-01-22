<?php

class DBAdmins {

    public static function login($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT password FROM admins WHERE "
                . "username = ? ");
        $stmt->bindValue(1, $uname);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        $hashed_password = $stmt->fetchColumn(0);

        return Hash::comparePasswords($password, $hashed_password);
    }

}

