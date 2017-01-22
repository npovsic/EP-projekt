<?php

class View {

    //Displays a given view and sets the $variables array into scope.
    public static function render($file, $variables = array(), $extract) {
        if ($extract === true) {
            extract($variables);
        }

        ob_start();
        include($file);
        return ob_get_clean();
    }

    public static function renderJSON($data, $httpResponseCode = 200) {
        header('Content-Type: application/json');
        http_response_code($httpResponseCode);

        $obj = new stdClass();
        $obj->label="Artikli";
        $obj->data = $data;

        return json_encode($obj);
    }

    // Redirects to the given URL
    public static function redirect($url) {
        header("Location: " . $url);
    }

    // Displays a simple 404 message
    public static function error404() {
        header('This is not the page you are looking for', true, 404);
        $html404 = sprintf("<!doctype html>\n" .
                "<title>Error 404: Page does not exist</title>\n" .
                "<h1>Error 404: Page does not exist</h1>\n" .
                "<p>The page <i>%s</i> does not exist.</p>", $_SERVER["REQUEST_URI"]);

        echo $html404;
    }

    public static function displayError($file, $exception, $debug = false) {
        header('An error occurred.', true, 400);

        ob_start();
        include($file);
        return ob_get_clean();
    }

}
