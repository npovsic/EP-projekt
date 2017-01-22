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
                                        <input type="text" class="form-control" name="query" id="search" placeholder="Išči" <?php if(isset($query)) echo 'value="'.$query.'"' ?> >
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <?php
                            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                            ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["user"] ?>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo BASE_URL . "user/". $_SESSION["user"] ?>/edit">Uredi profil</a></li>
                                    <li><a href="<?php echo BASE_URL . "user/". $_SESSION["user"] ?>/orders">Naročila</a></li>
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
                            <?php
                            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                            ?>
                            <li class="cart_button">
                                <a href="<?php echo BASE_URL ?>cart">Košarica
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                        
                    </div><!--/.nav-collapse -->
                </div>
            </nav>