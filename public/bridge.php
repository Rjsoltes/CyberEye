<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "loginHeader.php"); ?>
<br>
    <div class="container">
        <img class="center-block" src="img/celogolong1-1.png" alt="logo" width="800">
    </div>
    <div class="container">

        <form class="form-signin" method="post" autocomplete="off">
            <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
            <?php check_for_register(); ?>
            <!-- ><h2 class="form-signin-heading text-center">SIGN IN</h2> -->
            <a class="btn btn-lg btn-primary btn-block" href="captcha.php">Authentication</a>   
            <button class="btn btn-lg btn-default btn-block" type="submit" name="register">Register</button>      
            
        </form>
    </div> <!-- /container -->
</body>
</html>
