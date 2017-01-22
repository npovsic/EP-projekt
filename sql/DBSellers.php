<?php

class DBSellers {

    public static function login($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT id_seller, password FROM sellers WHERE "
                . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        $parameters = $stmt->fetch();

        $id = $parameters['id_seller'];
        $hashed_password = $parameters['password'];

        if (Hash::comparePasswords($password, $hashed_password)) {
            return $id;
        }
        else {
            return false;
        }
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
        if (isset($data['active_seller'])) {
            if (!empty($data['password'])) {
                $stmt = $db->prepare("UPDATE sellers JOIN articles USING(id_seller) "
                    . "SET password = ?, email = ?, address = ?, city = ?, country = ?, sellers.active_seller = ?, articles.active_seller = ? "
                    . "WHERE id_seller = ?");

                $stmt->bindValue(1, Hash::hashPassword($data['password']));
                $stmt->bindValue(2, $data['email']);
                $stmt->bindValue(3, $data['address']);
                $stmt->bindValue(4, $data['city']);
                $stmt->bindValue(5, $data['country']);
                $stmt->bindValue(6, $data['active_seller']);
                $stmt->bindValue(7, $data['active_seller']);
                $stmt->bindValue(8, $id);
                $stmt->execute();

                return "Success";
            }
            else {
                $stmt = $db->prepare("UPDATE sellers JOIN articles USING(id_seller) "
                    . "SET email = ?, address = ?, city = ?, country = ?, sellers.active_seller = ?, articles.active_seller = ? "
                    . "WHERE id_seller = ?");

                $stmt->bindValue(1, $data['email']);
                $stmt->bindValue(2, $data['address']);
                $stmt->bindValue(3, $data['city']);
                $stmt->bindValue(4, $data['country']);
                $stmt->bindValue(5, $data['active_seller']);
                $stmt->bindValue(6, $data['active_seller']);
                $stmt->bindValue(7, $id);
                $stmt->execute();

                return "Success";
            }

        }
        else {
            if (!empty($data['password'])) {
                $stmt = $db->prepare("UPDATE sellers JOIN articles USING(id_seller) "
                    . "SET password = ?, email = ?, address = ?, city = ?, country = ? "
                    . "WHERE id_seller = ?");

                $stmt->bindValue(1, Hash::hashPassword($data['password']));
                $stmt->bindValue(2, $data['email']);
                $stmt->bindValue(3, $data['address']);
                $stmt->bindValue(4, $data['city']);
                $stmt->bindValue(5, $data['country']);
                $stmt->bindValue(6, $id);
                $stmt->execute();

                return "Success";
            }
            else {
                $stmt = $db->prepare("UPDATE sellers JOIN articles USING(id_seller) "
                    . "SET email = ?, address = ?, city = ?, country = ? "
                    . "WHERE id_seller = ?");

                $stmt->bindValue(1, $data['email']);
                $stmt->bindValue(2, $data['address']);
                $stmt->bindValue(3, $data['city']);
                $stmt->bindValue(4, $data['country']);
                $stmt->bindValue(5, $id);
                $stmt->execute();

                return "Success";
            }
        }
    }

    public static function addSeller($data) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("INSERT INTO sellers "
            . "(first_name, last_name, username, password, email, address, city, country, active)"
            . "values(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindValue(1, $data['first_name']);
        $stmt->bindValue(2, $data['last_name']);
        $stmt->bindValue(3, $data['username']);
        $stmt->bindValue(4, Hash::hashPassword($data['password']));
        $stmt->bindValue(5, $data['email']);
        $stmt->bindValue(6, $data['address']);
        $stmt->bindValue(7, $data['city']);
        $stmt->bindValue(8, $data['country']);
        $stmt->bindValue(9, "true");
        $stmt->execute();

        return "Success";
    }

}

