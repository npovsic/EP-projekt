<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBSellers.php';

try {

    DBSellers::editSeller($id, $data);
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}

