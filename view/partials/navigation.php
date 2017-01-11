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
                            <li><a href="#cart">Košarica</a></li>
                        </ul>
                        
                    </div><!--/.nav-collapse -->
                </div>
            </nav>';