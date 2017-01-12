<div class="cart_page_wrapper">
    <table id="cart" class="table table-condensed">
        <thead>
        <tr>
            <th class="text-center text-middle">Izdelek</th>
            <th class="text-center text-middle">Cena</th>
            <th class="text-center text-middle">Količina</th>
            <th class="text-center text-middle">Cena</th>
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
            <td class="text-center text-middle" data-th="price">$1.99</td>
            <td class="text-center text-middle" data-th="quantity">
                <input type="number" class="quantity_input text-center" value="1">
            </td>
            <td data-th="Subtotal" class="text-center text-middle">1.99</td>
            <td class="actions text-center text-middle" data-th="">
                <form action="cart/delete" method="post">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </form>
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center text-middle"><strong>Total 1.99</strong></td>
        </tr>
        <tr>
            <td colspan="3" class="hidden-xs"></td>
            <td class="hidden-xs text-center text-middle"><strong>Total $1.99</strong></td>
            <td><a href="checkout" class="btn-modern-link btn-block">NA BLAGAJNO</a></td>
        </tr>
        </tfoot>
    </table>
</div>
