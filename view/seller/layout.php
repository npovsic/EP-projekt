<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store";
    include "view/partials/head.php";
    ?>
</head>
<body>
    <?php include "view/partials/navigation_seller.php"; ?>
    <div class="container">
        <div class="wrapper">
            <div class="row active-with-click">
                <?php
                foreach ($variables as $item) {
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <?php if ($item['active_article'] == 0) {
                            echo '<article class="material-card Grey">';
                        }
                        else {
                            echo '<article class="material-card Green">';
                        }
                        ?>
                            <h2>
                                <span class="one-line-span"><?php echo $item['name'] ?></span>
                                <strong class="info-left"><?php echo $item['weight'] ?>g</strong>
                                <strong class="info-right"><?php echo $item['price'] ?>€</strong>
                            </h2>

                            <div class="mc-content">
                                <div class="img-container">
                                    <img class="img-responsive" src="<?php echo IMAGES_URL.$item['picture']?>">
                                </div>
                            </div>
                            <a href="<?php echo SELLER_URL."edit/".$item['id_article'] ?>" class="mc-btn-action">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?php echo SELLER_URL."delete/".$item['id_article'] ?>" class="mc-btn-action top_margin_60px">
                                <i class="fa fa-trash-o"></i>
                            </a>
                            <?php if($item['rating_count'] > 0){ ?>
                                <div class='artikel_choice'>
                                    <div id="r2" class="rate_widget">
                                        <?php if($item['rating_sum']/$item['rating_count'] >= 1){ ?>
                                            <div class="star_1 ratings_vote"></div>
                                        <?php } else{ ?>
                                            <div class="star_1 ratings_stars"></div>
                                        <?php } ?>
                                        <?php if($item['rating_sum']/$item['rating_count'] >= 2){ ?>
                                            <div class="star_2 ratings_vote"></div>
                                        <?php } else{ ?>
                                            <div class="star_2 ratings_stars"></div>
                                        <?php } ?>
                                        <?php if($item['rating_sum']/$item['rating_count'] >= 3){ ?>
                                            <div class="star_3 ratings_vote"></div>
                                        <?php } else{ ?>
                                            <div class="star_3 ratings_stars"></div>
                                        <?php } ?>
                                        <?php if($item['rating_sum']/$item['rating_count'] >= 4){ ?>
                                            <div class="star_4 ratings_vote"></div>
                                        <?php } else{ ?>
                                            <div class="star_4 ratings_stars"></div>
                                        <?php } ?>
                                        <?php if($item['rating_sum']/$item['rating_count'] >= 5){ ?>
                                            <div class="star_5 ratings_vote"></div>
                                        <?php } else{ ?>
                                            <div class="star_5 ratings_stars"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </article>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>

</body>
</html>
