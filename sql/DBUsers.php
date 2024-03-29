<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class DBUsers {

    public static function login($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT id_user, password FROM users WHERE "
                . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        $parameters = $stmt->fetch();

        $id = $parameters['id_user'];
        $hashed_password = $parameters['password'];

        if (Hash::comparePasswords($password, $hashed_password)) {
            return $id;
        }
        else {
            return false;
        }
    }
    public static function checkActivation($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_user) FROM users WHERE "
                . "username = ? AND active_user = 1");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }
    public static function register($uname, $password, $first_name, $last_name, 
        $address, $email, $city, $country) {
        $db = InitDB::getInstance();
        $token = rand(1000,9999);
        $stmt = $db->prepare("INSERT INTO users (username, password, first_name, last_name, " 
        . "address, email, city, country, token) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bindValue(1, $uname);
        $stmt->bindValue(2, Hash::hashPassword($password));
        $stmt->bindValue(3, $first_name);
        $stmt->bindValue(4, $last_name);
        $stmt->bindValue(5, $address);
        $stmt->bindValue(6, $email);
        $stmt->bindValue(7, $city);
        $stmt->bindValue(8, $country); 
        $stmt->bindValue(9, $token);        
        $stmt->execute();
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."/activate?user=" . $uname . "&token=" . $token;
        $toEmail = $email;
        $subject = "User Registration Activation Email";
        $content = "Click this link to activate your account: " . $actual_link ;
        $mailHeaders = "From: Admin\r\n";
        if(mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
        }
        unset($_POST);
        return true;
    }

    public static function check($uname) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_user) FROM users WHERE "
                . "username = ?");
        $stmt->bindValue(1, $uname);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 0;
    }
    public static function activateUser($id, $token) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE users SET status = 1 WHERE username = ? AND token = ?");
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $token);        
        $stmt->execute();

        if(!empty($result)) {
            $message = "Your account is activated.";
        } else {
            $message = "Problem in account activation.";
        }
        return true;
    }

    public static function getUsers() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM users");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getUserInfo($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE "
            . "id_user = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function editUser($id, $data) {
        $db = InitDB::getInstance();

        if (isset($data['active_user'])) {
            if (!empty($data['password'])) {
                $stmt = $db->prepare("UPDATE users "
                    . "SET password = ?, email = ?, phone_num = ?, address = ?, city = ?, country = ?, active_user = ? "
                    . "WHERE id_user = ?");

                $stmt->bindValue(1, Hash::hashPassword($data['password']));
                $stmt->bindValue(2, $data['email']);
                $stmt->bindValue(3, $data['phone_num']);
                $stmt->bindValue(4, $data['address']);
                $stmt->bindValue(5, $data['city']);
                $stmt->bindValue(6, $data['country']);
                $stmt->bindValue(7, $data['active_user']);
                $stmt->bindValue(8, $id);
                $stmt->execute();

                return "Success";
            }
            else {
                $stmt = $db->prepare("UPDATE users "
                    . "SET email = ?, phone_num = ?, address = ?, city = ?, country = ?, active_user = ? "
                    . "WHERE id_user = ?");

                $stmt->bindValue(1, $data['email']);
                $stmt->bindValue(2, $data['phone_num']);
                $stmt->bindValue(3, $data['address']);
                $stmt->bindValue(4, $data['city']);
                $stmt->bindValue(5, $data['country']);
                $stmt->bindValue(6, $data['active_user']);
                $stmt->bindValue(7, $id);
                $stmt->execute();

                return "Success";
            }

        }
        else {
            if (!empty($data['password'])) {
                $stmt = $db->prepare("UPDATE users "
                    . "SET password = ?, email = ?, phone_num = ?, address = ?, city = ?, country = ? "
                    . "WHERE id_user = ?");

                $stmt->bindValue(1, Hash::hashPassword($data['password']));
                $stmt->bindValue(2, $data['email']);
                $stmt->bindValue(3, $data['phone_num']);
                $stmt->bindValue(4, $data['address']);
                $stmt->bindValue(5, $data['city']);
                $stmt->bindValue(6, $data['country']);
                $stmt->bindValue(7, $id);
                $stmt->execute();

                return "Success";
            }
            else {
                $stmt = $db->prepare("UPDATE users "
                    . "SET email = ?, phone_num = ?, address = ?, city = ?, country = ? "
                    . "WHERE id_user = ?");

                $stmt->bindValue(1, $data['email']);
                $stmt->bindValue(2, $data['phone_num']);
                $stmt->bindValue(3, $data['address']);
                $stmt->bindValue(4, $data['city']);
                $stmt->bindValue(5, $data['country']);
                $stmt->bindValue(6, $id);
                $stmt->execute();

                return "Success";
            }
        }
    }

}

