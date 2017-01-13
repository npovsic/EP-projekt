<nav class="navbar navbar_admin navbar-fixed-top">
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
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($_SESSION['admin'])) {
                    ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["admin"] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
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