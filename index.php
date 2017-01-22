<?php
session_start();

require_once("controller/AdminController.php");
require_once("controller/SellerController.php");
require_once("controller/Controller.php");
require_once("controller/APIController.php");

define("BASE_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php"));
define("LOGS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "logs/");

define("ITEM_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "article/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");
define("JS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/js/");
define("ACTIONS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "actions/");
define("DOCUMENT_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "sql/");
define("ADMIN_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "admin/");
define("SELLER_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "seller/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "/^$/" => function () {
        Controller::index();
    },
    "/login$/" => function($method) {
        if ($method == "POST") {
            Controller::login();
        } else {
            Controller::login_page();
        }
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
    "/^register\/activate.*/" => function($method, $id = null, $token = null) {
        $id = $_GET['user'];
        $token = $_GET['token'];        
        Controller::activation($id, $token);
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
    "/^article\/rate$/" => function($method, $id = null) {
        Controller::rate();
    },
    "/wip/" => function() {
        Controller::wip();
    },

    "/^user\/(\w+)\/edit$/" => function($method, $username) {
        if (isset($_SESSION['user']) && ($_SESSION['user'] == $username)) {
            if ($method == "POST") {
                Controller::edit_user($_SESSION['id']);
            } else {
                Controller::edit_user_page($_SESSION['id']);
            }
        }
        else {
            View::redirect(BASE_URL);
        }
    },

    # API calls
    "/api\/articles$/" => function() {
        APIController::index();
    },
    "/api\/article\/(\d+)$/" => function($method, $id = null) {
        APIController::get_article($id);
    },

    # ADMIN
    "/^admin$/" => function($method) {
        if ($method == "POST") {
            AdminController::login();
        } else {
            AdminController::login_page();
        }

    },
    "/^admin\/edit$/" => function($method, $id = null) {
        if ($method == "POST") {
            AdminController::edit_admin($id);
        } else {
            AdminController::edit_admin_page($id);
        }
    },
    "/^admin\/edit\/(\d+)$/" => function($method, $id = null) {
        if ($method == "POST") {
            AdminController::edit_seller($id);
        } else {
            AdminController::edit_seller_page($id);
        }
    },
    "/^admin\/add$/" => function($method) {
        if ($method == "POST") {
            AdminController::add_seller();
        } else {
            AdminController::add_seller_page();
        }
    },

    # SELLER
    "/^seller$/" => function() {
        SellerController::index();
    },
    "/^seller\/(\w+)\/edit$/" => function($method, $username) {
        if (isset($_SESSION['seller']) && ($_SESSION['seller'] == $username)) {
            if ($method == "POST") {
                SellerController::edit_seller($_SESSION['id']);
            } else {
                SellerController::edit_seller_page($_SESSION['id']);
            }
        }
        else {
            View::redirect(BASE_URL);
        }

    },
    "/^seller\/edit\/(\d+)$/" => function($method, $id = null) {
        if ($method == "POST") {
            SellerController::edit_article($id);
        } else {
            SellerController::edit_article_page($id);
        }
    },
    "/^seller\/delete\/(\d+)$/" => function($method, $id = null) {
        SellerController::delete_article($id);
    },
    "/^seller\/add$/" => function($method) {
        if ($method == "POST") {
            SellerController::add_article();
        } else {
            SellerController::add_article_page();
        }
    },
    "/^seller\/all-users$/" => function($method) {
        SellerController::all_users();
    },
    "/^seller\/all-users\/edit\/(\d+)$/" => function($method, $id = null) {
        if ($method == "POST") {
            SellerController::edit_user($id);
        } else {
            SellerController::edit_user_page($id);
        }
    },
    "/^seller\/all-users\/add$/" => function($method, $id = null) {
        if ($method == "POST") {
            SellerController::add_user();
        } else {
            SellerController::add_user_page();
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