<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once("sql/InitDB.php");

class Cart {

    public static function getAll() {
        if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
            return [];
        }

        $ids = array_keys($_SESSION["cart"]);
        $cart = DBArticles::getForIds($ids);

        // Adds a quantity field to each book in the list
        foreach ($cart as &$product) {
            $product["quantity"] = $_SESSION["cart"][$product["id_article"]];
        }

        return $cart;
    }

    public static function add($id) {
        $product = DBArticles::get($id);
        if ($product != null) {
            if (isset($_SESSION["cart"][$id])) {
                $_SESSION["cart"][$id] += 1;
            } else {
                $_SESSION["cart"][$id] = 1;
            }            
        }
    }
    public static function delete($id) {
        $product = DBArticles::get($id);
        if ($product != null) {
            if (isset($_SESSION["cart"][$id])) {
                unset($_SESSION["cart"][$id]);
            }            
        }
    }

    public static function update($id, $quantity) {
        $product = DBArticles::get($id);
        $quantity = intval($quantity);

        if ($product != null) {
            if ($quantity <= 0) {
                unset($_SESSION["cart"][$id]);
            } else {
                $_SESSION["cart"][$id] = $quantity;
            }
        }
    }

    public static function purge() {
        unset($_SESSION["cart"]);
    }

    public static function total() {
        return array_reduce(self::getAll(), function ($total, $product) {
            return $total + $product["price"] * $product["quantity"];
        }, 0);
    }
}
