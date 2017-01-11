<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once $_SERVER['DOCUMENT_ROOT'].DOCUMENT_URL.'DBUsers.php';
$failedAttempt = false;

if (isset($_POST["uname"]) && isset($_POST["password"])) {
    try {
        if (DBUsers::login($_POST["uname"], $_POST["password"])) {
            session_regenerate_id(true);
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $_POST["uname"];
            View::redirect(BASE_URL);
        } else {
            $failedAttempt = true;
        }
    } catch (Exception $exc) {
        echo $exc->getMessage();
        exit(-1);
    }
} 
?>

<html>
    <head>
        <?php
            $title = "E-Store | Prijava";
            include "view/partials/head.php";
        ?>
    </head>
    <body>
        <?php include "view/partials/navigation.php"; ?>

        <div class="container top-padding-50px">
                <div id="login_wrapper">
                    <form class="login_form top" method="post" action="login">
                        <h2>Prijava</h2><br>
                        <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" name="uname" ></label><br>
                        <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password"></label><br>
                        <button class="btn-block btn-modern top_margin_5px" type="submit">PRIJAVA</button>
                        <?php
                        if ($failedAttempt) {
                            echo "<p class='wrong-credentials'>Napačno uporabniško ime ali geslo.</p>";
                        }
                        ?>
                    </form>
                    <form class="login_form" method="post" action="register">
                        <h2>Registracija</h2><br>
                        <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" name="username" ></label><br>
                        <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password"></label><br>
                        <label class="align-left">Ime<br><input class="input-modern" type="text" name="first_name"></label><br>
                        <label class="align-left">Priimek<br><input class="input-modern" type="text" name="first_name"></label><br>
                        <label class="align-left">Elektronska pošta<br><input class="input-modern" type="text" name="email"></label><br>
                        <label class="align-left">Naslov<br><input class="input-modern" type="text" name="address"></label><br>
                        <label class="align-left">Mesto<br><input class="input-modern" type="text" name="city"></label><br>
                        <label class="align-left">Država<br><input class="input-modern" type="text" name="country"></label><br>
                        <button class="btn-block btn-modern top_margin_5px" type="submit">REGISTRACIJA</button>
                    </form>
                </div>

        </div>

        <?php include("view/partials/footer.php") ?>

    </body>
</html>
