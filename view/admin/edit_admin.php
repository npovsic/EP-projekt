<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store - Uredi podatke";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation_admin.php"; ?>
<div class="container">
    <div class="wrapper">
        <div class="row active-with-click text-center">
            <form class="login_form" method="post" action="<?php echo ADMIN_URL."edit" ?>">
                <h2>Uredi podatke</h2><br>
                <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" disabled value="<?php echo $variables['username'] ?>" ></label><br>
                <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password" value="" ></label><br>
                <label class="align-left">Ime<br><input class="input-modern" type="text" name="first_name" value="<?php echo $variables['first_name'] ?>" ></label><br>
                <label class="align-left">Priimek<br><input class="input-modern" type="text" name="last_name" value="<?php echo $variables['last_name'] ?>" ></label><br>
                <label class="align-left">Elektronska pošta<br><input class="input-modern" type="email" name="email" value="<?php echo $variables['email'] ?>" ></label><br>
                <button class="btn-block btn-modern admin_btn top_margin_5px" type="submit">UREDI</button>
                <?php if (isset($failedAttempt)) {
                    echo $failedAttempt;
                } ?>
            </form>
        </div>
    </div>

</div>

</body>
</html>
