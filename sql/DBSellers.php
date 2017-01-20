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

    //spremeni POVSIC..!
    public static function check($uname) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_user) FROM users WHERE "
                . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 0;
    }
    public static function getSellers() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM sellers");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getSellerInfo($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM sellers WHERE "
            . "id_seller = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function editSeller($id, $data) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE sellers "
            . "SET first_name = ?, last_name = ?, username = ?, password = ?, email = ?, address = ?, city = ?, country = ?, active = ? "
            . "WHERE id_seller = ?");
        $stmt->bindValue(1, $data['first_name']);
        $stmt->bindValue(2, $data['last_name']);
        $stmt->bindValue(3, $data['username']);
        $stmt->bindValue(4, $data['password']);
        $stmt->bindValue(5, $data['email']);
        $stmt->bindValue(6, $data['address']);
        $stmt->bindValue(7, $data['city']);
        $stmt->bindValue(8, $data['country']);
        $stmt->bindValue(9, $data['active']);
        $stmt->bindValue(10, $id);
        $stmt->execute();

        return "Success";
    }

    public static function addSeller($data) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("INSERT INTO sellers "
            . "(first_name, last_name, username, password, email, address, city, country, active)"
            . "values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $data['first_name']);
        $stmt->bindValue(2, $data['last_name']);
        $stmt->bindValue(3, $data['username']);
        $stmt->bindValue(4, $data['password']);
        $stmt->bindValue(5, $data['email']);
        $stmt->bindValue(6, $data['address']);
        $stmt->bindValue(7, $data['city']);
        $stmt->bindValue(8, $data['country']);
        $stmt->bindValue(9, "true");
        $stmt->execute();

        return "Success";
    }

}

