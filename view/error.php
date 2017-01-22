<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "E-Store - 404";
    include "view/partials/head.php";
    ?>
</head>
<body>
    <?php
        if (isset($_SESSION['admin'])) {
            include "view/partials/navigation_admin.php";
        }
        elseif (isset($_SESSION['seller'])) {
            include "view/partials/navigation_seller.php";
        }
        else {
            include "view/partials/navigation.php";
        }

    ?>
    <div class="container">
        <div class="wrapper">
            <div class="error-404">
                <h1>404</h1>
                <h2>Prišlo je do napake.</h2>
                <h2><?php echo $exception; ?></h2>
                <br/>
                <br/>
                <button onclick="goBack()" class="btn-modern <?php
                    if (isset($_SESSION['admin'])) {
                        echo "admin_btn";
                    }
                    elseif (isset($_SESSION['seller'])) {
                        echo "seller_btn";
                    }
                ?>">NAZAJ</button>

                <div class="img-responsive">
                    <img src="<?php echo IMAGES_URL ?>404.jpg">
                </div>
            </div>

        </div>

    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>
