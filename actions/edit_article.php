<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBArticles.php';
$failedAttempt = false;

try {
    DBArticles::editArticle($id, $data);
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}

