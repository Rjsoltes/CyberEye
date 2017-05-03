<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "loginHeader.php"); ?>
<br>
    <div class="container">
        <img class="center-block" src="img/celogolong1-1.png" alt="logo" width="800">
    </div>
    <div class="container">

        <form class="form-signin" method="post" autocomplete="off">
            <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
            <?php login_user();?>
            <!-- ><h2 class="form-signin-heading text-center">SIGN IN</h2> -->
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="inputUsername" class="form-control" placeholder="Username" autocomplete="off" required autofocus><br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" class="form-control" placeholder="Password" autocomplete="off" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>   
<!--            <button class="btn btn-lg btn-default btn-block" type="submit" name="register">Register</button>      -->
            
        </form>
    </div> <!-- /container -->
</body>
</html>
