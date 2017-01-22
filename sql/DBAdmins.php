<?php

class DBAdmins {

    public static function login($username, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT password FROM admins WHERE "
                . "username = ? ");
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        $hashed_password = $stmt->fetchColumn(0);

        return Hash::comparePasswords($password, $hashed_password);
    }

    public static function getAdminInfo($username) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM admins WHERE "
            . "username = ? ");
        $stmt->bindValue(1, $username);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function editAdmin($username, $data) {
        $db = InitDB::getInstance();

        if (!empty($data['password'])) {
            $stmt = $db->prepare("UPDATE admins "
                . "SET password = ?, first_name = ?, last_name = ?, email = ? "
                . "WHERE username = ?");

            $stmt->bindValue(1, Hash::hashPassword($data['password']));
            $stmt->bindValue(2, $data['first_name']);
            $stmt->bindValue(3, $data['last_name']);
            $stmt->bindValue(4, $data['email']);
            $stmt->bindValue(5, $username);
            $stmt->execute();

            return "Success";
        }
        else {
            $stmt = $db->prepare("UPDATE admins "
                . "SET first_name = ?, last_name = ?, email = ? "
                . "WHERE username = ?");

            $stmt->bindValue(1, $data['first_name']);
            $stmt->bindValue(2, $data['last_name']);
            $stmt->bindValue(3, $data['email']);
            $stmt->bindValue(4, $username);
            $stmt->execute();

            return "Success";
        }
    }

}

