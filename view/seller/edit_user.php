<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store - Uredi prodajalca";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation_seller.php"; ?>
<div class="container">
    <div class="wrapper">
        <div class="row active-with-click text-center">
            <form class="login_form" method="post" action="<?php echo SELLER_URL."all-users/edit/".$variables['id_user'] ?>">
                <h2>Uredi stranko</h2><br>
                <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" disabled value="<?php echo $variables['username'] ?>" ></label><br>
                <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password" value="" ></label><br>
                <label class="align-left">Ime<br><input class="input-modern" type="text" disabled value="<?php echo $variables['first_name'] ?>" ></label><br>
                <label class="align-left">Priimek<br><input class="input-modern" type="text" disabled value="<?php echo $variables['last_name'] ?>" ></label><br>
                <label class="align-left">Elektronska pošta<br><input class="input-modern" type="email" name="email" value="<?php echo $variables['email'] ?>" ></label><br>
                <label class="align-left">Telefonska številka<br><input class="input-modern" type="number" name="phone_num" value="<?php echo $variables['phone_num'] ?>" ></label><br>
                <label class="align-left">Naslov<br><input class="input-modern" type="text" name="address" value="<?php echo $variables['address'] ?>" ></label><br>
                <label class="align-left">Mesto<br><input class="input-modern" type="text" name="city" value="<?php echo $variables['city'] ?>" ></label><br>
                <label class="align-left">Država<br><input class="input-modern" type="text" name="country" value="<?php echo $variables['country'] ?>" ></label><br>
                <label class="align-left">Aktiven<br>
                    <select class="input-modern" name="active_user" >
                        <?php if ($variables['active_user']) { ?>
                            <option value="1">Aktiven</option>
                            <option value="0">Neaktiven</option>
                        <?php } else { ?>
                            <option value="0">Neaktiven</option>
                            <option value="1">Aktiven</option>
                        <?php } ?>
                    </select>
                </label><br>
                <button class="btn-block btn-modern seller_btn top_margin_5px" type="submit">UREDI</button>
                <?php if (isset($failedAttempt) && $failedAttempt) {
                    echo $failedAttempt;
                } ?>
            </form>
        </div>
    </div>

</div>

</body>
</html>
