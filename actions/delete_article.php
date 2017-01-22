<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBArticles.php';
$failedAttempt = false;

try {
    if ($_SESSION['seller']) {
        DBArticles::deleteArticle($id);
        View::redirect(BASE_URL."seller");
    } else {
        $failedAttempt = true;
        echo View::render("view/login_page.php", ["failedAttempt" => $failedAttempt], true);
    }
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}
