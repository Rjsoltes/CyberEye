<?php 
if(isset($_SESSION['user_id'])){
         $c_user_id = $_SESSION['user_id'];
    }

    // Brings in information about the current user
    $query = query("SELECT * FROM users WHERE user_id = $c_user_id");
    confirm($query);

    while($row = fetch_array($query)){
        $c_user_id = $row['user_id'];
        $c_username = $row['username'];
        $c_email = $row['email'];
        $c_password = $row['password'];
        $c_fname = $row['fname'];
        $c_lname = $row['lname'];
        $c_user_role = $row['user_role'];

    }





?>
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header ">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Company Name</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li>
				<a href="home.php"><i class='fa fa-fw fa-home'></i> Home</a>
			</li>
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-list-ul"></i> Categories<span class="caret"></span></a>
                <ul class="dropdown-menu">
                	
                  	<?php 
                    	get_categories();
                    ?>
                </ul>
            </li>
			<li>
				<a href="contact.php"><i class="fa fa-fw fa-book"></i> Contact</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
            <li>
                <form class="navbar-form navbar-right" action="search.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                    </div>
                    <button name="submit_search" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </li>
		    <li>
				<?php
                    // Determines the user tab on the navigation.
                    // If the user is an admin then they get a link to the admin page and their profile.
                    // If the user is a standard user they just get a link to their profile. 
                    // Also if a user is logged in then is shows a log out button.
                    // If no user is logged in then it shows a log in button.
                    // Always shows a register button.
                    if(isset($_SESSION['user_role'])){
                            $user_role = $_SESSION['user_role'];
                            if($user_role == 'admin'){
                                echo "<li class='dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-fw fa-user'></i> {$c_username} <b class='caret'></b></a>
                                        <ul class='dropdown-menu'>
                                            <li>
                                                <a href='admin/index.php'><i class='fa fa-fw fa-bar-chart'></i> Manage</a>
                                            </li>
                                        </ul>
                                      </li>";
                            }else{
                                echo "<li><a href='#'><i class='fa fa-fw fa-user'></i> {$c_username}</a></li>";
                            }        
                    }

                ?>
			</li>
		    <li>
				<a href="view_cart.php"><i class="fa fa-fw fa-shopping-cart"></i> Cart</a>
			</li>
		    <li>
				<a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
			</li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>
<!-- /.container -->