<?php

require_once("View.php");

class ItemController {

    public static function index($db) {
//        $sql = "CREATE TABLE MyGuests (
//            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//            firstname VARCHAR(30) NOT NULL,
//            lastname VARCHAR(30) NOT NULL,
//            email VARCHAR(50),
//            reg_date TIMESTAMP
//            )";
//
//        if ($db->query($sql) === TRUE) {
//            echo "Table MyGuests created successfully";
//        } else {
//            echo "Error creating table: " . $db->error;
//        }

        echo View::render("view/layout.php");
    }

    public static function login() {
        echo View::render("view/login.php");
    }

    public static function register() {
        echo View::render("view/register.php");
    }

    public static function wip() {
        echo View::render("view/wip.php");
    }

}
