<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBArticles.php';
$failedAttempt = null;

if (
    isset($_POST["name"]) &&
    isset($_POST["category"]) &&
    isset($_POST["price"]) &&
    isset($_POST["weight"]) &&
    isset($_POST["description"])
) {
    require_once 'actions/upload.php';

    if ($uploadOk == 1) {
        try {
            if ($_SESSION['seller']) {
            DBArticles::addArticle($_POST, $_FILES["picture"]["name"], $_SESSION['id']);
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
        $failedAttempt = "Add a picture.";
        echo View::render("view/seller/add_article.php", ["failedAttempt" => $failedAttempt], true);
    }
}
else {
    $failedAttempt = "Fill out all fields.";
    echo View::render("view/seller/add_article.php", ["failedAttempt" => $failedAttempt], true);
}
