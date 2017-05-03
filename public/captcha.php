<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "captchaHeader.php"); ?>
<br>
    <div class="container">
        <img class="center-block" src="img/celogolong1-1.png" alt="logo" width="800">
    </div>
    <div class="container">

        <form class="form-signin" method="post" autocomplete="off">
            <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
            <?php check_captcha(); ?>
            <!-- ><h2 class="form-signin-heading text-center">SIGN IN</h2> -->
<!--
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="inputUsername" class="form-control" placeholder="Username" autocomplete="off" required autofocus><br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" class="form-control" placeholder="Password" autocomplete="off" required>
-->
            <div class="g-recaptcha" data-sitekey="6LezHB4UAAAAAEFuJ52_WRKWg2yPTu00zkwbWmcK"></div><br>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Verify</button>

        </form>
    </div> <!-- /container -->
</body>
</html>