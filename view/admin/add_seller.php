<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store";
    include "view/partials/head.php";
    ?>
</head>
<body>
    <?php include "view/partials/navigation_admin.php"; ?>
    <div class="container">
        <div class="wrapper">
            <div class="row active-with-click text-center">
                <form class="login_form" method="post" action="<?php echo ADMIN_URL."add" ?>">
                    <h2>Nov prodajalec</h2><br>
                    <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" name="username" ></label><br>
                    <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password"></label><br>
                    <label class="align-left">Ime<br><input class="input-modern" type="text" name="first_name"></label><br>
                    <label class="align-left">Priimek<br><input class="input-modern" type="text" name="last_name"></label><br>
                    <label class="align-left">Elektronska pošta<br><input class="input-modern" type="text" name="email"></label><br>
                    <label class="align-left">Naslov<br><input class="input-modern" type="text" name="address"></label><br>
                    <label class="align-left">Mesto<br><input class="input-modern" type="text" name="city"></label><br>
                    <label class="align-left">Država<br><input class="input-modern" type="text" name="country"></label><br>
                    <button class="btn-block btn-modern admin_btn top_margin_5px" type="submit">DODAJ</button>
                </form>
            </div>
        </div>

    </div>

</body>
</html>
