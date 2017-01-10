<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
            $title = "E-Store | login";
            include "view/partials/head.php";
        ?>
    </head>
    <body>
        <?php include "view/partials/navigation.php"; ?>

        <div class="container">
            <div class="login-wrapper">
                <h1>Login</h1>

                <form method="post" action="login">
                    <label>Username</label><input class="input-group" type="text" name="username" ><br>
                    <label>Password</label><input class="input-group" type="password" name="password"><br>
                    <button type="submit">Login</button>
                </form>
            </div>

        </div>

    </body>
</html>
