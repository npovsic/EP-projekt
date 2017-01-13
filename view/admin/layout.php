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
            <div class="row active-with-click">
                <?php
                    foreach ($variables as $item) {
                        echo '<div class="col-md-4 col-sm-6 col-xs-12">
                                <article class="material-card Orange">
                                    <h2>
                                        <span class="one-line-span">'.$item['name'].'</span>
                                        <strong class="info-left">'.$item['weight'].'g</strong>
                                        <strong class="info-right">'.$item['price'].'€</strong>
                                    </h2>
            
                                    <div class="mc-content">
                                        <div class="img-container">
                                            <img class="img-responsive" src="'.IMAGES_URL.$item['picture'].'.jpg">
                                        </div>
                                    </div>
                                    <a href="'.ITEM_URL.$item['id_article'].'" class="mc-btn-action">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                </article>
                            </div>
                        ';
                    }
                ?>
<!--                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                    <article class="material-card Blue-Grey">-->
<!--                        <h2>-->
<!--                            <span>Battery Whey Protein</span>-->
<!--                            <strong class="info-left">2000g</strong>-->
<!--                            <strong class="info-right">20e</strong>-->
<!--                        </h2>-->
<!---->
<!--                        <div class="mc-content">-->
<!--                            <div class="img-container">-->
<!--                                <img class="img-responsive" src="--><?php //echo IMAGES_URL . "battery_whey_protein.jpg" ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <a href="" class="mc-btn-action">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                        </a>-->
<!--                    </article>-->
<!--                </div>-->

            </div>
        </div>

    </div>

</body>
</html>
