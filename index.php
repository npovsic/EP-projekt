<?php
session_start();

require_once("controller/Controller.php");

define("BASE_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php"));
define("ITEM_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "article/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");
define("JS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/js/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "/^$/" => function () {
        ItemController::index();
    },
    "/login$/" => function($method) {
        if ($method == "POST") {
            ItemController::login();
        } else {
            ItemController::login_page();

        }
    },
    "/logout$/" => function() {
        ItemController::logout();
    },    
    "/register$/" => function($method) {
        if ($method == "POST") {
            ItemController::register();
        } else {
            ItemController::login_page();

        }
    },
    "/^article\/(\d+)$/" => function($method, $id = null) {
        ItemController::details_page($id);
    },
    "/search.*/" => function($method) {
        ItemController::search($_GET['query']);
    },
    "/cart$/" => function($method) {
        ItemController::cart();
    },
    "/checkout$/" => function($method) {
        ItemController::checkout();
    },
    "/wip/" => function() {
        ItemController::wip();
    }
    # REST API
];

foreach ($urls as $pattern => $controller) {
    if (preg_match($pattern, $path, $params)) {
        try {
            $params[0] = $_SERVER["REQUEST_METHOD"];
            $controller(...$params);
        } catch (InvalidArgumentException $e) {
            View::error404();
        } catch (Exception $e) {
            View::displayError($e, true);
        }

        exit();
    }
}

View::displayError(new InvalidArgumentException("No controller matched."), true);