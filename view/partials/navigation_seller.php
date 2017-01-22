<nav class="navbar navbar_seller navbar-fixed-top">
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
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo SELLER_URL ?>add">Dodaj artikel</a></li>
                <li><a href="<?php echo SELLER_URL ?>all-users">Uporabniki</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Narocila
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo SELLER_URL ?>unprocessed-orders">Neobdelana narocila</a></li>
                        <li><a href="<?php echo SELLER_URL ?>all-orders">Zgodovina narocil</a></li>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($_SESSION['seller'])) {
                    ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["seller"] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo SELLER_URL . $_SESSION["seller"] ?>/edit">Uredi profil</a></li>
                            <li><a href="<?php echo BASE_URL ?>logout">Logout</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <?php
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>