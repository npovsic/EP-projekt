<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store - Uredi artikel";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation_seller.php"; ?>
<div class="container">
    <div class="wrapper">
        <div class="row active-with-click text-center">
            <form class="login_form" method="post" action="<?php echo SELLER_URL."edit/".$variables['id_article'] ?>">
                <h2>Uredi artikel</h2><br>
                <label class="align-left">Ime<br><input class="input-modern" type="text" name="name" value="<?php echo $variables['name'] ?>" ></label><br>
                <label class="align-left">Kategorija<br><input class="input-modern" type="text" name="category" value="<?php echo $variables['category'] ?>" ></label><br>
                <label class="align-left">Cena<br><input class="input-modern" type="text" name="price" value="<?php echo $variables['price'] ?>" ></label><br>
                <label class="align-left">Teža<br><input class="input-modern" type="text" name="weight" value="<?php echo $variables['weight'] ?>" ></label><br>
                <label class="align-left">Opis<br><input class="input-modern" type="text" name="description" value="<?php echo $variables['description'] ?>" ></label><br>
                <label class="align-left">Aktiven<br>
                    <select class="input-modern" type="text" name="active_article" >
                        <?php if ($variables['active_article']) { ?>
                            <option value="1">Aktiven</option>
                            <option value="0">Neaktiven</option>
                        <?php } else { ?>
                            <option value="0">Neaktiven</option>
                            <option value="1">Aktiven</option>
                        <?php } ?>
                    </select>
                </label><br>
                <button class="btn-block btn-modern seller_btn top_margin_5px" type="submit">UREDI</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
