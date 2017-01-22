<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sql/DBUsers.php';
$failedAttempt = false;

try {
    DBUsers::editUser($id, $data);
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(-1);
}
