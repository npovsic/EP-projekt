<?php
    echo '
        <div class="cart_page_wrapper">
            <table id="cart" class="table table-condensed">
                <thead>
                <tr>
                    <th class="text-center">Izdelek</th>
                    <th class="text-center">Cena</th>
                    <th class="text-center">Količina</th>
                    <th class="text-center">Cena</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td data-th="article">
                        <div class="row">
                            <div class="col-sm-10">
                                <p class="nomargin">Product 1</p>
                            </div>
                        </div>
                    </td>
                    <td class="text-center" data-th="price">$1.99</td>
                    <td class="text-center" data-th="quantity">
                        <input type="number" class="quantity_input text-center" value="1">
                    </td>
                    <td data-th="Subtotal" class="text-center">1.99</td>
                    <td class="actions text-center" data-th="">
                        <form action="cart/delete" method="post">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total 1.99</strong></td>
                </tr>
                <tr>
                    <td colspan="3" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                    <td><a href="checkout" class="btn btn-success btn-block">Na blagajno</a></td>
                </tr>
                </tfoot>
            </table>
        </div>
    ';