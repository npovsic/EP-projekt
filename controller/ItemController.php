<?php

require_once("View.php");

class ItemController {

    public static function index() {
        echo View::render("view/layout.php");
    }

}
