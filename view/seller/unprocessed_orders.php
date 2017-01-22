<!DOCTYPE html>
<html>
<head>
    <?php
    require_once("sql/DBReceipt.php");
    $title = "E-Store";
    include "view/partials/head.php";
    ?>
</head>
<body>
    <?php include "view/partials/navigation_seller.php"; ?>
    <div class="container">
     <div class="container">
        <div class="wrapper">
            <div class="row active-with-click">
                <table id="cart" class="table table-condensed">
                    <thead>
                    <tr>
                        <th class="text-center text-middle">User</th>
                        <th class="text-center text-middle">Datum</th>
                        <th class="text-center text-middle">Status</th>
                        <th class="text-center text-middle">Cena</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                    $st = 1;
                    foreach ($variables as $item) { ?>
                        <tr>
                            <td class="text-center text-middle" data-th="name">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo DBReceipt::getUser($item['id_user'])['username'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center text-middle" data-th="username">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo $item['date'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center text-middle" data-th="email">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo $item['status'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center text-middle" data-th="address">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo $item['total_cost'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="actions text-center text-middle" data-th="edit">
                                <form action="<?php echo BASE_URL . "seller/" ?>unprocessed-orders/info" method="get">
                                    <input type="hidden" name="receipt" value="<?php echo $item["id_receipt"] ?>" />    
                                    <button class="btn btn-info btn-sm" type="submit">
                                        <i class="glyphicon glyphicon-question-sign"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $st= $st+1;
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
