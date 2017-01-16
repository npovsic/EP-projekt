<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store | Article details";
    include "view/partials/head.php";
    ?>
    <script>
        var id_article = <?php echo $id_article ?>;
    </script>
</head>
<body>
    <?php include "view/partials/navigation.php"; ?>
    <div class="container">
        <div class="details-wrapper">
                <div class="img-details-container">
                        <img class="img-responsive" src="<?php echo IMAGES_URL.$picture?>.jpg" >
                </div>
                <div class="details_add_to_cart">
                        <div class="article-info">
                            <h1><?php echo $name ?></h1>    
                            <h1><?php echo $weight ?></h1>    
                            <h1><?php echo $price ?></h1>
                            <form method= "POST" id="ocena_proteina" >
                            <ul style="  display: flex; flex-direction: row; margin-left:-40px; min-width: 20px;">
                                <input type="radio" value="1" name="ocena" style="margin-right:5px;" checked>  1<br>
                                <input type="radio" value="2" name="ocena" style="margin-left:10px;margin-right:5px;"> 2<br>
                                <input type="radio" value="3" name="ocena" style="margin-left:10px;margin-right:5px;"> 3<br>
                                <input type="radio" value="4" name="ocena" style="margin-left:10px;margin-right:5px;"> 4<br>
                                <input type="radio" value="5" name="ocena" style="margin-left:10px;margin-right:5px;"> 5<br>                            
                            </ul>  
                            <label><input type="submit" name="oceni" value="Oceni" style="color:black;"/></label>
                            </form>
                        </div>
                        <button class=" pull-right btn-modern-medium btn-modern top_margin_5px" type="submit">V KOŠARICO</button>
                </div>
                <div class="details_article">
                        <div class="details">
                            <p><?php echo $description ?></p>    
                        </div>
                </div>
        </div>

    </div>
    <?php include("view/partials/footer.php") ?>

</body>
</html>
