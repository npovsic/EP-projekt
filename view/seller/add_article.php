<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store - Dodaj artikel";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation_seller.php"; ?>
<div class="container">
    <div class="wrapper">
        <div class="row active-with-click text-center">
            <form class="login_form" method="post" action="<?php echo SELLER_URL."add" ?>">
                <h2>Dodaj artikel</h2><br>
                <label class="align-left">Ime<br><input class="input-modern" type="text" name="username" ></label><br>
                <label class="align-left">Kategorija<br><input class="input-modern" type="text" name="password" ></label><br>
                <label class="align-left">Cena<br><input class="input-modern" type="text" name="first_name" ></label><br>
                <label class="align-left">Teža<br><input class="input-modern" type="text" name="email" ></label><br>
                <label class="align-left">Opis<br><input class="input-modern" type="text" name="last_name" ></label><br>
                <button class="btn-block btn-modern seller_btn top_margin_5px" type="submit">UREDI</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
