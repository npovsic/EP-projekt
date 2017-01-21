<html>
    <head>
        <?php
            $title = "E-Store | Admin";
            include "view/partials/head.php";
        ?>
    </head>
    <body>
        <?php include "view/partials/navigation_admin.php"; ?>

        <div class="container top-padding-50px">
                <div id="login_wrapper">
                    <form class="login_form top admin_login" method="post" action="<?php echo ADMIN_URL; ?>">
                        <h2>Administrator</h2><br>
                        <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" name="uadmin" ></label><br>
                        <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password"></label><br>
                        <button class="btn-block btn-modern admin_btn top_margin_5px" type="submit">PRIJAVA</button>
                        <?php
                        if (isset($failedAttempt) && $failedAttempt) {
                            echo "<p class='wrong-credentials'>". $failedAttempt ."</p>";
                        }
                        ?>
                    </form>
                </div>

        </div>

    </body>
</html>
