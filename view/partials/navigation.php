<nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container_nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo BASE_URL ?>">Spletna trgovina</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo BASE_URL ?>">Domov</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="search-list-item">
                                <form action="<?php echo BASE_URL ?>search" class="search-form" method="get">
                                    <div class="form-group has-feedback">
                                        <label for="search" class="sr-only">Search</label>
                                        <input type="text" class="form-control" name="query" id="search" placeholder="Išči">
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <?php
                            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                            ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["username"] ?>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo BASE_URL ?>logout">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                            } else {
                            ?>
                            <li><a href="<?php echo BASE_URL ?>login">Prijavi se</a></li>
                            <?php
                            }
                            ?>
                            <li class="dropdown cart_button">
                                <a class="dropdown-toggle" href="<?php echo BASE_URL ?>cart">Košarica
                                    <span class="caret"></span></a>
                                <div class="cart_wrapper">
                                    <table id="cart-nav" class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th class="text-center text-middle">Izdelek</th>
                                            <th class="text-center text-middle">Cena</th>
                                            <th class="text-center text-middle">Količina</th>
                                            <th class="text-center text-middle">Skupaj</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-middle td-product" data-th="article">Product</td>
                                            <td class="text-center text-middle" data-th="price">$1.99</td>
                                            <td class="text-center text-middle" data-th="quantity">
                                                <input type="number" class="quantity_input text-center text-middle" value="1" min="1">
                                            </td>
                                            <td data-th="Subtotal" class="text-center text-middle">1.99</td>
                                            <td class="actions text-center text-middle" data-th="">
                                                <button class="nav_cart_delete btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="visible-xs">
                                            <td class="text-center text-middle"><strong>1.99</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="hidden-xs"></td>
                                            <td class="hidden-xs text-center text-middle"><strong>$1.99</strong></td>
                                            <td class="text-middle"><a href="checkout" class="btn-modern-link">NA BLAGAJNO</a></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </li>
                        </ul>
                        
                    </div><!--/.nav-collapse -->
                </div>
            </nav>