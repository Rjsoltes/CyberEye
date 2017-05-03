<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "registerHeader.php"); ?>
<br>
    <div class="container">
        <img class="center-block" src="img/celogolong1-1.png" alt="logo" width="500">
    </div>
    <div class="container">

        <form class="form-register" method="post" autocomplete="off">
            <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
            <?php register_user(); ?>
            <!-- ><h2 class="form-signin-heading text-center">REGISTER</h2> -->
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="inputEmail" class="form-control" placeholder="Email" autocomplete="off" required autofocus><br>
            
            <label for="inputFirstName" class="sr-only">First Name</label>
            <input type="text" name="inputFirstName" class="form-control" placeholder="First Name" autocomplete="off" required><br>
            
            <label for="inputLastName" class="sr-only">Last Name</label>
            <input type="text" name="inputLastName" class="form-control" placeholder="Last Name" autocomplete="off" required><br>
            
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="inputUsername" class="form-control" placeholder="Username" autocomplete="off" required><br>
            
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" class="form-control" placeholder="Password" autocomplete="off" required>
            
            <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
            <input type="password" name="inputConfirmPassword" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
            <a class="btn btn-lg btn-default btn-block" type="submit" name="signin" href="index.php">Sign In</a>
            
        </form>
    </div> <!-- /container -->
</body>
</html>