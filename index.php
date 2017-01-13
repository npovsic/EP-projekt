<?php
session_start();

require_once("controller/AdminController.php");
require_once("controller/Controller.php");
require_once("controller/APIController.php");

define("BASE_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php"));
define("ITEM_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "article/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");
define("JS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/js/");
define("DOCUMENT_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "sql/");
define("ADMIN_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "admin/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "/^$/" => function () {
        Controller::index();
    },
    "/login$/" => function($method) {
        Controller::login();
    },
    "/logout$/" => function() {
        Controller::logout();
    },    
    "/register$/" => function($method) {
        if ($method == "POST") {
            Controller::register();
        } else {
            Controller::login_page();
        }
    },
    "/^article\/(\d+)$/" => function($method, $id = null) {
        Controller::details_page($id);
    },
    "/search.*/" => function($method) {
        Controller::search($_GET['query']);
    },
    "/cart$/" => function($method) {
        Controller::cart();
    },
    "/checkout$/" => function($method) {
        Controller::checkout();
    },
    "/wip/" => function() {
        Controller::wip();
    },

    # API calls
    "/api\/articles$/" => function() {
        APIController::index();
    },
    "/api\/article\/(\d+)$/" => function($method, $id = null) {
        APIController::get_article($id);
    },

    # ADMIN
    "/^admin$/" => function() {
        AdminController::login();
    },
    "/^admin\/edit\/(\d+)$/" => function($method, $id = null) {
        if ($method == "POST") {
            AdminController::edit_seller($id);
        } else {
            AdminController::edit_seller($id);
        }
    },
    "/^admin\/add$/" => function($method) {
        if ($method == "POST") {
            AdminController::add_seller();
        } else {
            AdminController::add_seller_page();
        }
    },
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