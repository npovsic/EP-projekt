<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <?php
    $title = "E-Store | Košarica";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation.php"; ?>

<div class="container">
    <div class="wrapper">
        <?php include "view/partials/cart.php";  ?>
    </div>

</div>

<?php include("view/partials/footer.php") ?>

</body>
</html>
