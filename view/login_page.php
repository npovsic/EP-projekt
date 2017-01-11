<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                        <label class="align-left">Uporabniško ime<br><input class="padding_5px" type="text" name="username" ></label><br>
                        <label class="align-left">Geslo<br><input class="padding_5px" type="password" name="password"></label><br>
                        <button class="btn-block btn-login top_margin_5px" type="submit">PRIJAVA</button>
                    </form>
                    <form class="login_form" method="post" action="register">
                        <h2>Registracija</h2><br>
                        <label class="align-left">Uporabniško ime<br><input class="padding_5px" type="text" name="username" ></label><br>
                        <label class="align-left">Geslo<br><input class="padding_5px" type="password" name="password"></label><br>
                        <label class="align-left">Ime<br><input class="padding_5px" type="text" name="first_name"></label><br>
                        <label class="align-left">Priimek<br><input class="padding_5px" type="text" name="first_name"></label><br>
                        <label class="align-left">Elektronska pošta<br><input class="padding_5px" type="text" name="email"></label><br>
                        <label class="align-left">Naslov<br><input class="padding_5px" type="text" name="address"></label><br>
                        <label class="align-left">Mesto<br><input class="padding_5px" type="text" name="city"></label><br>
                        <label class="align-left">Država<br><input class="padding_5px" type="text" name="country"></label><br>
                        <button class="btn-block btn-login top_margin_5px" type="submit">REGISTRACIJA</button>
                    </form>
                </div>

        </div>

    </body>
</html>
