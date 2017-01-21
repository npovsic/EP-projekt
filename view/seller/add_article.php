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
            <form class="login_form" method="post" enctype="multipart/form-data" action="<?php echo SELLER_URL."add" ?>">
                <h2>Dodaj artikel</h2><br>
                <label class="align-left">Slika<br><input class="input-modern" type="file" name="picture" id="picture" ></label><br>
                <label class="align-left">Ime<br><input class="input-modern" type="text" name="name" ></label><br>
                <label class="align-left">Kategorija<br><input class="input-modern" type="text" name="category" ></label><br>
                <label class="align-left">Cena<br><input class="input-modern" type="text" name="price" ></label><br>
                <label class="align-left">Teža<br><input class="input-modern" type="text" name="weight" ></label><br>
                <label class="align-left">Opis<br><input class="input-modern" type="text" name="description" ></label><br>
                <button class="btn-block btn-modern seller_btn top_margin_5px" type="submit" name="submit">DODAJ</button>
                <?php if (isset($failedAttempt)) {
                    echo '<p>'.$failedAttempt.'</p>';
                } ?>
            </form>
        </div>
    </div>
</div>

</body>
</html>
