<?php
session_start();

require_once("controller/ItemController.php");
require_once("sql/InitDB.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ITEM_URL", rtrim($_SERVER["SCRIPT_NAME"]) . "/item/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");
define("JS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/js/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "" => function () {
        $db = InitDB::getInstance();
        ItemController::index($db);
    },
    "login" => function() {
        ItemController::login();
    },
    "register" => function() {
        ItemController::register();
    },
    "item/" => function() {
        ItemController::login();
    },
    "wip" => function() {
        ItemController::wip();
    }
];

try {
    if (isset($urls[$path])) {
        $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (InvalidArgumentException $e) {
    ViewHelper::error404();
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
} 
