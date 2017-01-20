<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');


class DBUsers {

    public static function login($uname, $password) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT COUNT(id_user) FROM users WHERE "
                . "username = ? AND password = ?");
        $stmt->bindValue(1, $uname);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }
    public static function register($uname, $password, $first_name, $last_name, 
        $address, $email, $city, $country) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("INSERT INTO users (username, password, first_name, last_name, " 
        . "address, email, city, country) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bindValue(1, $uname);
        $stmt->bindValue(2, $password);
        $stmt->bindValue(3, $first_name);
        $stmt->bindValue(4, $last_name);
        $stmt->bindValue(5, $address);
        $stmt->bindValue(6, $email);
        $stmt->bindValue(7, $city);
        $stmt->bindValue(8, $country);        
        $stmt->execute();
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."/activate/" . $uname;
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
    public static function activateUser($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE users SET status = 1 WHERE username = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if(!empty($result)) {
            $message = "Your account is activated.";
        } else {
            $message = "Problem in account activation.";
        }
        return true;
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

