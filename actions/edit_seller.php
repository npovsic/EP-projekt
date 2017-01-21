<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBSellers.php';

try {
    DBSellers::editSeller($id, $data);
    View::redirect(BASE_URL."admin");
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}

