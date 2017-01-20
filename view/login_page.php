<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script language="javascript">
$(document).ready(function(){

    $(".refresh").click(function () {
        $(".imgcaptcha").attr("src","view/demo_captcha.php?_="+((new Date()).getTime()));
        console.log("reload");
    });


 $('#register').submit(function() {
    $.post("/submit_demo_captcha.php?"+$("#register").serialize(), { }, function(response){
        if(response==1){
           $(".imgcaptcha").attr("src","view/demo_captcha.php?_="+((new Date()).getTime()));
           clear_form();
           alert("Data Submitted Successfully.")
        }else{
           alert("wrong captcha code!");
        }
    });
    return false;
    });

});

</script>
<head>
    <?php
    $title = "E-Store | Prijava";
    include "view/partials/head.php";
    ?>
</head>
<body>
<?php include "view/partials/navigation.php"; ?>
<div class="container top-padding-50px">
    <div id="login_wrapper">
        <form class="login_form top" method="post" action="login">
            <h2>Prijava</h2><br>
            <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" name="uname" ></label><br>
            <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password"></label><br>
            <button class="btn-block btn-modern top_margin_5px" type="submit">PRIJAVA</button>
            <?php
            if (isset($failedAttempt) && $failedAttempt) {
                echo "<p class='wrong-credentials'>Napačno uporabniško ime ali geslo.</p>";
            }
            if (isset($failedActivation) && $failedActivation) {
                echo "<p class='wrong-credentials'>Uporabniški račun ni aktiviran.</p>";
            }
            ?>
        </form>
        <form class="login_form" method="post" action="register">
            <h2>Registracija</h2><br>
            <label class="align-left">Uporabniško ime<br><input class="input-modern" type="text" name="username" ></label><br>
            <label class="align-left">Geslo<br><input class="input-modern" type="password" name="password"></label><br>
            <label class="align-left">Ime<br><input class="input-modern" type="text" name="first_name"></label><br>
            <label class="align-left">Priimek<br><input class="input-modern" type="text" name="last_name"></label><br>
            <label class="align-left">Elektronska pošta<br><input class="input-modern" type="text" name="email"></label><br>
            <label class="align-left">Naslov<br><input class="input-modern" type="text" name="address"></label><br>
            <label class="align-left">Mesto<br><input class="input-modern" type="text" name="city"></label><br>
            <label class="align-left">Država<br><input class="input-modern" type="text" name="country"></label><br>
            <label class="align-left">Captcha<br>
            <input type="text" placeholder="Enter Code" id="captcha" name="captcha" input class="input-modern" required="required">
            </label>
            <br>
            <img src="view/demo_captcha.php" class="imgcaptcha" alt="captcha"  />
            <img src="static/images/refresh.png" alt="reload" class="refresh" /><br>
            <button class="btn-block btn-modern top_margin_5px" type="submit">REGISTRACIJA</button>
            <?php
            if (isset($failedAttemptRegistration) && $failedAttemptRegistration) {
                echo "<p class='wrong-credentials'>Napaka pri registraciji!</p>";
            }
            if (isset($successAttemptRegistration) && $successAttemptRegistration) {
                echo "<p class='right-credentials'>Uspešna registracija!</p>";
            }
            if (isset($failedCaptchaRegistration) && $failedCaptchaRegistration) {
                echo "<p class='wrong-credentials'>Napačna captcha!</p>";
            }
            ?>            
        </form>
    </div>

</div>

<?php include("view/partials/footer.php") ?>

</body>
</html>
