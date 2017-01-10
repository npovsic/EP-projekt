<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store | Article details";
    include "view/partials/head.php";
    ?>
</head>
<body>
    <?php include "view/partials/navigation.php"; ?>
    <div class="container">
        <div class="wrapper">
            <div class="row active-with-click">
                <?php
                    echo '<div class="col-md-4 col-sm-6 col-xs-12">
                                <article class="material-card Blue-Grey">
                                    <h2>
                                        <span class="one-line-span">'.$name.'</span>
                                        <strong class="info-left">'.$weight.'g</strong>
                                        <strong class="info-right">'.$price.'€</strong>
                                    </h2>
            
                                    <div class="mc-content">
                                        <div class="img-container">
                                            <img class="img-responsive" src="'.IMAGES_URL.$picture.'.jpg">
                                        </div>
                                    </div>
                                    <a href="'.ITEM_URL.$article_id.'" class="mc-btn-action">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                </article>
                            </div>
                        ';
                ?>
            </div>
        </div>

    </div>

</body>
</html>
