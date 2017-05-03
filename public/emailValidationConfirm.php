<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "emailVerifyHeader.php"); ?>
<br>
    <div class="container">
        <img class="center-block" src="img/celogolong1-1.png" alt="logo" width="800">
    </div>
    <div class="container">

        <form class="form-signin" method="post" autocomplete="off">
            <h4 class="text-center">Check email for verification code</h4>
            <?php check_code(); ?>
            <!-- ><h2 class="form-signin-heading text-center">SIGN IN</h2> -->
            <label for="inputCode" class="sr-only">Confirmation Code</label>
            <input type="text" name="inputCode" class="form-control" placeholder="Confirmation Code" autocomplete="off" required autofocus><br>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="confirmCode">Validate</button>
        </form>
    </div> <!-- /container -->
</body>
</html>