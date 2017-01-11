<?php
    echo '<nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container_nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="'.BASE_URL.'">Spletna trgovina</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="'.BASE_URL.'">Domov</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="search-list-item">
                                <form action="search" class="search-form" method="get">
                                    <div class="form-group has-feedback">
                                        <label for="search" class="sr-only">Search</label>
                                        <input type="text" class="form-control" name="query" id="search" placeholder="Išči">
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="'.BASE_URL.'login">Prijavi se</a></li>
                            <li><a href="'.BASE_URL.'register">Registracija</a></li>
                            <li><a class="cart_button" href="cart">
                                Košarica
                                <div class="cart_wrapper">
                                    <table id="cart" class="table table-hover table-condensed">
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
                                                <button class="btn btn-danger btn-sm"><a href="#"></a><i class="fa fa-trash-o"></i></button>
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
                            </a></li>
                        </ul>
                        
                    </div><!--/.nav-collapse -->
                </div>
            </nav>';