<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <?php
    $title = "E-Store | Blagajna";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation.php"; ?>
<div class="container">
    <div class="wrapper">
		<?php include "view/partials/invoice_details_par.php";  ?>
    </div>

</div>
<div style="position: absolute; left:0; right:0;bottom: 0;">
<?php include("view/partials/footer.php") ?>
</div>
</body>
</html>
