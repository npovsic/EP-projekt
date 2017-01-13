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
                        echo ' 
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
                            <tr>
                                <td class="text-center text-middle" data-th="name">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p class="nomargin">'.$item['first_name'].' '.$item['last_name'].'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-middle" data-th="username">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p class="nomargin">'.$item['username'].'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-middle" data-th="email">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p class="nomargin">'.$item['email'].'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-middle" data-th="address">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p class="nomargin">'.$item['address'].'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-middle" data-th="active">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p class="nomargin">'.$item['active'].'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="actions text-center text-middle" data-th="edit">
                                    <form action="cart/delete" method="get">
                                        <a class="btn btn-sm" href="'.ADMIN_URL.'edit"><i class="fa fa-edit"></i></a>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="actions text-center text-middle" data-th="add">
                                    <form action="admin/add" method="get">
                                        <a class="btn btn-success btn-sm" href="'.ADMIN_URL.'add"><i class="fa fa-plus"></i></a>
                                    </form>
                                </td>
                            </tfoot>
                        </table>
                        ';
                    }
                ?>
            </div>
        </div>

    </div>

</body>
</html>
