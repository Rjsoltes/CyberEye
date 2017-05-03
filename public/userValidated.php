<?php require_once("../resources/config.php"); ?>
<?php use_network(); ?>

<?php include(TEMPLATE_FRONT . DS . "loginHeader.php"); ?>
<br>
    <div class="container">
        <img class="center-block" src="img/celogolong1-1.png" alt="logo" width="800">
    </div>
    <div class="container">

        <form class="form-signin" method="post" autocomplete="off">
            <h1 class="text-center">User Validated</h1>
            
            <!-- ><h2 class="form-signin-heading text-center">SIGN IN</h2> -->
            
            <button class="btn btn-lg btn-success btn-block" type="submit" name="useNetwork">Use Network</button>

        </form>
    </div> <!-- /container -->
</body>
</html>
