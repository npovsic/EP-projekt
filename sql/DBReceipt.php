<?php

class DBReceipt {

    public static function confirmOrder($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE receipt SET status = ? WHERE id_receipt = ?");
        $stmt->bindValue(1, "confirmed");
        $stmt->bindValue(2, $id);

        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function cancelOrder($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE receipt SET status = ? WHERE id_receipt = ?");
        $stmt->bindValue(1, "cancelled");
        $stmt->bindValue(2, $id);

        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function stornoOrder($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("UPDATE receipt SET status = ? WHERE id_receipt = ?");
        $stmt->bindValue(1, "storno");
        $stmt->bindValue(2, $id);

        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function getReceipts() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM receipt WHERE status != ?");
        $stmt->bindValue(1, "unprocessed");
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function getUnprocessedReceipts() {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM receipt WHERE status = ?");
        $stmt->bindValue(1, "unprocessed");
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function getUserReceipts($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM receipt WHERE id_user  = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function getUser($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT username FROM users WHERE id_user = ?");
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetch();
    }
    public static function getReceiptInfo($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM receipt_items WHERE "
            . "id_invoice = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $receipt = $stmt->fetchAll();
        $products = array();
        foreach ($receipt as $product){
            $stmt = $db->prepare("SELECT * FROM articles WHERE id_article = ?");
            $stmt->bindValue(1, $product['id_item']);
            $stmt->execute();

            $curProduct = $stmt->fetch();

            array_push($products, array(
                'name' => $curProduct['name'],
                'price' => $curProduct['price'],
                'quantity' => $product['quantity']
            ));
        }

        return $products;
    }
    public static function getReceiptTotal($id) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT * FROM receipt WHERE "
            . "id_receipt = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $receipt = $stmt->fetch();

        return $receipt['total_cost'];
    }
    public static function addReceipt($user, $cart, $total) {
        $db = InitDB::getInstance();
        $stmt = $db->prepare("SELECT id_user FROM users WHERE "
            . "username = ?");
        $stmt->bindValue(1, $user);
        $stmt->execute();
        $id = $stmt->fetch();
        //echo $id["id_user"];
        $stmt2 = $db->prepare("INSERT INTO receipt "
            . "(id_user, status, total_cost)"
            . "values(?,?,?)");
        $stmt2->bindValue(1, $id["id_user"]);
        $stmt2->bindValue(2, "unprocessed");
        $stmt2->bindValue(3, $total);        
        $stmt2->execute(); 
        $receipt_id = $db->lastInsertId(); 
        $st=0;
        if (!empty($cart)){
            foreach ($cart as $product){
                $stmt = $db->prepare("INSERT INTO receipt_items "
                    . "(id_invoice, id_item, quantity)"
                    . "values(?,?,?)");
                $stmt->bindValue(1, $receipt_id);
                $stmt->bindValue(2, $product["id_article"]);
                $stmt->bindValue(3, $product["quantity"]);
                $stmt->execute();

            }
        }
        return "Success";
    }

}

