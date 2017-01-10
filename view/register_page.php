<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <?php
    $title = "E-Store | Registracija";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation.php"; ?>

<div class="container">
    <div class="login-wrapper">
        <h1>Registracija</h1>

        <form method="post" action="register">
            <label>Uporabniško ime</label><input class="input-group" type="text" name="username" ><br>
            <label>Geslo</label><input class="input-group" type="password" name="password"><br>
            <label>Ime</label><input class="input-group" type="text" name="first_name"><br>
            <label>Priimek</label><input class="input-group" type="text" name="last_name"><br>
            <label>Elektronska pošta</label><input class="input-group" type="text" name="email"><br>
            <label>Naslov</label><input class="input-group" type="text" name="address"><br>
            <label>Mesto</label><input class="input-group" type="text" name="city"><br>
            <label>Država</label><input class="input-group" type="text" name="country"><br>
            <button type="submit">Registracija</button>
        </form>
    </div>

</div>

</body>
</html>
