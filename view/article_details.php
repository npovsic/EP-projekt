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
        <div class="details-wrapper">

            <?php
                echo '<div class="img-details-container">
                        <img class="img-responsive" src="'.IMAGES_URL.$picture.'.jpg">
                    </div>
                    ';
                echo '<div class="details_add_to_cart">
                        <div class="article-info">
                            <h1>'.$name.'</h1>    
                            <h1>'.$weight.'g</h1>    
                            <h1>'.$price.'€</h1>    
                        </div>
                        <button class=" pull-right btn-modern-medium btn-modern top_margin_5px" type="submit">V KOŠARICO</button>
                    </div>
                    <div class="details_article">
                        <div class="details">
                            <p>'.$description.'</p>    
                        </div>
                    </div>
                                
                    ';

            ?>
        </div>

    </div>

    <?php include("view/partials/footer.php") ?>

</body>
</html>
