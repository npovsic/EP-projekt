<div class="cart_page_wrapper">
    <h2>Izpis naročila:</h2>
    <table id="cart" class="table table-condensed">
        <thead>
        <tr>
            <th class="text-center text-middle">Izdelek</th>
            <th class="text-center text-middle">Cena/kom</th>
            <th class="text-center text-middle">Količina</th>
            <th class="text-center text-middle">Cena</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($cart)): ?>
        <div id="cart">
            <?php foreach ($cart as $product): ?>
                <tr>
                    <td data-th="article">
                        <div class="row">
                            <div class="col-sm-10">
                                <p class="nomargin"><?= $product["name"] ?> </p>
                            </div>
                        </div>
                    </td>
                    <td class="text-center text-middle" data-th="price">$ <?php echo $product["price"] ?></td>
                    <td class="text-center text-middle" data-th="quantity">
                        <span><?php echo $product["quantity"] ?></span>
                    </td>
                    <td data-th="Subtotal" class="text-center text-middle">$ <?php echo $product["price"]*$product["quantity"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center text-middle"><strong>Total <?= number_format($total, 2) ?></strong></td>
        </tr>
        <tr>
            <td colspan="3" class="hidden-xs"></td>
            <td class="hidden-xs text-center text-middle"><strong>Total $<?= number_format($total, 2) ?></strong></td>
            <td></td>
            <td>
                <form type="get" action="confirm">
                    <input type="hidden" name="receipt" value="<?php echo $receipt_id ?>" />
                    <button type="submit" class="btn-modern-link btn-block">POTRDI</button>
                </form>
            </td>
            <td>
                <form type="get" action="cancel">
                    <input type="hidden" name="receipt" value="<?php echo $receipt_id ?>" />
                    <button type="submit" class="btn-modern-link btn-block">PREKLIČI</button>
                </form>
            </td>

        </tr>

        </tfoot>
    </table>
</div>
<?php endif; ?>
</div>
