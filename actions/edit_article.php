<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBArticles.php';
$failedAttempt = false;

if (isset($_POST["name"]) &&
    isset($_POST["category"]) &&
    isset($_POST["price"]) &&
    isset($_POST["weight"]) &&
    isset($_POST["description"])
) {
    try {
        if ($_SESSION['seller']) {
            DBArticles::editArticle($id, $_POST);
            View::redirect(BASE_URL."seller");
        } else {
            $failedAttempt = true;
            echo View::render("view/login_page.php", ["failedAttempt" => $failedAttempt], true);
        }
    } catch (Exception $exc) {
        echo $exc->getMessage();
        exit(-1);
    }
}
else {
    echo View::render("view/seller/edit_article.php", ["failedAttempt" => $failedAttempt], true);
}
