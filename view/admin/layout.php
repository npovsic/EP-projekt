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
                <table id="cart" class="table table-condensed">
                    <thead>
                    <tr>
                        <th class="text-center text-middle">Ime</th>
                        <th class="text-center text-middle">Uporabniško ime</th>
                        <th class="text-center text-middle">Elektronska pošta</th>
                        <th class="text-center text-middle">Naslov</th>
                        <th class="text-center text-middle">Aktiven</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($variables as $item) { ?>
                        <tr>
                            <td class="text-center text-middle" data-th="name">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo $item['first_name'].' '.$item['last_name'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center text-middle" data-th="username">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo $item['username'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center text-middle" data-th="email">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo $item['email'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center text-middle" data-th="address">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="nomargin"><?php echo $item['address'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center text-middle" data-th="active">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <?php if ($item['active_seller']) { ?>
                                            <p class="nomargin">DA</p>
                                        <?php } else { ?>
                                            <p class="nomargin">NE</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                            <td class="actions text-center text-middle" data-th="edit">
                                <form action="cart/delete" method="get">
                                    <a class="btn btn-info btn-sm" href="<?php echo ADMIN_URL.'edit/'.$item['id_seller'] ?>"><i
                                                class="fa fa-edit"></i></a>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="actions text-center text-middle" data-th="add">
                        <form action="admin/add" method="get">
                            <a class="btn btn-success btn-sm" href="<?php echo ADMIN_URL ?>add"><i class="fa fa-plus"></i></a>
                        </form>
                    </td>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
