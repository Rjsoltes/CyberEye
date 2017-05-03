<?php require_once("../resources/config.php");  ?>
<?php include(TEMPLATE_FRONT . DS . "emailVerifyHeader.php"); ?>
<br>
    <div class="container">
        <img class="center-block" src="img/celogolong1-1.png" alt="logo" width="800">
    </div>
    <div class="container">

        <form class="form-signin" method="post" autocomplete="off">
            <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
            <?php validate_email(); ?>
            <!-- ><h2 class="form-signin-heading text-center">SIGN IN</h2> -->
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="inputEmail" class="form-control" placeholder="Email" autocomplete="off" required autofocus><br>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="validate">Validate</button>
        </form>
    </div> <!-- /container -->
</body>
</html>